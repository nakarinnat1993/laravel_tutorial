<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multiple Upload</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
        rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript">
    </script>
</head>

<body>



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Multiple Upload </h1><br>
                <div class="form-group">
                    <div class="file-loading">
                        <input id="image-file" type="file" name="file" accept="image/*" data-min-file-count="1"
                            multiple>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
<script>
    $("#image-file").fileinput({
        uoloadUrl:'{{route('upload')}}',
        theme:'fa',
        uploadExtraData:function(){
            return{
                _token:'{{csrf_token()}}',
            }
        },
        allowedFileExtensions:['jpg','png','jpeg','gif'],


    })
</script>

</html>
