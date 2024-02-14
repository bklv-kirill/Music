<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Filterable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "title",
        "date",
        "image",
        "group_id",
        "album_id",
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
