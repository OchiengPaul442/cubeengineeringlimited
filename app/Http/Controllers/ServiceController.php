<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\service;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;
use App\Models\TemporaryFile;

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
        $title = 'Service Upload';
        return view('Admin.pages.services', compact('title'));
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
            'image' => 'required|mimes:jpeg,jpg,png|max:2000|file'
        ]);

        $service = new service;

        $destinationPath = 'public/images';
        $image = $request->file('image');
        $new_name =  'service' . '.' . time() . '.' . $image->getClientOriginalName();
        $image->storeAs($destinationPath, $new_name);
        $service['image'] = $new_name;

        // updating the news data in database
        $service->name = $request->name;
        $service->description = $request->description;
        $service->details = $request->details;
        // timestamps update
        $service->updated_at = now();

        // upate the data
        $result = $service->save();

        // error checks
        if ($result) {
            return redirect()->back()->with('success', 'Service updated successfully.');
            // return response()->json(['success' => 'Service updated successfully.']);
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
            // return response()->json(['error' => 'Something went wrong, try again later.']);
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
        $title = 'Services-Cube Engineering and supplies ltd';
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
        $title = 'Edit Service-Cube Engineering and supplies ltd';
        $service = service::find($id);
        return view('Admin.pages.services', compact('title', 'service'));
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
            'image' => 'required|mimes:jpeg,jpg,png|max:2000|file'
        ]);

        $service = service::find($id);

        $destinationPath = 'public/images';
        $image = $request->file('image');
        $new_name =  'service' . '.' . time() . '.' . $image->getClientOriginalName();
        $image->storeAs($destinationPath, $new_name);
        $service['image'] = $new_name;

        // updating the news data in database
        $service->name = $request->name;
        $service->description = $request->description;
        $service->details = $request->details;
        // timestamps update
        $service->updated_at = now();

        // upate the data
        $result = $service->save();

        // error checks
        if ($result) {
            return redirect()->back()->with('success', 'Service updated successfully.');
            // return response()->json(['success' => 'Service updated successfully.']);
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
            // return response()->json(['error' => 'Something went wrong, try again later.']);
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
            // return redirect()->back()->with('success', 'Service deleted successfully.');
            return response()->json(['success' => 'Service deleted successfully.']);
        } else {
            // return redirect()->back()->with('fail', 'Something went wrong, try again later.');
            return response()->json(['error' => 'Something went wrong, try again later.']);
        }
    }
}
