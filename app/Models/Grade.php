<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'grade',
    ];

    public function student() // Define the relationship between the Grade and Student models
    {
        return $this->belongsTo(Student::class);
    }

    public function course() // Define the relationship between the Grade and Course models
    {
        return $this->belongsTo(Course::class);
    }
}
