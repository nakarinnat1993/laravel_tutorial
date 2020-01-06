<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use App\User;

class SearchController extends Controller
{
    //
    function search()
    {
        return view('search');
    }
    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $result = $request->get('query');
            if ($result != '') {
                $data = DB::table('users')
                    ->where('name', 'like', '%' . $result . '%')
                    ->orWhere('email', 'like', '%' . $result . '%')->get();
            } else {
                $data = DB::table('users')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= "
                    <tr>
                        <td>" . $row->id . "</td>
                        <td>" . $row->name . "</td>
                        <td>" . $row->email . "</td>
                    </tr>";
                }
            } else {
                $output .= "
                    <tr>
                        <td align='center' colspan='5'>No Data</td>
                    </tr>";
            }
            $data=array('table_data'=>$output,'total_data'=>$total_row);
            echo json_encode($data);
        }
    }
}
