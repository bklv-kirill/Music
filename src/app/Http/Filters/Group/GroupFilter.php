<?php

namespace App\Http\Filters\Group;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class GroupFilter extends AbstractFilter
{
    public const TITLE = "title";
    public const STYLE_ID = "style_id";
    public const DATE = "date";

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, "title"],
            self::STYLE_ID => [$this, "styleId"],
            self::DATE => [$this, "date"],
        ];
    }

    public function title(Builder $builder, $title)
    {
        $builder->where("title", "LIKE", "%{$title}%");
    }

    public function styleId(Builder $builder, $style_id)
    {
        $builder->where("style_id", $style_id);
    }

    public function date(Builder $builder, $date)
    {
        if ($date === "new") $builder->orderByDesc("date");
        else if ($date === "old") $builder->orderBy("date");
        else $builder->orderByDesc("date");
    }
}