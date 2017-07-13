<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use DB;

class BlogController extends Controller
{
    public function index($blog_id)
    {
        $count = blog::where('blog_publish','1')->get();
        //dd($count);
        $num = $count->count();
        $set = 0;
        for($i = 0;$i<$num;$i++){
		    if($set == 0 && isset($count[$i]) && $count[$i]->blog_id == $blog_id){
		    	$blog_prev = NULL;
		   		if($i+1 < $num){
		   			$blog_next = $count[$i+1];
		   		}
		   		else $blog_next=NULL;
		    	$set = 1;
		    }
		    else if($set == 0 && isset($count[$i+1]) && $count[$i+1]->blog_id == $blog_id){
		   		$blog_prev = $count[$i];
		   		if($i+2 < $num){
		   			$blog_next = $count[$i+2];
		   		}
		   		else $blog_next = NULL;
		   		$set = 1;
		    }
		}
        $row = blog::all()->where('blog_id',$blog_id)->first();
        //dd($blog_prev,$blog_next);
        return view('blog.index',compact('blog','row','blog_prev','blog_next'));
    }
}
