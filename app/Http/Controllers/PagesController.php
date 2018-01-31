<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagesController extends Controller
{
    public function aboutus()
    {
    	return view('pages.about-us');
	}

	public function contactus(Request $request)
    {
        // $this->validate($request, [
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'message' => 'required'
        //     ]);


        // ContactUS::create($request->all());
        // return view('pages.contact-us')->with('c',$c);

        //return back()->with('success', 'Thanks for contacting us!');
        return view('pages.contact-us')->with('success', 'Thanks for contacting us!');
    }


}
