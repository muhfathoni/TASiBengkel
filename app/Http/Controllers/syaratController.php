<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addtocart;
use Auth;

class syaratController extends Controller
{
	public function index()
	{
		$notif = addtocart::where('user_id', Auth::user()->id)->get();

		return view ('syarat', compact('notif'));
	}
}
