<!DOCTYPE html>
<html lang="th">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
</head>

<body>
    <h2 align="center">คุณ : {{$users->name}} | รหัสประจำตัว : {{$users->id}}</h2>
    <h3 align="center">Email : {{$users->email}}</h3>
    <p align="right">ลงชื่อ...........................</p>
    <p align="right">{{$users->name}} </p>
</body>

</html>
