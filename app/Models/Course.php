<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'author', 'image', 'description', 'tags', 'user_id'];

    use HasFactory;
    
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false) 
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        if($filters['search'] ?? false) 
            $query->where('title', 'like', '%' . $filters['search'] . '%')
            ->orWhere('description', 'like', '%' . $filters['search'] . '%')
            ->orWhere('tags', 'like', '%' . $filters['search'] . '%');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sections(){
        return $this->hasMany(Section::class, 'course_id');
    }

    public function rents(){
        return $this->hasMany(Rent::class, 'course_id');
    }
}
