<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    protected $table = "grades";

    protected $fillable = [
        'evaluator_id',
        'team_id',
        'design',
        'usability',
        'layout',
        'implementation'
    ];

    public function evaluator(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'evaluator_id');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
