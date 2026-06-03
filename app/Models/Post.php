<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        ];

    public function category()
    {
        return $this->belongsTo(Category::class,foreignKey:'category_id',ownerKey:'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags',foreignPivotKey:'post_id',relatedPivotKey: 'tag_id');
    }
}
