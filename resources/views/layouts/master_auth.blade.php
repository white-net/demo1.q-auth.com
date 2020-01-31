<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="{{ url('/') }}/img/favicon.ico">
  <link href="{{ url('/') }}/css/bootstrap.min.css" rel="stylesheet"><!-- Loading Bootstrap -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">

  @yield('styles')
</head>

<body>
  @include('partials.header')
  <div class="container">
    @yield('content')
  </div>

  @include('partials.footer')

  <!--
  Bootstrap core JavaScript
  ==================================================
  -->

  <script src="{{ url('/') }}/js/jquery-3.4.1.min.js"></script>
  <script src="{{ url('/') }}/js/bootstrap.min.js"></script>

  @yield('scripts')
</body>

</html>