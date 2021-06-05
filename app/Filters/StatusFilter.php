<?php

namespace App\Filters;

use App\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class StatusFilter implements FilterContract
{
    public function apply(Builder $query, $value)
    {
        return $query->where('status', $value);
    }
}
