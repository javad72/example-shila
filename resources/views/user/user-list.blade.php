@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">لیست کاربران</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($users as $user)

                <div class="ih-item square effect12 left_to_right">
                    <a href="{{route('user.edit' , ["id"=>$user->id])}}">
                        <div class="img"><img src="{{$user->image}}" alt="img"></div>
                        <div class="info">
                            <h3>{{$user->firstName}} {{$user->LastName}}</h3>
                            <p>{{$user->profession}}</p>
                        </div>
                    </a>
                </div>
                <!-- end normal -->
            @endforeach
        </div>
    </div>
@endsection
