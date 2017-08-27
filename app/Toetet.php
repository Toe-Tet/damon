<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toetet extends Model
{
    public function aungmyint()
    {
    	return $this->belongsTo(Aungmyint::class);
    }
}
