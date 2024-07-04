<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" type="image/png" size="32x32" href="{{ url('assets/images/favicon-32x32.png')}}">
    <link rel="stylesheet" href="{{ url('assets/front/css/jquery-ui.css')}}">
    <link href="{{ url('assets/css/pnotify/pnotify.css" rel="stylesheet')}}">
    <link rel="stylesheet" href="{{ url('assets/front/css/custom.css')}}">
    <script src="{{ url('assets/front/js/jquery-3.6.0.js')}}"></script>
    <script src="{{ url('assets/front/js/jquery-ui.js')}}"></script>
    <link href="{{ url('assets/css/fontawsome/font-awesome.min.css')}}" rel="stylesheet">
    <script src="{{ url('assets/front/js/angular.min.js')}}"></script>
    <script src="{{ url('assets/front/js/error_messages.js?20240628')}}"></script>
    <script src="{{ url('assets/front/js/success_messages.js?20240628')}}"></script>

    <title>@yield('title')</title>
    <link
      href="{{ url('assets/front/css/bootstrap.min.css')}}"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="{{ url('assets/front/css/bootstrap-icons.min.css')}}"
    />
    <style>
      .btn-outline-secondary {
        --bs-btn-hover-bg: #6c757d32;
      }
    </style>
  
    <script>
      var base_url = "{{ url('/') }}";
    </script>
  </head>
  <body style="background-color: #e9d8ff">