@extends('layouts.app')

@section('content')
<div class="container emp-profile">
    <div class="row">

        <div class="col-md-8">
            <div class="profile-head">
                <h5>
                    {{$firstName??'بدون نام'}}
                    {{$lastName??''}}
                </h5>
                <h6>
                    {{$profession??'بدون فیلد شغلی'}}
                </h6>
                <p class="proile-rating">امتیاز : <span>8/10</span></p>
                <ul class="nav nav-tabs pr-0" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">مشخصات کاربری</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$id??'disabled'}}" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">وضعیت کاربر </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="profile-img">

                    <img
                        id="previewImage"
                        src="{{$image}}"
                        alt=""/>


                <a href="#" id="imageHandle" class="file btn btn-lg btn-primary">
                    تغیر تصویر
                </a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form id="userData"  method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
                        <input  type="file" name="image" class="d-none" accept="image/*"/>
                        @csrf
                        <input type="hidden" name="id" value="{{$id??0}}" >
                        <div class="row ">
                            <div class="col-md-6">
                                <label>شناسه کاربر</label>
                            </div>
                            <div class="col-md-6 d-flex flex-row align-items-baseline justify-content-between">
                                <p class="mb-0">{{$username??'بدون شناسه'}}</p>
                            </div>
                        </div>

                        <div class="row pt-3 pb-2 bg-light">
                            <div class="col-md-6">
                                <label>نام </label>
                            </div>
                            <div class="col-md-6 d-flex flex-row align-items-baseline justify-content-between">
                                <p class="mb-0">{{$firstName ?: old('firstName', 'وارد نشده')}}</p>
                                <a class="text-dark text-muted" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="d-none group col-md-6">
                                <input type="text" name="firstName"  value="{{$firstName ?: old('firstName', 'وارد نشده')}}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>نام </label>
                                <button type="button" class="btn p-0 position-absolute bg-transparent text-muted" style="left: 0 ; top:5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="row pt-3 pb-2">
                            <div class="col-md-6">
                                <label>نام خانوادگی</label>
                            </div>
                            <div class="col-md-6 d-flex flex-row align-items-baseline justify-content-between">
                                <p class="mb-0">{{$lastName?: old('lastName', 'وارد نشده')}}</p>
                                <a class="text-dark text-muted" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="d-none group col-md-6">
                                <input type="text" value="{{$lastName?: old('lastName', 'وارد نشده')}}" name="lastName">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>نام خانوادگی</label>
                                <button type="button" class="btn p-0 position-absolute bg-transparent text-muted" style="left: 0 ; top:5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="row pt-3 pb-2 bg-light">
                            <div class="col-md-6">
                                <label>پست الکترونیکی</label>
                            </div>
                            <div class="col-md-6 d-flex flex-row align-items-baseline justify-content-between">
                                <p class="mb-0">{{$email?: old('email', 'وارد نشده')}}</p>
                                <a class="text-dark text-muted" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="d-none group col-md-6">
                                <input type="text"  name="email" value="{{$email?: old('email')}}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>پست الکترونیکی</label>
                                <button type="button" class="btn p-0 position-absolute bg-transparent text-muted" style="left: 0 ; top:5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="row pt-3 pb-2">
                            <div class="col-md-6">
                                <label>تلفن</label>
                            </div>
                            <div class="col-md-6 d-flex flex-row align-items-baseline justify-content-between">
                                <p class="mb-0">{{$phone?: old('phone', 'وارد نشده')}}</p>
                                <a class="text-dark text-muted" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="d-none group col-md-6">
                                <input type="text" name="phone" value="{{$phone?: old('phone')}}"  />

                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>موبایل</label>
                                <button type="button" class="btn p-0 position-absolute bg-transparent text-muted" style="left: 0 ; top:5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="row pt-3 pb-2 bg-light">
                            <div class="col-md-6">
                                <label>فیلد شغلی</label>
                            </div>
                            <div class="col-md-6 d-flex flex-row align-items-baseline justify-content-between">
                                <p class="mb-0">{{$profession ?: old('profession', 'وارد نشده')}}</p>
                                <a class="text-dark text-muted" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="d-none group col-md-6">
                                <input type="text" name="profession" value="{{$profession ?: old('profession')}}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>فیلد شغلی </label>
                                <button type="button" class="btn p-0 position-absolute bg-transparent text-muted" style="left: 0 ; top:5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            @if ($errors->any())
                                <div style="color: red;">
                                    <h4>اطلاعات به علت خطاهای زیر ذخیره نشد!</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="row pt-3 pb-2 py-3">
                            <button id="saveButton" class="btn btn-primary" type="submit">{{ isset($id) ?'بروزرسانی':'ذخیره'}}</button>
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="status">وضعیت کاربر :</label>
                        </div>
                        <div class="col-md-9">
                            <div class="btn-switch btn-rect button-16" >
                                <input type="checkbox" class="checkbox" name="status"  @if($status == 1) checked @endif />
                                <div class="knob"></div>
                                <div class="btn-bg"></div>
                            </div>
                        </div>
                    </div>
                    <div id="message"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


