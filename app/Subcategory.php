<?php

namespace Freeloaders;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
