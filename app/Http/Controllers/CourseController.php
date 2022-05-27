<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index', [
            'courses' => Course::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
}
