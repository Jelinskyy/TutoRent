@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv)
@endphp

<p class="mb-2">
    @foreach ($tags as $tag)
        <a href="{{ route('courses.index', ['tag' => $tag]) }}" class="btn btn-danger rounded-pill fs-5 mb-2">{{ $tag }}</a>
    @endforeach
</p>