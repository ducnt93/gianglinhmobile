<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giang Linh Mobile </title>

    <!-- Bootstrap -->
    <link href="{{url('/theme/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('/theme/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('/theme/production/css/custom.css')}}" rel="stylesheet">
</head>

<body style="background:#F7F7F7;">
@yield('content')
</body>
<!-- jQuery -->
<script src="{{url('/theme/vendors/jquery/dist/jquery.min.js')}}"></script>
<script>
    $('#errors').delay(3000).slideUp();
</script>
</html>