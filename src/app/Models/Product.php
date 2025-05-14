<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Like;
use App\Models\Comment;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'brand', 'price', 'description', 'image',
        'condition', 'is_sold'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function getPriceAttribute($value)
    {
        return '¥'.number_format($value);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace('¥', '', str_replace(',', '', $value));
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
