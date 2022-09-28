<?php

namespace App\Http\Controllers;

use App\Models\timeline;
use App\Http\Requests\StoretimelineRequest;
use App\Http\Requests\UpdatetimelineRequest;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TimelineController extends Controller
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
        $title = 'Timeline Upload-Cube Engineering and General supplies Limited';
        // get all the data
        $timeline = timeline::all();
        $timelines = timeline::all();
        return view('Admin.pages.timeline', compact('title', 'timeline','timelines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretimelineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretimelineRequest $request)
    {
        $request->validate([
            'quote' => 'required|max:70',
            'title' => 'required|max:55',
        ]);

        // get all data from database
        $timeline = new timeline;

        // capture the file from the temporary table
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();

        $timeline->quote = $request->quote;
        $timeline->title = $request->title;

        // if file exists 
        if ($temporaryFile) {
            // new file name
            $new_name =  'timeline' . '.' . time() . '.' . $temporaryFile->filename;
            //  save file to database
            $timeline->image = $new_name;
            // move the file from the temporary folder to the permanent folder
            Storage::move('public/uploads/' . $temporaryFile->folder . '/' . $temporaryFile->filename, 'public/images/' . $new_name);
            // delete the temporary folder
            $directory = 'app/public/uploads/' . $temporaryFile->folder; // get the folder name
            File::deleteDirectory(storage_path($directory)); // delete the folder
            $temporaryFile->delete(); // delete the file from the temporary table
        }

        // save all data to database 
        $result = $timeline->save();

        if ($result) {
            return redirect()->route('timeline.create')->with('success', 'timeline uploaded successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function show(timeline $timeline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Timeline Edit-Cube Engineering and General supplies Limited';
        $timeline = Timeline::find($id);
        $timelines = timeline::all();
        return view('Admin.pages.timeline', compact('title', 'timeline','timelines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetimelineRequest  $request
     * @param  \App\Models\timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetimelineRequest $request, $id)
    {
        $request->validate([
            'quote' => 'required|max:255',
            'title' => 'required|max:255',
        ]);

        // get all data from database
        $timeline = timeline::find($id);

        // capture the file from the temporary table
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();
       
        $timeline->quote = $request->quote;
        $timeline->title = $request->title;
        
        // if file exists 
        if ($temporaryFile) {
            // new file name
            $new_name =  'timeline' . '.' . time() . '.' . $temporaryFile->filename;
            //  save file to database
            $timeline->image = $new_name;
            // move the file from the temporary folder to the permanent folder
            Storage::move('public/uploads/' . $temporaryFile->folder . '/' . $temporaryFile->filename, 'public/images/' . $new_name);
            // delete the temporary folder
            $directory = 'app/public/uploads/' . $temporaryFile->folder; // get the folder name
            File::deleteDirectory(storage_path($directory)); // delete the folder
            $temporaryFile->delete(); // delete the file from the temporary table
        }

        // save all data to database 
        $result = $timeline->save();

        if ($result) {
            return redirect()->route('timeline.create')->with('success', 'timeline updated successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeline = Timeline::find($id);
        $results = $timeline->delete();

        if ($results) {
            return redirect()->back()->with('success', 'Timeline Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Timeline Delete Failed');
        }
    }
}
