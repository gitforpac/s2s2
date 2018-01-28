<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class PagesController extends Controller
{
    public function aboutus()
    {
    	return view('pages.about-us');
	}

	public function contactus()
    {
    	return view('pages.contact-us')->with('c',$c);
    	// $c = ContactUs::find(1)->first();

    	// return view('pages.contact-us')->with('c',$c);
	}
}
