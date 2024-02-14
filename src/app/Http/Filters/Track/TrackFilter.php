<?php

namespace App\Http\Filters\Track;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class TrackFilter extends AbstractFilter
{
    public const TITLE = "title";
    public const GROUP_ID = "group_id";
    public const ALBUM_ID = "album_id";
    public const DATE = "date";

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, "title"],
            self::GROUP_ID => [$this, "groupId"],
            self::ALBUM_ID => [$this, "albumId"],
            self::DATE => [$this, "date"],
        ];
    }

    public function title(Builder $builder, $title)
    {
        $builder->where("title", "LIKE", "%{$title}%");
    }
    public function groupId(Builder $builder, $group_id)
    {
        $builder->where("group_id", $group_id);
    }
    public function albumId(Builder $builder, $album_id)
    {
        $builder->where("album_id", $album_id);
    }
    public function date(Builder $builder, $date)
    {
        if ($date === "new") $builder->orderByDesc("date");
        else if ($date === "old") $builder->orderBy("date");
        else $builder->orderByDesc("date");
    }

}