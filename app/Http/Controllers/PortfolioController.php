<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use App\Http\Requests\StoreportfolioRequest;
use App\Http\Requests\UpdateportfolioRequest;

class PortfolioController extends Controller
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
        $title = 'portfolio Upload-Cube Engineering and supplies ltd';
        return view('Admin.pages.portfolio', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreportfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreportfolioRequest $request)
    {
        $request->validate([
            'name' => 'required|max:55',
            'about' => 'required|max:255',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $destinationPath = 'public/images';
        $image = $request->file('image');
        // $new_name = time() . '.' . 'portfolio' . '.' . $image->getClientOriginalExtension();
        $new_name =  'portfolio' . '.' . time() . '.' . $image->getClientOriginalName();

        $image->storeAs($destinationPath, $new_name);

        // creating new object for portfolio
        $portfolio = new portfolio;

        // saving the portfolio data in database
        $portfolio->name = $request->name;
        $portfolio->about = $request->about;
        $portfolio->status = $request->status;
        $portfolio->image = $new_name;

        $result = $portfolio->save();

        // error checks
        if ($result) {
            return redirect()->route('portfolio.create')->with('success', 'Project created successfully.');
        } else {
            return redirect()->route('portfolio.create')->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Project-Cube Engineering and supplies ltd';
        $portfolio = portfolio::find($id);
        return view('Admin.pages.portfolio', compact('title', 'portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateportfolioRequest  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateportfolioRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|max:55',
            'about' => 'required|max:255',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $portfolio = portfolio::find($id);

        $destinationPath = 'public/images';
        $image = $request->file('image');
        $new_name =  'portfolio' . '.' . time() . '.' . $image->getClientOriginalName();
        $image->storeAs($destinationPath, $new_name);


        // updating the portfolio data in database
        $portfolio->name = $request->name;
        $portfolio->about = $request->about;
        $portfolio->status = $request->status;
        $portfolio->image = $new_name;
        // timestamps update
        $portfolio->updated_at = now();

        // upate the data
        $result = $portfolio->save();

        // error checks
        if ($result) {
            return redirect()->back()->with('success', 'Project updated successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = portfolio::where('id', $id)->delete();

        // error checks
        if ($result) {
            return redirect()->back()->with('success', 'Portfolio deleted successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
        }
    }
}
