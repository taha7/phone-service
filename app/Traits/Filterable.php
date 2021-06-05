<?php

namespace App\Traits;

use App\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Filterable
{
    public function scopeWithFilters(Builder $query, array $filters, Request $request)
    {
        return (new BaseFilter($request))->apply($query, $filters);
    }
}
