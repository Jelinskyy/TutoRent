@extends('layout')

@section('content')
    {{-- Welcome bar --}}
    <x-card class="my-3 py-4 w-50 mx-auto">
        <div class="row d-flex justify-content-center">
            <span class="fs-1 fw-bold w-auto">Gain <span class="text-danger">Knowledge</span> Easy Way</span>
        </div>
        <div class="row d-flex justify-content-center">
            <span class="w-50 fs-4 text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat beatae reprehenderit voluptatibus ipsa quos nulla nemo error esse, ipsam, ipsum vel, natus quisquam ut?</span>
        </div>
    </x-card>

    {{-- Courses --}}
    <div class="mx-5">
        <div class="container-fluid">
            <x-card class="row d-flex justify-content-center">
                <span class="fs-1 fw-bold w-auto"><span class="text-danger">Tuto</span>rials</span>
            </x-card>
            <div class="course-grid">
                <x-card class="row d-flex align-items-center">
                    <div class="col-4">
                        <img src="{{ asset('img/no-image.png') }}" class="w-100 rounded">
                    </div>
                    <div class="col-8 p-4">
                        <h2>Lorem ipsum dolor sit, amet consectetur adipisicing.</h2>
                        <p class="fs-5 mb-2">
                            <i class="fa-solid fa-user me-2"></i> John Doe
                        </p>
                        <p class="mb-2">
                            <a href="#" class="btn btn-danger rounded-pill fs-5 mb-2">laravel</a>
                            <a href="#" class="btn btn-danger rounded-pill fs-5 mb-2">Ajax</a>
                            <a href="#" class="btn btn-danger rounded-pill fs-5 mb-2">Vue</a>
                        </p>
                        <a href="#" class="btn d-block ms-auto fs-5">Show more...</a>
                    </div>
                </x-card>
                
            </div>
        </div>
    </div>
@endsection