<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="{{asset('assets/font/iransans/iransans.css')}}" rel="stylesheet" id="font-css">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" id="main-css">

    @if(request()->route()->getName() === 'users')
        <link href="https://gudh.github.io/ihover/dist/styles/main.css" rel="stylesheet" id="ihover-css">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
