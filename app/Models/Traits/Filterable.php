<?php

namespace App\Models\Traits;


use App\Http\Filters\FilterInterface;
use App\Http\Filters\ProductFilter;
use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Apply Filters on the Eloquent Model
     *
     * @param $query
     * @param QueryFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $builder, FilterInterface $filter)
    {
        $filter->apply($builder);
        return $builder;
    }
}