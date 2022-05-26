<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Tutorent</title>
</head>
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-light bg-light justyfi-content-center shadow-sm">
        <div class="container">
            <span class="navbar-brand mb-0 fs-2 fw-bold p-0">
                <span class="text-danger">Tuto</span>Rent
            </span>

            <div class="d-flex ms-auto fs-3">
                <i class="fa-solid fa-user-plus mx-3"></i>
                <i class="fa-solid fa-arrow-right-to-bracket mx-3"></i>
            </div>
        </div>
    </nav>
    
    @yield('content')
</body>
</html>