<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'slug'];

    public function imageable(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_categories');
    }
}
