<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Filterable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "title",
        "style",
        "date",
        "image",
        "style_id",
    ];

    public function style(): BelongsTo
    {
        return $this->belongsTo(Style::class);
    }

    public function albums()
    {
        return $this->hasMany(Album::class)->orderByDesc("date");
    }
}
