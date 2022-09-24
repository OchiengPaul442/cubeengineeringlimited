<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Http\Requests\StoreFAQsRequest;
use App\Http\Requests\UpdateFAQsRequest;

class FAQsController extends Controller
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
        $title = 'FAQs Upload-Cube Engineering and supplies ltd';
        return view('Admin.pages.FAQs', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFAQsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFAQsRequest $request)
    {
        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);        

        // creating new object for FAQs
        $FAQs = new FAQs;

        // saving the FAQs data in database
        $FAQs->question = $request->question;
        $FAQs->answer = $request->answer;

        $result = $FAQs->save();

        // error checks
        if ($result) {
            return redirect()->route('FAQs.create')->with('success', 'Question and answer saved successfully.');
        } else {
            return redirect()->route('FAQs.create')->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQs  $fAQs
     * @return \Illuminate\Http\Response
     */
    public function show(FAQs $fAQs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQs  $fAQs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'FAQs Edit-Cube Engineering and supplies ltd';
        $FAQs = FAQs::find($id);
        return view('Admin.pages.FAQs', compact('title', 'FAQs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFAQsRequest  $request
     * @param  \App\Models\FAQs  $fAQs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFAQsRequest $request, $id)
    {
        $request->validate([
            'question' => 'required|max:100',
            'answer' => 'required',
        ]);        

        // creating new object for FAQs
        $FAQs = FAQs::find($id);

        // saving the FAQs data in database
        $FAQs->question = $request->question;
        $FAQs->answer = $request->answer;

        $result = $FAQs->save();

        // error checks
        if ($result) {
            return redirect()->route('FAQs.create')->with('success', 'Question and answer updated successfully.');
        } else {
            return redirect()->route('FAQs.create')->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQs  $fAQs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $FAQs = FAQs::find($id);
        $result = $FAQs->delete();

        // error checks
        if ($result) {
            return redirect()->route('Admin.dashboard')->with('success', 'Question and answer deleted successfully.');
        } else {
            return redirect()->route('Admin.dashboard')->with('fail', 'Something went wrong, try again later.');
        }
    }
}
