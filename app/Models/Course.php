<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_code',
        'description',
        'credits',
    ];

    public function enrollments() // Define the relationship between the Course and Enrollment models
    {
        return $this->hasMany(Enrollment::class);
    }

    public function grades() // Define the relationship between the Course and Grade models
    {
        return $this->hasMany(Grade::class);
    }
}
