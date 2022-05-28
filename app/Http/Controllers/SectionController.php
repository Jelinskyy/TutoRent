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

    public function edit(Section $section){
        return view('sections.edit', ['section' => $section]);
    }

    public function update(Request $request, Section $section){
        $formFields = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $section->update($formFields);

        return redirect()->route('courses.show', ['course' => $section->course->id])->with('message', 'Section Updated Successfully');
    }

    public function delete(Section $section){
        $section->delete();

        return back()->with('message', 'Section Deleted Successfully');
    }
}
