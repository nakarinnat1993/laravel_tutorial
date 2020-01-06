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
        <h2>แก้ไขข้อมูล</h2>
        <form method="POST" action="{{action('UserController@update', $id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                    value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    value="{{$user->email}}" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>

    </div>
</div>
@endsection
