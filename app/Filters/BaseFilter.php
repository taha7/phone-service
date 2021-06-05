<?php

namespace App\Filters;

use App\Contracts\FilterContract;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BaseFilter
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder, array $filters)
    {
        foreach ($filters as $key => $filter) {

            if (in_array($key, $this->request->keys())) {
                if ($filter instanceof FilterContract) {
                    $filter->apply($builder, $this->request->get($key));
                }
            }
        }

        return $builder;
    }
}
