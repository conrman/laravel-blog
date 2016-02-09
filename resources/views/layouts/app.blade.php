<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- Fonts --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

</head>
<body id="app_layout">


    {{-- Header --}}
    @include ('layouts.header')

    {{-- Hero --}}
    @include ('partials.hero')

    {{-- Content Container --}}
    @include ('layouts.container')

    {{-- JavaScripts --}}
    <script src="{{ elixir('js/all.js') }}"></script>

    {{-- Footer --}}
    @include ('layouts.footer')
</body>
</html>
