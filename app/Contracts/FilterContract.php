<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface FilterContract
{
    /**
     * Apply query filter on the model
     */
    public function apply(Builder $query, $value);
}
