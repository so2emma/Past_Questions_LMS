<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'session_id',
        'path',
    ];

    public function scopeUserHasMadeSubmission(Builder $query, User $user, Question $question)
    {
        return $query->whereHas('submissions', function($query) use($question, $user){
            return $query->where('user_id', '=', $user->id)
                        ->where('question_id', '=', $question->id);
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
