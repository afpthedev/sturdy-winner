<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'date_of_birth',
        'enrollment_date',
        'status',
        'school_id',
    ];

    public function school() // Define the relationship between the Student and School models
    {
        return $this->belongsTo(School::class);
    }

    public function enrollments() // Define the relationship between the Student and Enrollment models
    {
        return $this->hasMany(Enrollment::class);
    }

    public function grades() // Define the relationship between the Student and Grade models
    {
        return $this->hasMany(Grade::class);
    }

}
