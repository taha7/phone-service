<?php

namespace App\Filters;

use App\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class CountryFilter implements FilterContract
{
    public function apply(Builder $query, $value)
    {
        return $query->whereIn('country', $value);
    }
}
