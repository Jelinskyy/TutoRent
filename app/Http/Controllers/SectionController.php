<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function create(Course $course){
        return view('sections.create', ['course' => $course]);
    }

    public function store(Request $request, Course $course){
        $formFields = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $formFields['course_id'] = $course->id;

        Section::create($formFields);

        return redirect()->route('courses.show', ['course' => $course->id])->with('message', 'Section Created Successfully');
    }
}
