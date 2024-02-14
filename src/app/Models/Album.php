<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Filterable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $fillable = [
        "title",
        "date",
        "image",
        "group_id",
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class)->orderByDesc("date");
    }
}
