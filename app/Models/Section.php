<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['title', 'content', 'course_id'];

    use HasFactory;

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
