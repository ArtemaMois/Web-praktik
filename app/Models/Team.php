<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Team extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'login',
        'image',
        'email',
        'password',
        'email_verified_at'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function emailVerificationCodes(): HasMany
    {
        return $this->hasMany(EmailVerificationCode::class);
    }

}
