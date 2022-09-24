<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class Uploads extends Controller
{
    public function store(Request $request)
    {
    //    if($request->hasFile('image')){
    //        $file = $request->file('image');
    //        $filename = $file->getClientOriginalName();
    //        $folder = time() . '.' . now()->timestamp;
    //        $file->storeAs('public/uploads/temp/'.$folder,$filename);

    //        TemporaryFile::create([
    //            'folder' => $folder,
    //            'filename' => $filename,
    //        ]);

    //        return $filename;
    //    }

    //      return '';
    }
}
