<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = false;
    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_tags',foreignPivotKey:'tag_id',relatedPivotKey: 'post_id');
    }
}
