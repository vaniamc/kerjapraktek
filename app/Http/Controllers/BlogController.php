<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use DB;

class BlogController extends Controller
{
    public function index()
    {
        $blog = blog::all();
//        dd($blog[0]);
        return view('blog.index',compact('blog'));
    }

    public function viewdetail($blog_id)
    {
        $blog = blog::all();
        $post = DB::table('blog')->where('blog_id',$blog_id)->first();
        return view('/blog/detail',compact('blog','post'));
    }
    public function tambah()
	{
		return view('/admin/createpost');
	}
	public function edit($id){
		$blog = DB::table('blog')->where('blog_id',$id)->first();
		return view('/admin/editpost',compact('blog'));
	}
	public function lihat(){
		$blog = blog::all();
		return view('admin/lihatpost',compact('blog'));
	}
    public function submitTambah(Request $request)
	{
		$blog = new blog();
		$blog->blog_title = $request->input('title-blog');
		$blog->blog_content = $request->input('content-blog');
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
		return redirect('admin/lihatpost');
	}
	public function submitEdit(Request $request, $id){

		if($request->file('blog_picture')==null){
			DB::table('blog')->where('blog_id', $id)->update([
				'blog_title' => $request->input('title-blog'),
				'blog_content' => $request->input('content-blog'),
			]);
		}
		else{
			$imageName = time().'.'.$request->file('blog_picture')->getClientOriginalExtension();
			DB::table('blog')->where('blog_id', $id)->update([
				'blog_title' => $request->input('title-blog'),
				'blog_picture' => $imageName,
				'blog_content' => $request->input('content-blog'),
			]);
			$request->file('blog_picture')->move(
				base_path() . '/public/images/blog/', $imageName
			);
		}
		return redirect('admin/lihatpost');
	}
	public function delete($id){
		$blog = blog::findOrFail($id);
        $blog->delete();
        return redirect('admin/lihatpost');
	}
}
