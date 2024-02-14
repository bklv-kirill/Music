<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "login",
        "password",
        "role_id",
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
