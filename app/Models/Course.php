<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    protected $fillable = ['title', 'author', 'image', 'description', 'tags', 'user_id'];

    use HasFactory;
    
    protected static function booted()
    {
        static::deleting(function ($course) {
            Storage::disk('public')->delete($course->image);
        });
    }
    
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false) 
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        if($filters['search'] ?? false) 
            $query->where('title', 'like', '%' . $filters['search'] . '%')
            ->orWhere('description', 'like', '%' . $filters['search'] . '%')
            ->orWhere('author', 'like', '%' . $filters['search'] . '%')
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

    /**
     * Get number of course rents
     * 
     * @return int
     */
    public function getRentCountAttribute(){
        $id = $this->id;
        return cache()->remember('course_rents_'.$id, 300, function () use ($id){
            return DB::table('rents')
                ->where('course_id', '=', $id)
                ->count();
        });
    }
}
