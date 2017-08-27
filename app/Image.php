<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'image_name', 'image_full_name', 'image_path', 'image_thumb_path'
    ];

    public function posts()
    {
    	return $this->morphedByMany(Post::class, 'imageable');
    }
}
