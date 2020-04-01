<?php

namespace Freeloaders;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, Subcategory::class);
    }
}
