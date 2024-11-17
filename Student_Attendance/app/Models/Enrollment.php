<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = 'enrollments';

    protected $fillable = [
        'student_id',
        'course_id',
        'sec_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, ['sec_id', 'course_id'], ['id', 'course_id']);
    }

    public function sutdent()
    {
        return $this->belongsTo(Student::class);
    }
}
