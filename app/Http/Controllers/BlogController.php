<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use DB;

class BlogController extends Controller
{
    public function index($blog_id)
    {
        $blog = blog::all();
        $row = blog::all()->where('blog_id',$blog_id)->first();
//        dd($blog[0]);
        return view('blog.index',compact('blog','row'));
    }
}
