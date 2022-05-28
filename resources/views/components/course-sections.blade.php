@props(['sections'])
<div class="accordion" id="accordionExample">
    @foreach ($sections as $k => $section)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{$k}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#section{{$k}}" aria-expanded="false" aria-controls="collapseOne">
                    {{$section->title}}
                </button>
            </h2>
            <div id="section{{$k}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {{$section->content}}
                </div>
            </div>
        </div>
    @endforeach
</div>