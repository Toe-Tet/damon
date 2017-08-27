<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
        public function __construct()
    {
        $this->middleware(['auth']);
    }

        public function index()
    {        
        return view('blog.emails.index');
    }

    public function send(Request $request)
    {
    	// $title = $request->input('title');
    	// $content = $request->input('content');
           $title = $request->input('title');
           $content = $request->input('content');
           $fromemail = $request->input('fromemail');
           $toemail = $request->input('toemail');
           $subject = $request->input('subject');
           $attach = $request->file('file');
        $data = array('title'=> $title, 'content'=> $content);
    	Mail::send('blog.emails.test', $data, function($message) use ($fromemail, $toemail, $subject, $attach)
    	{
    		$message->from($fromemail, $subject);

    		$message->to($toemail);

            // $message->attach($attach);
    	});

        return response()->json(['message'=>'Request completed']);
    }
}
