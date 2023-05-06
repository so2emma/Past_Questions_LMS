<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deparment extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'name',
        'description'
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
