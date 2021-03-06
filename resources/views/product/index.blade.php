@extends('layouts.app');

@section('title')
Show product

@endsection

@section('content')
<h2 align="center">Relation Database</h2>
<br>
<a href="{{route('product.create')}}" class="btn btn-info">เพิ่มข้อมูล</a>
<div class="row">
    <div class="col-md-12">
        <br><a href=""></a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th>ประเภทสินค้า</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{number_format($row->price,2)}}</td>
                    <td>{{$row->typeProduct->type_name}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
        {{$products->links()}}
    </div>
</div>
<div class="card-body">
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" >
        <br>
        <br>
        <button class="btn btn-success">Import Data</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export Data</a>
    </form>
</div>
@endsection
