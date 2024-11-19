<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';

    protected $fillable = [
        'course_id',
        'year',
        'semester'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,['sec_id','course_id'], ['id','course_id']);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'sec_id', 'student_id')
            ->withPivot('course_id');
    }
}
