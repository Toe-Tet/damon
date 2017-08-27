<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
    	'title', 'body', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Polymorphic Many to Many relation with Media Library
     */
    public function images()
    {
    	return $this->morphToMany(Image::class, 'imageable');
    }
        
}
