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
    <div class="mx-5 mb-3">
        <div class="container-fluid">
            <x-card class="row px-5">
                <div class="col-8">
                    <span class="fs-1 fw-bold w-auto"><span class="text-danger">Tuto</span>rials</span>
                </div>

                <div class="col-4 d-flex justify-content-end align-items-center">
                    <form action="{{ route('courses.index') }}" class="d-flex">
                        <input class="form-control me-2" type="search" name="search" value="{{request('search')}}" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>
                </div>
            </x-card>
            <div class="course-grid">
                @foreach ($courses as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            </div>
            <div class="row d-flex justify-content-center">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
@endsection