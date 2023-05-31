<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_start',
        'session_end',
        'session_name'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function scopeGetSessionInOrder(Builder $query)
    {
        return $query->orderBy('session_start', 'asc');
    }
}
