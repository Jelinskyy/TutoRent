<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Course;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('test', function (User $user, bool $bool) {
            return $bool;
        });

        Gate::define('update-course', function (User $user, Course $course) {
            return $user->id === $course->user_id;
        });

        Gate::define('view-course', function (User $user, Course $course) {
            return Gate::forUser($user)->allows('update-course', $course) 
                || $user->rents->where('course_id', $course->id)->filter(function ($value) {
                        return Carbon::create($value->expiration_date) >= Carbon::now();
                    })->isNotEmpty();
        });

        Gate::define('update-section', function (User $user, $section_id) {
            if(is_string($section_id))
                $section = Section::find($section_id);
            else
                $section = $section_id;
            return Gate::forUser($user)->allows('update-course', $section->course);
        });
    }
}
