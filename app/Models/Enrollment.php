<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'enrollment_date',
    ];

    public function student() // Define the relationship between the Enrollment and Student models
    {
        return $this->belongsTo(Student::class);
    }

    public function course() // Define the relationship between the Enrollment and Course models
    {
        return $this->belongsTo(Course::class);
    }
}
