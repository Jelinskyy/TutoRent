<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index', [
            'courses' => Course::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
    }

    public function show(Course $course){
        return view('courses.show', ['course' => $course]);
    }

    public function create(){
        return view('courses.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'image' => 'image'
        ]);

        if($request->file('image')){
            $formFields['image'] = Storage::disk('public')->put('courses' , $request->file('image'));
            $image = Image::make('storage/'.$formFields['image'])->resize(500, 500)->save();
        } else
            unset($formFields['image']);
        $formFields['user_id'] = auth()->id();

        $course = Course::create($formFields);

        return redirect()->route('courses.show', ['course' => $course->id])->with('message', 'Course Created Successfully');
    }

    public function edit(Course $course){
        return view('courses.edit', ['course' => $course]);
    }

    public function update(Request $request, Course $course){
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'image' => 'image'
        ]);

        if($request->file('image')){
            Storage::disk('public')->delete($course->image);
            $formFields['image'] = Storage::disk('public')->put('courses' , $request->file('image'));
        }
        else
            unset($formFields['image']);

        $course->update($formFields);

        return redirect()->route('courses.show', ['course' => $course->id])->with('message', 'Course Updated Successfully');
    }

    public function delete(Course $course){
        $course->delete();

        return redirect()->route('courses.index')->with('message', 'Course Deleted Successfully');
    }
}
