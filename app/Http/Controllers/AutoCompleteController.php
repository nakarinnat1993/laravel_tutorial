<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    //
    public function index()
    {
        return view('auto');
    }
    public function show(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $result = DB::table('provinces')->Where('name_th', 'like', $query . '%')->get();
            $output = "<ul class='dropdown-menu' style='display:block; position:relative'>";
            foreach ($result as $row) {
                $output .= "<li>" . $row->name_th . "</li>";
            }
            $output .= "</ul>";
            echo $output;

        }
        //$user = DB::table('users');
    }
}
