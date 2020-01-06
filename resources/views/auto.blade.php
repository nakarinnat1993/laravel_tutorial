@extends('layouts.app')

@section('title')
Auto Complete

@endsection

@section('content')
<h1 align="center" class="mt-5">AutoComplete Laravel</h1>
<br>
<div class="form-group">
    <input type="text" name="city_name" id="city_name" class="form-control input-lg" placeholder="ป้อนชื่อจังหวัด" />
    <div id="cityList">
    </div>
</div>
{{ csrf_field() }}
</div>


<script>
    $(document).ready(function(){
        $('#city_name').keyup(function(){
            var query = $(this).val();
            // console.log(query);
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('show') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#cityList').fadeIn();
                        $('#cityList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            $('#city_name').val($(this).text());
            $('#cityList').fadeOut();
        });
    });

</script>
@endsection
