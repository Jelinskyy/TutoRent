<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Section;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(6)->create();
        
        foreach(User::all() as $user) 
            Course::factory(2)->create([
                'user_id' => $user->id
            ]);

        foreach(Course::all() as $course) 
            Section::factory(4)->create([
                'course_id' => $course->id
            ]);
    }   
}
