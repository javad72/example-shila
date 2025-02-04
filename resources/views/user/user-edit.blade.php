@extends('layouts.app')

@section('content')
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                        alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$data['name']??'بدون نام'.' '.$data['family']??''}}
                    </h5>
                    <h6>
                        {{$data['profession']??'بدون فیلد شغلی'}}
                    </h6>
                    <p class="proile-rating">امتیاز : <span>8/10</span></p>
                    <ul class="nav nav-tabs pr-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">مشخصات کاربری</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">کیف پول</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn small" name="Editable" value="فعال سازی حالت ویرایش"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <h2>مهارت ها</h2>
                    <div class="mb-3 d-flex flex-ror">
                        <input class="form-control w-100" type="text" placeholder="نام مهارت وارد کنید">
                        <button class="btn btn-outline-primary mr-1 " style="padding-top: 10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                            </svg>
                        </button>
                    </div>
                     <div class="d-flex flex-row flex-wrap">
                         <span class="p-1 m-1 rounded badge badge-success">
                             <a class="text-white" href="#">Web Designer</a>
                         </span>
                         <span class="p-1 m-1 rounded badge badge-success">
                             <a class="text-white" href="#">Web Developer</a>
                         </span>
                         <span class="p-1 m-1 rounded badge badge-success">
                             <a class="text-white" href="#">WordPress</a>
                         </span>
                         <span class="p-1 m-1 rounded badge badge-success">
                             <a class="text-white" href="#">WooCommerce</a>
                         </span>
                         <span class="p-1 m-1 rounded badge badge-success">
                             <a class="text-white" href="#">PHP, .Net</a>
                         </span>
                     </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="">
                            <div class="row ">
                                <div class="col-md-6">
                                    <label>شناسه کاربر</label>
                                </div>
                                <div class="col-md-6 d-flex flex-row align-items-baseline justify-content-between">
                                    <p class="mb-0">بدون شناسه</p>
                                </div>
                            </div>

                            <div class="row pt-3 pb-2 bg-light">
                                <div class="col-md-6">
                                    <label>نام </label>
                                </div>
                                <div class="col-md-6 d-flex flex-row align-items-baseline justify-content-between">
                                    <p class="mb-0">وارد نشده</p>
                                    <a class="text-dark text-muted" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-none group col-md-6">
                                    <input type="text" name="name"  value="{{$data['name']}}">
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
                                    <p class="mb-0">وارد نشده</p>
                                    <a class="text-dark text-muted" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-none group col-md-6">
                                    <input type="text" value="{{$data['family']}}" name="family">
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
                                    <p class="mb-0">وارد نشده</p>
                                    <a class="text-dark text-muted" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-none group col-md-6">
                                    <input type="text"  name="email" value="{{$data['email']}}">
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
                                    <p class="mb-0">وارد نشده</p>
                                    <a class="text-dark text-muted" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-none group col-md-6">
                                    <input type="text" name="phone" value="{{$data['phone']}}"  />

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
                                    <p class="mb-0">وارد نشده</p>
                                    <a class="text-dark text-muted" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-none group col-md-6">
                                    <input type="text" required>
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
                            <div class="row pt-3 pb-2 py-3">
                                <button class="btn btn-primary" type="submit">ذخیره</button>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


