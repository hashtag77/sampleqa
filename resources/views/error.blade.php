<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SampleQA') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="{{ asset('js/fontawesome.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">
</head>
<body>
  <div id="notfound">
    <div class="notfound">
      <div class="notfound-404">
        <h1>Oops!</h1>
        <h2>{{ $error }}</h2>
      </div>
      <a href="{{ url('/discussions') }}">Go TO Discussions</a>
      <a href="{{ url('/profile/'.Auth::user()->username) }}">Go TO Dashboard</a>
    </div>
  </div>
</body>
</html>