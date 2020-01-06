@extends('layouts.app');

@section('title')
Create product

@endsection

@section('content')
<h3 align="center">บันทึกข้อมูลสินค้า</h3>

<form method="post" action="{{url('product')}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>ชื่อสินค้า</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label>ราคา</label>
        <input type="text" name="price" class="form-control" />
    </div>
    <label>ประเภท</label>
    <select class="form-control" name="typename">
        <option value="1">เครื่องดื่ม</option>
        <option value="2">ของใช้ไฟฟ้า</option>
        <option value="3">เครื่องเขียน</option>
        <option value="4">กระเป๋า</option>
    </select>
    <br>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="บันทึก" />
    </div>
</form>


@endsection
