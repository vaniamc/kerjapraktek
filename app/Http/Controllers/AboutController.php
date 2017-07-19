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

        $blog = blog::all();
        return view('about.index',compact('blog'));
        $blog = Blog::with('category')->get();
        $info = Info::all();
        $category = Category::all();
        return view('about.index',compact('blog','info','category'));

    }

    public function contact()
    {
        $blog = Blog::with('category')->get();
        $info = Info::all();
        $category = Category::all();
        //dd($info);
        return view('contact.index',compact('blog','info','category'));
    }

    public function schedule()
    {

        $blog = Blog::with('category')->get();
        $info = Info::all();
        $category = Category::all();
        $schedule_month = Schedule::find(2);
        $schedule_week = Schedule::find(1);
        return view('training_schedule.index',compact('blog','schedule_week','schedule_month','info','category'));
    }

    public function gallery()
    {
        $blog = blog::all();
        $info = Info::all();
        $category = Category::all();
        return view('gallery.index',compact('blog','category','info'));
    }

    public function home()
    {
        $blog = Blog::with('category')->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
        $info = Info::all();
        $category = Category::all();
//        dd($blog[0]);
        return view('home.index',compact('blog','info','category'));
    }

    public function searchdate(Request $request)
    {
        $info = Info::all();
        $category = Category::all();
        $year = $request->input('select_year');
        $month = $request->input('select_month');
        if($month == NULL){
            $blog = Blog::with('category')->whereYear('created_at', $year)->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
        }
        else{
            $blog = Blog::with('category')->whereYear('created_at', $year)->whereMonth('created_at',$month)->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
            $month = Carbon::createFromDate(null, $month, null);
            $month = $month->format('F');
        }
        //dd($blog);
        return view('blog.search',compact('blog','year', 'month','info','category'));
    }

    public function search(Request $request)
    {
        $info = Info::all();
        $category = Category::all();
        $text = $request->input('search_input');
        $blog = Blog::with('category')->where('blog_publish','1')->where('blog_title', 'like', '%'.$text.'%')->orWhere('blog_publish','1')->where('blog_content', 'like', '%'.$text.'%')->orderBy('created_at', 'desc')->get();
        //dd($blog);
        return view('home.search',compact('blog','text','info','category'));
    }

    public function categorySearch($id)
    {
        $blog = Blog::with('category')->where('blog_publish','1')->where('category_id',$id)->orderBy('created_at', 'desc')->get();
        $info = Info::all();
        $category = Category::all();
        $nama_cat = Category::find($id)->first();
//        dd($blog[0]);
        return view('home.category',compact('blog','info','category','nama_cat'));
    }

}
