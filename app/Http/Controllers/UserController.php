<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use View;
Use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 3;
        $users = User::paginate($pages);
        //
        // dd($users);
        return view('home', compact("users", 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'file_image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $image = $request->file('file_image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $new_file = 'images/' . date("Y") . '/' . date("m") . '/' . $new_name;
        $image->move(public_path('images/' . date("Y") . '/' . date("m")), $new_name);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'images' => $new_file
        ]);
        $user->save();
        return redirect()->route('user.index')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        // $user->delete();
        return view('edit', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required'
            ]
        );


        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if($image = $request->file('file_image')){
            $new_name = time() . '.' . $image->getClientOriginalExtension();
            $new_file = 'images/' . date("Y") . '/' . date("m") . '/' . $new_name;
            $image->move(public_path('images/' . date("Y") . '/' . date("m")), $new_name);
            $user->images = $new_file;
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'อัพเดทเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
    public function downloadPDF($id)
    {
        $users = User::find($id);
        $view = View::make('pdf', compact('users'));

        $html = $view->render();

        $pdf = new PDF();

        $pdf::SetTitle('Report');

        $pdf::AddPage();

        $pdf::SetFont('freeserif', '', 10);

        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output('report.pdf');
    }
}
