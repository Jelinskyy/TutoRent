<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function store(Request $request, Course $course){
        if(Gate::allows('view-course', $course)) abort(403);
        
        $formFields = $request->validate([
            'perioid' => 'required|in:7,30,90'
        ]);

        $data = [
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'expiration_date' => Carbon::now()->addDays($formFields['perioid'])->toDateTimeString()
        ];

        Rent::create($data);

        return back()->with('message', "Course {$course->title} has been rented for {$formFields['perioid']} days");
    }
}
