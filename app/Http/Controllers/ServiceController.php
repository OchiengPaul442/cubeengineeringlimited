<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\service;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Service Upload-Cube Engineering and General supplies Limited';
        $service = service::all();
        $services = service::all();
        return view('Admin.pages.services', compact('title', 'service', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserviceRequest $request)
    {
        $request->validate([
            'name' => 'required|max:55',
            'description' => 'required|max:255',
            'details' => 'required',
        ]);

        // get all data from database
        $service = new service;

        // capture the file from the temporary table
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();

        $service->name = $request->name;
        $service->description = $request->description;
        $service->details = $request->details;

        // if file exists 
        if ($temporaryFile) {
            // new file name
            $new_name =  'service' . '.' . time() . '.' . $temporaryFile->filename;
            //  save file to database
            $service->image = $new_name;
            // move the file from the temporary folder to the permanent folder
            Storage::move('public/uploads/' . $temporaryFile->folder . '/' . $temporaryFile->filename, 'public/images/' . $new_name);
            // delete the temporary folder
            $directory = 'app/public/uploads/' . $temporaryFile->folder; // get the folder name
            File::deleteDirectory(storage_path($directory)); // delete the folder
            $temporaryFile->delete(); // delete the file from the temporary table
        }

        // save all data to database 
        $result = $service->save();

        if ($result) {
            return redirect()->back()->with('success', 'Service uploaded successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Services-Cube Engineering and General supplies Limited';
        $service = service::find($id);
        $otheritems = service::all();
        $FAQs = FAQs::all();
        return view('pages.service', compact('service', 'title', 'otheritems', 'FAQs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Service-Cube Engineering and General supplies Limited';
        $service = service::find($id);
        $services = service::all();
        return view('Admin.pages.services', compact('title', 'service', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceRequest  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateserviceRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|max:55',
            'description' => 'required|max:255',
            'details' => 'required',
        ]);

        $service = service::find($id);

        // capture the file from the temporary table
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();

        $service->name = $request->name;
        $service->description = $request->description;
        $service->details = $request->details;

        // if file exists 
        if ($temporaryFile) {
            // new file name
            $new_name =  'service' . '.' . time() . '.' . $temporaryFile->filename;
            //  save file to database
            $service->image = $new_name;
            // move the file from the temporary folder to the permanent folder
            Storage::move('public/uploads/' . $temporaryFile->folder . '/' . $temporaryFile->filename, 'public/images/' . $new_name);
            // delete the temporary folder
            $directory = 'app/public/uploads/' . $temporaryFile->folder; // get the folder name
            File::deleteDirectory(storage_path($directory)); // delete the folder
            $temporaryFile->delete(); // delete the file from the temporary table
        }

        // save all data to database 
        $result = $service->save();

        if ($result) {
            return redirect()->route('services.create')->with('success', 'Service updated successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = service::find($id);
        $result = $service->delete();

        // error checks
        if ($result) {
            return redirect()->back()->with('success', 'Service deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }
}
