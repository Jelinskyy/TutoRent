<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'author', 'image', 'description', 'tags'];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
