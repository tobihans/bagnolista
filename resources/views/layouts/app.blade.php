<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }} ">
<link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
<link rel="stylesheet" href=" {{ asset('fontawesome/css/all.css') }} ">
<title>Bagnolista</title>
<body>
        <header class="fixed-top">
            @include('include.navbar')
        </header>
        @yield('content')

        <footer class="footer sticky-footer">
            @include('include.footer')
        </footer>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
