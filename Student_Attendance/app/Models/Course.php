<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable  = [
        'course_id',
        'name',
        'description'
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
