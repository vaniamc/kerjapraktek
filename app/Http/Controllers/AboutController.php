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
        $blog = Blog::with('category')->get();
        $info = Info::all();
        $category = Category::all();
        return view('about.index',compact('blog','info','category'));

    }

    public function contact()
    {
        //mengambil 3 berita terakhir untuk sidebar
        $blogs = Blog::latest()->where('blog_publish','1')->paginate(3);
        //mengambil seluruh info untuk sidebar
        $info = Info::all();
        //mengambil seluruh kategori untuk sidebar
        $category = Category::all();
        //dd($info);
        return view('contact.index',compact('info','category','blogs'));
    }

    public function schedule()
    {
        //mengambil 3 berita terakhir untuk sidebar
        $blogs = Blog::latest()->where('blog_publish','1')->paginate(3);
        //mengambil seluruh data info untuk sidebar
        $info = Info::all();
        //mengambil seluruh data category untuk sidebar
        $category = Category::all();
        //menampilkan video jadwal pelatihan bulanan
        $schedule_month = Schedule::find(2);
        //menampilkan video jadwal pelatihan mingguan
        $schedule_week = Schedule::find(1);
        return view('training_schedule.index',compact('schedule_week','schedule_month','info','category','blogs'));
    }

    public function gallery()
    {
        //mengambil seluruh album dalam database
        $album = Album::with('gallery')->get();
        //dd($album);
        return view('gallery.index',compact('album'));
    }

    public function galleryAlbum($id)
    {
        //mengambil seluruh foto dalam album tertentu
        $gallery = Gallery::with('album')->where('album_id',$id)->get();
        //mengambil nama album
        $album = Album::with('gallery')->where('album_id',$id)->first();
        return view('gallery.photo',compact('gallery','album'));
    }

    public function home()
    {
        $blogs = Blog::latest()->where('blog_publish','1')->paginate(3);
        $blog = Blog::with('category')->where('blog_publish','1')->orderBy('created_at', 'desc')->paginate(5);
        $info = Info::all();
        $category = Category::all();
//        dd($blog[0]);
        return view('home.index',compact('blog','info','category', 'blogs'));
    }

    public function searchdate(Request $request)
    {
        //mengambil 3 berita terakhir untuk sidebar
        $blogs = Blog::latest()->where('blog_publish','1')->paginate(3);
        //mengambil seluruh info untuk sidebar
        $info = Info::all();
        //mengambil seluruh data category untuk sidebar
        $category = Category::all();
        //mengambil input untuk tahun yang dicari
        $year = $request->input('select_year');
        //mengambil input untuk bulan yang dicari
        $month = $request->input('select_month');
        //apabila bulan tidak diisi maka akan dicari berita berdasarkan tahun
        if($month == NULL){
            $blog = Blog::with('category')->whereYear('created_at', $year)->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
        }
        //apabila bulan diisi maka akan dicari berita berdasarkan tahun dan bulan
        else{
            $blog = Blog::with('category')->whereYear('created_at', $year)->whereMonth('created_at',$month)->where('blog_publish','1')->orderBy('created_at', 'desc')->get();
            $month = Carbon::createFromDate(null, $month, null);
            $month = $month->format('F');
        }
        //dd($blog);
        return view('blog.search',compact('blog','year', 'month','info','category','blogs'));
    }

    public function search(Request $request)
    {
        //mengambil 3 berita terakhir untuk sidebar
        $blogs = Blog::latest()->where('blog_publish','1')->paginate(3);
        //mengambil seluruh info untuk sidebar
        $info = Info::all();
        //mengambil seluruh category untuk sidebar 
        $category = Category::all();
        //mengambil input konten yang dicari
        $text = $request->input('search_input');
        //query untuk mencari berita dengan konten tertentu
        $blog = Blog::with('category')->where('blog_publish','1')->where('blog_title', 'like', '%'.$text.'%')->orWhere('blog_publish','1')->where('blog_content', 'like', '%'.$text.'%')->orderBy('created_at', 'desc')->get();
        //dd($blog);
        return view('home.search',compact('blog','text','info','category','blogs'));
    }

    public function categorySearch($id)
    {
        //mengambil 3 berita terakhir untuk sidebar
        $blogs = Blog::latest()->where('blog_publish','1')->paginate(3);
        //mengambil berita dengan kategori tertentu sesuai yang dicari
        $blog = Blog::with('category')->where('blog_publish','1')->where('category_id',$id)->orderBy('created_at', 'desc')->paginate(5);
        //mengambil seluruh info untuk sidebar
        $info = Info::all();
        //mengambil seluruh category untuk sidebar
        $category = Category::all();
        //menampilkan nama kategori yang dicari
        $nama_cat = Category::where('category_id',$id)->first();
//        dd($blog[0]);
        return view('home.category',compact('blog','info','category','nama_cat','blogs'));
    }

}
