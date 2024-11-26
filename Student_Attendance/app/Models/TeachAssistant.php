<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachAssistant extends Model
{
    use HasFactory;

    protected $table = 'teach_assistants';

    protected $fillable = [
        'id',
        'name',
        'teach_assistant_id',
        'year_of_enrollment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id','id');
    }

}
