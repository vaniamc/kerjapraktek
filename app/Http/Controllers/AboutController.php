<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use DB;

class AboutController extends Controller
{
    public function about()
    {
        $blog = blog::all();
//        dd($blog[0]);
        return view('about.index',compact('blog'));
    }

    public function contact()
    {
        $blog = blog::all();
//        dd($blog[0]);
        return view('contact.index',compact('blog'));
    }

    public function home()
    {
        $blog = blog::all();
//        dd($blog[0]);
        return view('home.index',compact('blog'));
    }

}
