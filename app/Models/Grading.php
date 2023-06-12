<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grading extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'submission_id',
        'score',
        'remark',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGradedByUser(Builder $query, Submission $submission, User $user)
    {
        return $query->where('user_id',  $user->id)
            ->where('submission_id', $submission->id);
    }
}
