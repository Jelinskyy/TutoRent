@extends('layout')
@section('content')
    <x-card class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Link</th>
                    <th scope="col">Expire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rents as $rent)
                <tr class="position-relative">
                    <td class="align-middle">
                        <img src="{{ $rent->course->image ? '/storage/'.$rent->course->image : asset('img/no-image.png') }}" width="150px">
                    </td>
                    <td class="align-middle">{{$rent->course->title}}</td>
                    <td class="align-middle">{{$rent->course->author}}</td>
                    <td class="align-middle">
                        <a href="{{route('courses.show', ['course'=>$rent->course->id])}}" class="link-danger stretched-link">Open</a>
                    </td>
                    <td class="align-middle">{{$rent->expiration_date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
@endsection