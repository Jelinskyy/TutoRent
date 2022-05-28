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

        <x-course-sections :sections="$course->sections()->get()"/>

        <div class="col-12 d-flex justify-content-center mt-3">
            <a href="#" class="btn btn-outline-danger p-4 mx-2">Rent for week</a>
            <a href="#" class="btn btn-outline-danger p-4 mx-2">Rent for month</a>
            <a href="#" class="btn btn-outline-danger p-4 mx-2">Rent for 3 months</a>
        </div>
    </x-card>
@endsection