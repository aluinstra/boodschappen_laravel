<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"boodschappen"</title>
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

    @yield('head')
</head>

<body>
    @yield('content')

    @include('layout.menu')
</body>

</html>