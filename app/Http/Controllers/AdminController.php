<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;

class AdminController extends Controller
{
    
    public function index()
    {
    	return redirect('dashboard/all');
    }

    public function all()
    {
    	$data['page_title'] = 'Telkom CorpU News Center | All Posts';
    	$data['blog'] = blog::all();
    	$data['count_all'] = blog::all()->count();
    	$data['count_pub'] = blog::all()->where('blog_publish','1')->count();
    	//dd($data['count_all']);
    	return view('admin.all', $data);
    }

    public function publish()
    {
    	$data['page_title'] = 'Telkom CorpU News Center | Published';
    	$data['blog'] = blog::all()->where('blog_publish','1');
    	$data['count_all'] = blog::all()->count();
    	$data['count_pub'] = blog::all()->where('blog_publish','1')->count();
    	//dd($data['blog']);
    	return view('admin.publish', $data);
    }

    public function add()
    {
    	$data['page_title'] = 'Telkom CorpU News Center | New Post';
    	$data['count_all'] = blog::all()->count();
    	$data['count_pub'] = blog::all()->where('blog_publish','1')->count();
    	//dd($data['blog']);
    	return view('admin.add', $data);
    }

    public function insert(Request $request)
    {
    	$blog = new blog();
		$blog->blog_title = $request->input('title-blog');
		$blog->blog_content = $request->input('content-blog');
		if($request->input('publish') == 1){
			$blog->blog_publish = 1;
		}
		else{
			$blog->blog_publish = 0;
		}
		$imageName = 'blog_default.png';
		if($request->file()!=null){
			$imageName = time().'.'.$request->file('blog_picture')->getClientOriginalExtension();
		}
		$blog->blog_picture= $imageName;
		$blog->save();
		if($request->file()!=null){
				$request->file('blog_picture')->move(
				base_path() . '/public/images/blog/', $imageName
			);
		}
		return redirect('dashboard/all');
    }

    public function edit($id)
    {
    	$data['page_title'] = 'Telkom CorpU News Center | Edit Post';
    	$data['count_all'] = blog::all()->count();
    	$data['count_pub'] = blog::all()->where('blog_publish','1')->count();
    	$data['blog'] = blog::all()->where('blog_id',$id)->first();
		return view('admin.edit', $data);
    }

    public function submitEdit(Request $request, $id)
    {
    	if($request->input('publish') == 1){
			$publish = 1;
		}
		else{
			$publish = 0;
		}
    	if($request->file('blog_picture')==null){
			DB::table('blog')->where('blog_id', $id)->update([
				'blog_title' => $request->input('title-blog'),
				'blog_content' => $request->input('content-blog'),
				'blog_publish' => $publish,
			]);
		}
		else{
			$imageName = time().'.'.$request->file('blog_picture')->getClientOriginalExtension();
			DB::table('blog')->where('blog_id', $id)->update([
				'blog_title' => $request->input('title-blog'),
				'blog_picture' => $imageName,
				'blog_content' => $request->input('content-blog'),
				'blog_publish' => $publish,
			]);
			$request->file('blog_picture')->move(
				base_path() . '/public/images/blog/', $imageName
			);
		}
		return redirect('dashboard/all');
    }

    public function delete(Request $request)
    {
    	$id = $request->input('blog_id');
    	$blog = blog::destroy($id);
    	if($blog) return redirect('dashboard/all');
    }
}
