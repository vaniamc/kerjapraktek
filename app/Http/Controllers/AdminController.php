<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Blog;
use App\Category;
use App\Info;
use App\Album;
use App\Gallery;
use App\Schedule;
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
    	$data['blog'] = Blog::with('category')->get();
    	$data['count_all'] = Blog::all()->count();
    	$data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
    	//dd($data['count_all']);
    	return view('admin.all', $data);
    }

    public function publish()
    {
    	$data['page_title'] = 'Telkom CorpU News Center | Published';
    	$data['blog'] = Blog::with('category')->where('blog_publish','1')->get();
    	$data['count_all'] = Blog::all()->count();
    	$data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
    	// dd($data['blog']);
    	return view('admin.publish', $data);
    }

    public function add()
    {
    	$data['page_title'] = 'Telkom CorpU News Center | New Post';
    	$data['count_all'] = Blog::all()->count();
    	$data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['category'] = Category::all();
    	//dd($data['blog']);
    	return view('admin.add', $data);
    }

    public function insert(Request $request)
    {
    	$blog = new Blog();
		$blog->blog_title = $request->input('title-blog');
		$blog->blog_content = $request->input('content-blog');
        $blog->category_id = $request->input('category_id');
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
    	$data['count_all'] = Blog::all()->count();
    	$data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
    	$data['blog'] = Blog::all()->where('blog_id',$id)->first();
        $data['category'] = Category::all();
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
                'category_id' => $request->input('category_id'),
			]);
		}
		else{
			$imageName = time().'.'.$request->file('blog_picture')->getClientOriginalExtension();
			DB::table('blog')->where('blog_id', $id)->update([
				'blog_title' => $request->input('title-blog'),
				'blog_picture' => $imageName,
				'blog_content' => $request->input('content-blog'),
				'blog_publish' => $publish,
                'category_id' => $request->input('category_id'),
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
    	$blog = Blog::destroy($id);
    	if($blog) return redirect('dashboard/all');
    }

    public function allCategory()
    {
        $data['page_title'] = 'Telkom CorpU News Center | All Category';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['category'] = Category::all();
        //dd($data['blog']);
        return view('admin.all-category', $data);
    }

    public function addCategory(){
        $data['page_title'] = 'Telkom CorpU News Center | New Category';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //dd($data['blog']);
        return view('admin.add-category', $data);
    }

    public function insertCategory(Request $request){
        $category = new Category();
        $category->category_name = $request->input('name');
        $category->save();
        return redirect('dashboard/category');
    }

    public function editCategory($id){
        $data['page_title'] = 'Telkom CorpU News Center | Edit Category';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['category'] = Category::find($id);
        // dd($data['category']);
        return view('admin.edit-category', $data);
    }

    public function submitEditCategory(Request $request, $id){
        DB::table('category')->where('category_id', $id)->update([
                'category_name' => $request->input('name'),
            ]);
        return redirect('dashboard/category');
    }

    public function allInfo()
    {
        $data['page_title'] = 'Telkom CorpU News Center | All Info';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['info'] = Info::all();
        //dd($data['blog']);
        return view('admin.all-info', $data);
    }

    public function addInfo()
    {
        $data['page_title'] = 'Telkom CorpU News Center | New Info';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //dd($data['blog']);
        return view('admin.add-info', $data);
    }

    public function insertInfo(Request $request){
        $info = new Info();
        $info->info_title = $request->input('title-info');
        $imageName = 'blog_default.png';
        if($request->file()!=null){
            $imageName = time().'.'.$request->file('info-poster')->getClientOriginalExtension();
        }
        $info->info_poster= $imageName;
        $info->save();
        if($request->file()!=null){
                $request->file('info-poster')->move(
                base_path() . '/public/images/info/', $imageName
            );
        }
        return redirect('dashboard/info');
    }

    public function editInfo($id)
    {
        $data['page_title'] = 'Telkom CorpU News Center | Edit Info';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['info'] = Info::find($id);
        //dd($data['blog']);
        return view('admin.edit-info', $data);
    }

    public function submitEditInfo(Request $request, $id)
    {
        if($request->file('info_poster')==null){
            DB::table('info')->where('info_id', $id)->update([
                'info_title' => $request->input('title-info'),
            ]);
        }
        else{
            $imageName = time().'.'.$request->file('info_poster')->getClientOriginalExtension();
            DB::table('info')->where('info_id', $id)->update([
                'info_title' => $request->input('title-info'),
                'info_poster' => $imageName,
            ]);
            $request->file('info_poster')->move(
                base_path() . '/public/images/info/', $imageName
            );
        }
        return redirect('dashboard/info');
    }

    public function deleteInfo(Request $request)
    {
        $id = $request->input('info_id');
        $info = Info::destroy($id);
        if($info) return redirect('dashboard/info');
    }

    public function allAlbum()
    {
        $data['page_title'] = 'Telkom CorpU News Center | All Album';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['album'] = Album::all();
        //dd($data['blog']);
        return view('admin.all-album', $data);
    }

    public function addAlbum()
    {
        $data['page_title'] = 'Telkom CorpU News Center | New Album';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //dd($data['blog']);
        return view('admin.add-album', $data);
    }

    public function insertAlbum(Request $request)
    {
        $album = new Album();
        $album->album_name = $request->input('name');
        $album->save();
        return redirect('dashboard/album');
    }

    public function editAlbum($id)
    {
        $data['page_title'] = 'Telkom CorpU News Center | Edit Album';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['album'] = Album::find($id);
        //dd($data['blog']);
        return view('admin.edit-album', $data);
    }

    public function submitEditAlbum(Request $request, $id)
    {
        DB::table('album')->where('album_id', $id)->update([
                'album_name' => $request->input('name'),
            ]);
        return redirect('dashboard/album');
    }

    public function deleteAlbum(Request $request)
    {
        $id = $request->input('album_id');
        $album = Album::destroy($id);
        if($album) return redirect('dashboard/album');
    }

    public function allGallery()
    {
        $data['page_title'] = 'Telkom CorpU News Center | All Images';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['gallery'] = Gallery::with('album')->get();
        //dd($data['blog']);
        return view('admin.all-gallery', $data);
    }

    public function addGallery()
    {
        $data['page_title'] = 'Telkom CorpU News Center | New Image';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['album'] = Album::all();
        //dd($data['blog']);
        return view('admin.add-gallery', $data);
    }

    public function insertGallery(UploadRequest $request){
        foreach($request->photos as $photo){
            $gallery = new Gallery();
            $gallery->album_id = $request->input('album_id');
            $imageName = time().'-'.$photo->getClientOriginalName().'.'.$photo->getClientOriginalExtension();
            $gallery->gallery_path= $imageName;
            $gallery->save();
            $photo->move(
                base_path() . '/public/images/gallery/', $imageName
            );
            //dd($gallery);
        }
        return redirect('dashboard/gallery');
    }

    public function editGallery($id)
    {
        $data['page_title'] = 'Telkom CorpU News Center | Edit Image';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['gallery'] = Gallery::find($id);
        $data['album'] = Album::all();
        //dd($data['blog']);
        return view('admin.edit-gallery', $data);
    }

    public function submitEditGallery(Request $request, $id)
    {
        $imageName = time().'.'.$request->file('info_poster')->getClientOriginalExtension();
        DB::table('gallery')->where('gallery_id', $id)->update([
            'album_id' => $request->input('album_id'),
            'gallery_path' => $imageName,
        ]);
        $request->file('info_poster')->move(
            base_path() . '/public/images/gallery/', $imageName
        );
        return redirect('dashboard/gallery');
    }

    public function deleteGallery(Request $request)
    {
        $id = $request->input('gallery_id');
        $gallery = Gallery::destroy($id);
        if($gallery) return redirect('dashboard/gallery');
    }

    public function monthlySchedule()
    {
        $data['page_title'] = 'Telkom CorpU News Center | Monthly Training Schedule';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['schedule'] = Schedule::find(2);
        //dd($data['blog']);
        return view('admin.monthly', $data);
    }

    public function editMonthlySchedule()
    {
        $data['page_title'] = 'Telkom CorpU News Center | Monthly Training Schedule';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['schedule'] = Schedule::find(2);
        //dd($data['blog']);
        return view('admin.edit-monthly', $data);
    }

    public function submitMonthlySchedule(Request $request, $id)
    {
        $videoName = 'monthly'.'.'.$request->file('video-link')->getClientOriginalExtension();
        DB::table('schedule')->where('schedule_id', $id)->update([
            'schedule_link' => $videoName,
        ]);
        $request->file('video-link')->move(
            base_path() . '/public/video/monthly/', $videoName
        );
        return redirect('dashboard/schedule/monthly');
    }

    public function weeklySchedule()
    {
        $data['page_title'] = 'Telkom CorpU News Center | Weekly Training Schedule';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['schedule'] = Schedule::find(1);
        //dd($data['blog']);
        return view('admin.weekly', $data);
    }

    public function editWeeklySchedule()
    {
        $data['page_title'] = 'Telkom CorpU News Center | Weekly Training Schedule';
        $data['count_all'] = Blog::all()->count();
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['schedule'] = Schedule::find(1);
        //dd($data['blog']);
        return view('admin.edit-weekly', $data);
    }

    public function submitWeeklySchedule(Request $request, $id)
    {
        $videoName = 'weekly'.'.'.$request->file('video-link')->getClientOriginalExtension();
        DB::table('schedule')->where('schedule_id', $id)->update([
            'schedule_link' => $videoName,
        ]);
        $request->file('video-link')->move(
            base_path() . '/public/video/weekly/', $videoName
        );
        return redirect('dashboard/schedule/weekly');
    }
}
