<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class EmailVerificationCode extends Model
{
    use HasFactory;

    protected $table = 'email_verification_codes';

    protected $fillable = [
        'team_id',
        'code',
        'expired_at',
        'created_at',
    ];

    public $timestamps = false;

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
