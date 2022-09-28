<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use App\Http\Requests\StoretestimonialRequest;
use App\Http\Requests\UpdatetestimonialRequest;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
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
        $title = 'Testimonials Upload-Cube Engineering and General supplies Limited';
        $testimonial = testimonial::all();
        $testimonials = testimonial::all();
        return view('Admin.pages.testimonials', compact('title','testimonial','testimonials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretestimonialRequest $request)
    {

        $request->validate([
            'name' => 'required|max:55',
            'occupation' => 'required|max:255',
            'comments' => 'required',
        ]);

        // get all data from database
        $testimonial = new testimonial;

        // capture the file from the temporary table
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();

        $testimonial->name = $request->name;
        $testimonial->occupation = $request->occupation;
        $testimonial->comments = $request->comments;

        // if file exists 
        if ($temporaryFile) {
            // new file name
            $new_name =  'testimonial' . '.' . time() . '.' . $temporaryFile->filename;
            //  save file to database
            $testimonial->image = $new_name;
            // move the file from the temporary folder to the permanent folder
            Storage::move('public/uploads/' . $temporaryFile->folder . '/' . $temporaryFile->filename, 'public/images/' . $new_name);
            // delete the temporary folder
            $directory = 'app/public/uploads/' . $temporaryFile->folder; // get the folder name
            File::deleteDirectory(storage_path($directory)); // delete the folder
            $temporaryFile->delete(); // delete the file from the temporary table
        }

        // save all data to database 
        $result = $testimonial->save();

        if ($result) {
            return redirect()->route('testimonials.create')->with('success', 'testimonial uploaded successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Testimonials-Cube Engineering and General supplies Limited';
        $Testimonial = Testimonial::find($id);
        $testimonials = testimonial::all();
        return view('Admin.pages.testimonials', compact('title', 'Testimonial','testimonials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetestimonialRequest  $request
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetestimonialRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|max:55',
            'occupation' => 'required|max:255',
            'comments' => 'required',
        ]);

        $testimonial = Testimonial::find($id);

        // capture the file from the temporary table
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();

        $testimonial->name = $request->name;
        $testimonial->occupation = $request->occupation;
        $testimonial->comments = $request->comments;

        // if file exists 
        if ($temporaryFile) {
            // new file name
            $new_name =  'testimonial' . '.' . time() . '.' . $temporaryFile->filename;
            //  save file to database
            $testimonial->image = $new_name;
            // move the file from the temporary folder to the permanent folder
            Storage::move('public/uploads/' . $temporaryFile->folder . '/' . $temporaryFile->filename, 'public/images/' . $new_name);
            // delete the temporary folder
            $directory = 'app/public/uploads/' . $temporaryFile->folder; // get the folder name
            File::deleteDirectory(storage_path($directory)); // delete the folder
            $temporaryFile->delete(); // delete the file from the temporary table
        }

        // save all data to database 
        $result = $testimonial->save();

        if ($result) {
            return redirect()->route('testimonials.create')->with('success', 'testimonial uploaded successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $result = $testimonial->delete();

        // error checks
        if ($result) {
            return redirect()->back()->with('success', 'Testimonial deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }
}
