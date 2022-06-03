@props(['course'])

<x-card class="row d-flex align-items-center">
    <div class="col-4">
        <img src="{{ $course->image ? '/storage/'.$course->image : asset('img/no-image.png') }}" class="w-100 rounded">
    </div>
    <div class="col-8 p-4">
        <h2>{{ $course->title }}</h2>
        <p class="fs-5 mb-2">
            <i class="fa-solid fa-user me-2"></i> {{$course->author}} <br>
            <i class="fa-solid fa-file-export me-2"></i> {{$course->rent_count}}
        </p>
        <x-course-tags :tagsCsv="$course->tags"/>
        <a href="{{route('courses.show', ['course' => $course->id])}}" class="btn d-block ms-auto fs-5 border">Show more...</a>
    </div>
</x-card>