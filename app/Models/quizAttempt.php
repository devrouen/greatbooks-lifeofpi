<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $primaryKey = 'attempt_id';

    protected $fillable = [
        'username',
        'difficulty_level',
        'total_questions',
        'correct_answers',
        'total_score',
        'time_taken',
        'timezone_offset',
    ];

    public $timestamps = false;

    public function responses(): HasMany
    {
        return $this->hasMany(QuizResponse::class, 'attempt_id', 'attempt_id');
    }
}
