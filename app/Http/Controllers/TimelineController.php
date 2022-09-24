<?php

namespace App\Http\Controllers;

use App\Models\timeline;
use App\Http\Requests\StoretimelineRequest;
use App\Http\Requests\UpdatetimelineRequest;

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
        $title = 'Timeline Upload-Cube Engineering and supplies ltd';
        // get all the data
        $timeline = timeline::all();
        return view('Admin.pages.timeline', compact('title', 'timeline'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $destinationPath = 'public/images';
        $image = $request->file('image');
        $new_name =  'timeline' . '.' . time() . '.' . $image->getClientOriginalName();
        $image->storeAs($destinationPath, $new_name);

        // creating new object for timeline
        $timeline = new Timeline;

        // saving the timeline data in database
        $timeline->quote = $request->quote;
        $timeline->title = $request->title;
        $timeline->image = $new_name;

        $results = $timeline->save();

        if ($results) {
            return redirect()->back()->with('success', 'Timeline has been added successfully');
        } else {
            return redirect()->back()->with('error', 'Timeline has not been added');
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
        $title = 'Timeline Edit-Cube Engineering and supplies ltd';
        $timeline = Timeline::find($id);
        return view('Admin.pages.timeline', compact('title', 'timeline'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $destinationPath = 'public/images';
        $image = $request->file('image');
        $new_name =  'timeline' . '.' . time() . '.' . $image->getClientOriginalName();
        $image->storeAs($destinationPath, $new_name);

        // creating new object for news
        $timeline = timeline::find($id);

        // saving the news data in database
        $timeline->quote = $request->quote;
        $timeline->title = $request->title;
        $timeline->image = $new_name;
        $results = $timeline->save();

        if ($results) {
            return redirect()->route('timeline.create')->with('success', 'Timeline Updated Successfully');
        } else {
            return redirect()->route('timeline.create')->with('error', 'Timeline Update Failed');
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
