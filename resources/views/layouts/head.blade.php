<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('favicon.png')}}" rel="icon" type="image/x-icon">
    <title>پروژه تستی</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="{{asset('assets/font/iransans/iransans.css')}}" rel="stylesheet" id="font-css">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" id="main-css">
    <link href="{{asset('assets/css/iao-alert.min.css')}}" rel="stylesheet" id="alert-css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="p-3">
    <nav class="container nav bg-white rounded shadow py-3">
        <a class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'users') current @endif" href="{{route('users')}}">لیست کاربران</a>
        <a class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'user.edit') current @endif" href="{{route('user.edit')}}">افزودن کاربر</a>
    </nav>
</div>
