<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\Category;
use App\Info;
use App\Album;
use App\Gallery;
use App\Schedule;
use DB;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function about()
    {
        $blog = Blog::all();
        $info = Info::all();
//        dd($blog[0]);
        return view('about.index',compact('blog','info'));
    }

    public function contact()
    {
        $blog = Blog::all();
        $info = Info::all();
        //dd($info);
        return view('contact.index',compact('blog','info'));
    }

    public function schedule()
    {
        $blog = Blog::all();
        $info = Info::all();
        $schedule_month = Schedule::find(2);
        $schedule_week = Schedule::find(1);
//        dd($blog[0]);
        return view('training_schedule.index',compact('blog','schedule_week','schedule_month','info'));
    }

    public function home()
    {
        $blog = Blog::all()->where('blog_publish','1')->sortByDesc('created_at');
        $info = Info::all();
//        dd($blog[0]);
        return view('home.index',compact('blog','info'));
    }

    public function searchdate(Request $request)
    {
        $info = Info::all();
        $year = $request->input('select_year');
        $month = $request->input('select_month');
        if($month == NULL){
            $blog = Blog::whereYear('created_at', $year)->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
        }
        else{
            $blog = Blog::whereYear('created_at', $year)->whereMonth('created_at',$month)->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
            $month = Carbon::createFromDate(null, $month, null);
            $month = $month->format('F');
        }
        //dd($blog);
        return view('blog.search',compact('blog','year', 'month','info'));
    }

    public function search(Request $request)
    {
        $info = Info::all();
        $text = $request->input('search_input');
        $blog = Blog::where('blog_publish','1')->where('blog_title', 'like', '%'.$text.'%')->orWhere('blog_publish','1')->where('blog_content', 'like', '%'.$text.'%')->orderBy('created_at', 'desc')->get();
        //dd($blog);
        return view('home.search',compact('blog','text','info'));
    }

}
