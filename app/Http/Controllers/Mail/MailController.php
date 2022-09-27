<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\MyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
	public function writeEmail()
	{
		 return view('emails.myMail');
	}

	public function sendEmail(Request $request) 
	{
		$this -> validate($request, [
			'name'  => 'required' ,
			'email' =>  'required|email',
			'message' => 'required'
		]);

		$data = array(
			'name' => $request->name,
			'message' => $request->message,
		);

		Mail::To('hadeel@web.net')->send(new myMail($data));
		return back()->with('success', 'Email has been sent successfully!');
	}
}
