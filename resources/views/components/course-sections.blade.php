@props(['course'])
<?php $sections = $course->sections?>
<div class="accordion" id="accordionExample">
    @foreach ($sections as $k => $section)
        @can('view-course', $course)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$k}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#section{{$k}}" aria-expanded="false" aria-controls="collapseOne">
                        {{$section->title}}
                    </button>
                </h2>
                <div id="section{{$k}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{$section->content}}
                        @can('update-section', $section)
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end pt-3">
                                <a href="{{route('sections.edit', ['section' => $section])}}" class="btn btn-outline-danger mx-2">Edit</a>
                                <form action="{{route('sections.delete', ['section' => $section])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mx-2" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                         @endcan
                    </div>
                </div>
            </div>
        @else
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <p class="accordion-button collapsed accordion-locked pb-0">
                        {{$section->title}}
                        <i class="fa-solid fa-lock ms-auto"></i>
                    </p>
                </h2>
            </div>
        @endcan
    @endforeach
</div>