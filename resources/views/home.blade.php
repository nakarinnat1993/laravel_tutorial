@extends('layouts.app')


@section('title','Home')

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
        <h1>Home</h1>
        <div align="right"><a href="{{route('user.create')}}" class="btn btn-primary">Insert</a></a></div>

    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class='table table-bordered'>
            <thead>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>PDF</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <?php
            $page_get = empty($_GET["page"])?1:$_GET["page"];
            $i = ($page_get-1)*$pages;
            ?>
            @foreach ($users as $item)
            <?php
            $i++;
            ?>
            <tr>
                <td align="center">{{$i}}</td>
                <td align="center"><img src="{{$item["images"]}}" alt="" srcset="" width="80px"></td>
                <td>{{$item["name"]}}</td>
                <td>{{$item["email"]}}</td>
                <td align="center"><a href="{{action('UserController@downloadPDF', $item['id'])}}" class="btn btn-info" target="_blank">PDF</a></td>
                <td align="center"><a href="{{action('UserController@edit', $item['id'])}}" class="btn btn-warning">Edit</a></td>
                <td align="center">
                    <form method="post" class="delete_form" action="{{action('UserController@destroy', $item['id'])}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>

            @endforeach
        </table>
        {{ $users->links() }}
    </div>

</div>
<script>
    $(document).ready(function(){
        // alert("dd");
        $('.delete_form').on('submit', function(){
            if(confirm("คุณต้องการลบข้อมูลหรือไม่ ?")) {
                return true;
            }else {
                return false;
            }
        });
    });

</script>
@endsection
