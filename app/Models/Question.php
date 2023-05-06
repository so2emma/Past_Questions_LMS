<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'department_id',
        'programme_id',
        'course_id',
        'session',
        'path',
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function department()
    {
        return $this->belongsTo(Deparment::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
