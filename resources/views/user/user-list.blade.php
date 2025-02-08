@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center text-white">لیست کاربران</h2>
        <hr>
        <div class="row user-list">
            @foreach ($users as $user)
            <div class="col-md-4 col-lg-3 p-1">
                <div class="w-100 card rounded-2x bg-white">
                    <div class="card-header" style=" background-image: url('{{$user->image}}')">
                    </div>
                    <div class="card-body">
                        <h3>{{$user->firstName}} {{$user->lastName}}</h3>
                        <p>{{$user->profession}}</p>
                    </div>
                    <div class="card-footer pt-4 d-flex  flex-row justify-content-between">
                        <div>
                            <div class="btn-switch btn-rect button-16" >
                                <input type="checkbox" class="checkbox" data-id="{{$user->id}}" name="status"  @if($user->status == 1) checked @endif />
                                <div class="knob"></div>
                                <div class="btn-bg"></div>
                            </div>
                        </div>
                       <div>
                           <a href="{{route('user.edit' ,['id'=>$user->id])}}" class="text-info">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                   <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                   <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                               </svg>
                           </a>
                       </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
@endsection
