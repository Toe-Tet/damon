<?php

namespace App\Http\Controllers;

use App\Toetet;
use Illuminate\Http\Request;

class ToetetController extends Controller
{
    public function index()
    {
    	$toetet = Toetet::all();
    	foreach($toetet->aungmyints as $aungmyint){
    		return $aungmyint;
    	}

    	return view("test.index", compact('aungmyint'));
    }
}
