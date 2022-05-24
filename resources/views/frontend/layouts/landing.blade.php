<!DOCTYPE html>
<html lang="bn" style=" background: aliceblue; ">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="{{asset('frontend')}}/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        {{-- <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="{{asset('frontend')}}/css/style.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="{{asset('frontend')}}/img/favicon.ico" type="image/x-icon" />
        <title>FLID Android App</title>
    </head>
    <body>
        <div class="mobile-size">
            
            @include('frontend.layouts.include.header')
        
            @yield('fronten-content')
        
            @include('frontend.layouts.include.footer')

        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{asset('frontend')}}/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>