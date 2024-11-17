<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $table = 'lectures';

    protected $fillable = [
        'course_id',
        'sec_id',
        'title',
        'date',
        'time',
        'location'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, ['sec_id', 'course_id'], ['id', 'course_id']);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
