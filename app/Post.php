<?php

namespace Freeloaders;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
