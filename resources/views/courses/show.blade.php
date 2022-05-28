@extends('layout')

@section('content')
    <x-card class="container">
        <div class="row justify-content-center">
            <img src="{{ $course->image ?? asset('img/no-image.png') }}" class="w-25">
        </div>

        <p class="h2 text-center">{{$course->title}}</p>

        <p class="fs-5 text-center">
            <i class="fa-solid fa-user me-2"></i> {{$course->author}}
        </p>
        <x-course-tags class="d-flex d-flex justify-content-center" :tagsCsv="$course->tags"/>
        <p class="w-75 fs-5 mx-auto text-center">
            {{$course->description}}
        </p>

        <hr class="my-4">

        <x-course-sections :course="$course"/>
        
        @auth
            @cannot('view-course', $course)
                <div class="col-12 d-flex justify-content-center mt-3">
                    <form action="{{route('rents.store', ['course'=>$course->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="perioid" value="7">
                        <button type="submit" class="btn btn-outline-danger p-4 mx-2">Rent for week</button>
                    </form>

                    <form action="{{route('rents.store', ['course'=>$course->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="perioid" value="30">
                        <button type="submit" class="btn btn-outline-danger p-4 mx-2">Rent for month</button>
                    </form>

                    <form action="{{route('rents.store', ['course'=>$course->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="perioid" value="90">
                        <button type="submit" class="btn btn-outline-danger p-4 mx-2">Rent for 3 months</button>
                    </form>
                </div>
            @endcannot
        @else
            <p class="text-center mt-3 mb-0 fs-5">
                <a href="{{route('login')}}" class="link-danger">Log in</a> to rent a course.<br>
                Dont't have an account? <a href="{{route('register')}}" class="link-danger">Sign in</a>
            </p>
        @endauth
    </x-card>
@endsection