<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    protected $table = 'leaderboard';
    protected $primaryKey = 'rank_id';

    protected $fillable = [
        'username',
        'difficulty_level',
        'best_score',
        'best_percentage',
        'total_attempts',
        'fastest_time',
        'last_played',
    ];

    public $timestamps = false;
}
