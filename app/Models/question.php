<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $primaryKey = 'question_id';

    protected $fillable = [
        'question_text',
        'question_type',
        'difficulty',
        'points',
        'is_active',
    ];

    /**
     * Multiple-choice / true-false options.
     */
    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class, 'question_id', 'question_id');
    }

    /**
     * Correct answers for identification / enumeration / fill-in-blank.
     */
    public function answers(): HasMany
    {
        return $this->hasMany(QuestionAnswer::class, 'question_id', 'question_id');
    }
}
