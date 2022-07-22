<?php

namespace App\Models;


use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,Filterable;
    protected $table = "products";
    protected $guarded = false;
    protected $fillable = [
        'title',
        'description',
        'content',
        'preview_image',
        'isPublished',
        'category_id',
        'price',
        'count',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function tags()
    {
      return $this->belongsToMany(Tag::class,ProductTag::class,  'product_id','tag_id');
    }
    public function colors()
    {
      return $this->belongsToMany(Color::class,ColorProduct::class,  'product_id','color_id');
    }
    public function productImages()
    {
      return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function getImageUrlAttribute()
    {
      return url('storage/'.$this->preview_image);
    }
}
