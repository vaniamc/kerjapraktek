<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use DB;
use Carbon\Carbon;

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
        $blog = blog::all()->where('blog_publish','1')->sortByDesc('created_at');
//        dd($blog[0]);
        return view('home.index',compact('blog'));
    }

    public function search(Request $request)
    {
        $year = $request->input('select_year');
        $month = $request->input('select_month');
        if($month == NULL){
            $blog = blog::whereYear('created_at', $year)->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
        }
        else{
            $blog = blog::whereYear('created_at', $year)->whereMonth('created_at',$month)->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
            $month = Carbon::createFromDate(null, $month, null);
            $month = $month->format('F');
        }
        //dd($blog);
        return view('blog.search',compact('blog','year', 'month'));
    }

}
