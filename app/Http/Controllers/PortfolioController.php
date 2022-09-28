<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use App\Http\Requests\StoreportfolioRequest;
use App\Http\Requests\UpdateportfolioRequest;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $title = 'portfolio Upload-Cube Engineering and General supplies Limited';
        $portfolio = portfolio::all();
        $portfolios = portfolio::all();
        return view('Admin.pages.portfolio', compact('title','portfolio','portfolios'));
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
        ]);

        // get all data from database
        $portfolio = new portfolio;

        // capture the file from the temporary table
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();

        $portfolio->name = $request->name;
        $portfolio->about = $request->about;
        $portfolio->status = $request->status;

        // if file exists 
        if ($temporaryFile) {
            // new file name
            $new_name =  'portfolio' . '.' . time() . '.' . $temporaryFile->filename;
            //  save file to database
            $portfolio->image = $new_name;
            // move the file from the temporary folder to the permanent folder
            Storage::move('public/uploads/' . $temporaryFile->folder . '/' . $temporaryFile->filename, 'public/images/' . $new_name);
            // delete the temporary folder
            $directory = 'app/public/uploads/' . $temporaryFile->folder; // get the folder name
            File::deleteDirectory(storage_path($directory)); // delete the folder
            $temporaryFile->delete(); // delete the file from the temporary table
        }

        // save all data to database 
        $result = $portfolio->save();

        if ($result) {
            return redirect()->route('portfolio.create')->with('success', 'portfolio uploaded successfully.');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, try again later.');
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
        $title = 'Edit Project-Cube Engineering and General supplies Limited';
        $portfolio = portfolio::find($id);
        $portfolios = portfolio::all();
        return view('Admin.pages.portfolio', compact('title', 'portfolios','portfolio'));
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
        ]);

        $portfolio = portfolio::find($id);

        // capture the file from the temporary table
        $temporaryFile = TemporaryFile::where('filename', $request->image)->first();

        $portfolio->name = $request->name;
        $portfolio->about = $request->about;
        $portfolio->status = $request->status;

        // if file exists 
        if ($temporaryFile) {
            // new file name
            $new_name =  'portfolio' . '.' . time() . '.' . $temporaryFile->filename;
            //  save file to database
            $portfolio->image = $new_name;
            // move the file from the temporary folder to the permanent folder
            Storage::move('public/uploads/' . $temporaryFile->folder . '/' . $temporaryFile->filename, 'public/images/' . $new_name);
            // delete the temporary folder
            $directory = 'app/public/uploads/' . $temporaryFile->folder; // get the folder name
            File::deleteDirectory(storage_path($directory)); // delete the folder
            $temporaryFile->delete(); // delete the file from the temporary table
        }

        // save all data to database 
        $result = $portfolio->save();

        if ($result) {
            return redirect()->route('portfolio.create')->with('success', 'portfolio updated successfully.');
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
