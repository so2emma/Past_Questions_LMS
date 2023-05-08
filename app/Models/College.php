<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbr',
        'description'
    ];

    public function departments()
    {
        return $this->hasMany(Department::class);
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
