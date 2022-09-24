<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use App\Http\Requests\StoretestimonialRequest;
use App\Http\Requests\UpdatetestimonialRequest;

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
        $title = 'Testimonials Upload-Cube Engineering and supplies ltd';
        return view('Admin.pages.testimonials', compact('title'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $destinationPath = 'public/images';
        $image = $request->file('image');
        $new_name =  'testimonial' . '.' . time() . '.' . $image->getClientOriginalName();
        $image->storeAs($destinationPath, $new_name);
    
        // creating new object for news
        $testimonial = new Testimonial;

        // saving the news data in database
        $testimonial->name = $request->name;
        $testimonial->occupation = $request->occupation;
        $testimonial->comments = $request->comments;
        $testimonial->image = $new_name;

        $result = $testimonial->save();

        // error checks
        if ($result) {
            return redirect()->route('testimonials.create')->with('success', 'Testimonial added successfully.');
        } else {
            return redirect()->route('testimonials.create')->with('fail', 'Something went wrong, try again later.');
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
        $title = 'Edit Testimonials-Cube Engineering and supplies ltd';
        $Testimonial = Testimonial::find($id);
        return view('Admin.pages.testimonials', compact('title', 'Testimonial'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $testimonial = Testimonial::find($id);

        $destinationPath = 'public/images';
        $image = $request->file('image');
        $new_name =  'testimonial' . '.' . time() . '.' . $image->getClientOriginalName();
        $image->storeAs($destinationPath, $new_name);
    
        // updating the news data in database
        $testimonial->name = $request->name;
        $testimonial->occupation = $request->occupation;
        $testimonial->comments = $request->comments;
        $testimonial->image = $new_name;
        // timestamps update
        $testimonial->updated_at = now();

        // upate the data
        $result = $testimonial->save();

        // error checks
        if ($result) {
            return redirect()->back()->with('success', 'Testimonial updated successfully.');
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
