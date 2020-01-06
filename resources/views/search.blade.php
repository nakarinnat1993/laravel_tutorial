@extends('layouts.app')


@section('title','Search')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1>Search Ajax</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <input type="text" name="search" id="search" class='form-control' placeholder="Search Data">
        <br>
        <h3>Total : <span id="total_records"></span></h3>
        <table class='table table-bordered'>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>
<script>
    $(document).ready(function(){
        fetch_data();
    });
    $('#search').on('keyup', function(){
        var query = $(this).val();
        // console.log(query);
        fetch_data(query);
    });

    function fetch_data(query = ''){
        $.ajax({
            url:"{{ route('action') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
        })
    }
</script>
@endsection
