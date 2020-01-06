@extends('layouts.app')


@section('title','Insert User')

@section('content')
@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul> @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
</div>
@endif


<div class="row">
    <div class="col-sm-12">
        <h2>เพิ่มข้อมูล</h2>
        <form method="POST" action="{{url('user')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="file_image">Image</label>
                <input type="file"  id="file_image" name="file_image" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
