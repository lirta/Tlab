<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran</title>

    @stack('before-style')
    @include('include.style')
    @stack('after-style')
</head>
<body>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/category')}}">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/food')}}">Food</a>
        </li>
    </ul>
    <div class="container-fluid">
        <div class="row">
            @stack('before-content')
            @yield('content')
            @stack('after-content')
        </div>
    </div>

    @stack('before-script')
    @include('include.script')
    @stack('after-script')
</body>
</html>