<?php

namespace App\Http\Controllers;

class MultiFileController extends Controller
{
    //
     function index()
    {
        return view('multifile');
    }

     function upload()
    {

        echo "TEST";
        // $imageName = request()->file->getClientOriginalName();
        // request()->file->move(public_path('upload-image'),$imageName);
        //return response()->json("[uoloades]")
    }

}
