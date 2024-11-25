<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'id',
        'name',
        'gender',
        'student_id',
        'year_of_enrollment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'enrollments', 'student_id', 'sec_id')
            ->withPivot('course_id');
    }
}
