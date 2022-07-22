<?php
namespace App\Http\Filters;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter{
	// const TITLE = 'title';
	// const CATEGORIES = 'categories';

	protected function getCallbacks(): array
	{
		return [
			'title' => [$this,'title'],
			'categories' => [$this,'categories'],
			'tags' => [$this,'tags'],
			'colors' => [$this,'colors'],
			'prices' => [$this,'prices'],
		];
	}
	public function title(Builder $builder,$value='')
	{
		return $builder->where('title','LIKE','%'.$value.'%');
	}
	public function orderBy(Builder $builder,$value='')
	{
		return $builder->orderBy($value);
	}
	public function prices(Builder $builder,$value)
	{
		return $builder->whereBetween('price',[$value['from'],$value['to']]);
	}
	public function categories(Builder $builder,$value='')
	{
		return $builder->whereIn('category_id',$value);
	}
	public function colors(Builder $builder,$value)
	{
		return $builder->whereHas('colors',function($b) use($value){
			$b->whereIn('color_id',$value);
		});
	}
	public function tags(Builder $builder,$value='')
	{
		return $builder->whereHas('tags',function($b) use($value){
			$b->whereIn('tag_id',$value);
		});
	}
}