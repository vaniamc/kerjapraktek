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
    	//judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | All Posts';
        //mengambil seluruh data berita
    	$data['blog'] = Blog::with('category')->get();
    	//menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
    	$data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
    	//dd($data['count_all']);
    	return view('admin.all', $data);
    }

    public function publish()
    {
    	//judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Published';
        //mengambil data berita yang telah diterbitkan
    	$data['blog'] = Blog::with('category')->where('blog_publish','1')->get();
    	//menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
    	// dd($data['blog']);
    	return view('admin.publish', $data);
    }

    public function add()
    {
    	//judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | New Post';
    	//menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['category'] = Category::all();
    	//dd($data['blog']);
    	return view('admin.add', $data);
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
            'blog_picture' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);

        // membuat data berita baru
        $blog = new Blog();
        //memasukkan data untuk berita baru
		$blog->blog_title = $request->input('title-blog');
		$blog->blog_content = $request->input('content-blog');
        $blog->category_id = $request->input('category_id');
		//apabila checklist tercentang maka diterbitkan
        if($request->input('publish') == 1){
			$blog->blog_publish = 1;
		}
        //jika tidak, hanya disimpan
		else{
			$blog->blog_publish = 0;
		}
		$imageName = 'blog_default.png';
		if($request->file()!=null){
			$imageName = time().'.'.$request->file('blog_picture')->getClientOriginalExtension();
		}
        //menyimpan nama gambar berita
		$blog->blog_picture= $imageName;
		//menyimpan data berita
        $blog->save();
		if($request->file()!=null){
				//memindahkan unggahan
                $request->file('blog_picture')->move(
				base_path() . '/public/images/blog/', $imageName
			);
		}
		return redirect('dashboard/all');
    }

    public function edit($id)
    {
    	//judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Edit Post';
    	//menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
    	$data['blog'] = Blog::all()->where('blog_id',$id)->first();
        $data['category'] = Category::all();
		return view('admin.edit', $data);
    }

    public function submitEdit(Request $request, $id)
    {
    	$this->validate($request, [
            'blog_picture' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);
        //apabila kotak checklist publish tercentang, berita akan diterbitkan
        if($request->input('publish') == 1){
			$publish = 1;
		}
        //jika tidak, hanya akan disimpan
		else{
			$publish = 0;
		}
        //apabila gambar tidak diunggah
    	if($request->file('blog_picture')==null){
			DB::table('blog')->where('blog_id', $id)->update([
				'blog_title' => $request->input('title-blog'),
				'blog_content' => $request->input('content-blog'),
				'blog_publish' => $publish,
                'category_id' => $request->input('category_id'),
			]);
		}
        //apabila mengunggah gambar
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
    	//mengambil inputan
        $id = $request->input('blog_id');
    	//menghapus data berita
        $blog = Blog::destroy($id);
    	if($blog) return redirect('dashboard/all');
    }

    public function allCategory()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | All Category';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //mengambil seluruh data kategori
        $data['category'] = Category::all();
        //dd($data['blog']);
        return view('admin.all-category', $data);
    }

    public function addCategory(){
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | New Category';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //dd($data['blog']);
        return view('admin.add-category', $data);
    }

    public function insertCategory(Request $request){
        //membuat data kategori baru
        $category = new Category();
        //mengambil input nama kategori
        $category->category_name = $request->input('name');
        //menyimpan data kategori
        $category->save();
        return redirect('dashboard/category');
    }

    public function editCategory($id){
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Edit Category';
       //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['category'] = Category::find($id);
        // dd($data['category']);
        return view('admin.edit-category', $data);
    }

    public function submitEditCategory(Request $request, $id){
        //query untuk memperbarui data kategori
        DB::table('category')->where('category_id', $id)->update([
                'category_name' => $request->input('name'),
            ]);
        return redirect('dashboard/category');
    }

    public function allInfo()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | All Info';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //mengambil seluruh data info
        $data['info'] = Info::all();
        //dd($data['blog']);
        return view('admin.all-info', $data);
    }

    public function addInfo()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | New Info';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //dd($data['blog']);
        return view('admin.add-info', $data);
    }

    public function insertInfo(Request $request){
        $this->validate($request, [
            'info-poster' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);
        //membuat data info yang baru
        $info = new Info();
        //mengambil judul info yang akan dibuat
        $info->info_title = $request->input('title-info');
        $imageName = 'blog_default.png';
        if($request->file()!=null){
            //memberi nama file foto
            $imageName = time().'.'.$request->file('info-poster')->getClientOriginalExtension();
        }
        $info->info_poster= $imageName;
        //menyimpan data foto baru
        $info->save();
        //memindahkan file foto
        if($request->file()!=null){
                $request->file('info-poster')->move(
                base_path() . '/public/images/info/', $imageName
            );
        }
        return redirect('dashboard/info');
    }

    public function editInfo($id)
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Edit Info';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['info'] = Info::find($id);
        //dd($data['blog']);
        return view('admin.edit-info', $data);
    }

    public function submitEditInfo(Request $request, $id)
    {
        $this->validate($request, [
            'info-poster' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);
        //memperbarui data info 
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
        //mengambil id info yang ingin dihapus
        $id = $request->input('info_id');
        //menghapus info
        $info = Info::destroy($id);
        if($info) return redirect('dashboard/info');
    }

    public function allAlbum()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | All Album';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //mengambil seluruh data album
        $data['album'] = Album::all();
        //dd($data['blog']);
        return view('admin.all-album', $data);
    }

    public function addAlbum()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | New Album';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //dd($data['blog']);
        return view('admin.add-album', $data);
    }

    public function insertAlbum(Request $request)
    {
        //membuat data album baru
        $album = new Album();
        //mengambil input nama album
        $album->album_name = $request->input('name');
        //menyimpan data album
        $album->save();
        return redirect('dashboard/album');
    }

    public function editAlbum($id)
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Edit Album';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['album'] = Album::find($id);
        //dd($data['blog']);
        return view('admin.edit-album', $data);
    }

    public function submitEditAlbum(Request $request, $id)
    {
        //query mengubah nama album
        DB::table('album')->where('album_id', $id)->update([
                'album_name' => $request->input('name'),
            ]);
        return redirect('dashboard/album');
    }

    public function deleteAlbum(Request $request)
    {
        //mengambil data album yang akan dihapus
        $id = $request->input('album_id');
        //menghapus data album
        $album = Album::destroy($id);
        if($album) return redirect('dashboard/album');
    }

    public function allGallery()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | All Images';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        //mengambil seluruh data foto
        $data['gallery'] = Gallery::with('album')->get();
        //dd($data['blog']);
        return view('admin.all-gallery', $data);
    }

    public function addGallery()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | New Image';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['album'] = Album::all();
        //dd($data['blog']);
        return view('admin.add-gallery', $data);
    }

    public function insertGallery(UploadRequest $request){
        //memasukkan semua foto yang telah diunggah ke dalam database
        foreach($request->photos as $photo){
            //membuat data foto baru
            $gallery = new Gallery();
            $gallery->album_id = $request->input('album_id');
            $imageName = time().'-'.$photo->getClientOriginalName().'.'.$photo->getClientOriginalExtension();
            $gallery->gallery_path= $imageName;
            //menyimpan data foto
            $gallery->save();
            //memindahkan file foto yang diunggah
            $photo->move(
                base_path() . '/public/images/gallery/', $imageName
            );
            //dd($gallery);
        }
        return redirect('dashboard/gallery');
    }

    public function editGallery($id)
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Edit Image';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['gallery'] = Gallery::find($id);
        $data['album'] = Album::all();
        //dd($data['blog']);
        return view('admin.edit-gallery', $data);
    }

    public function submitEditGallery(Request $request, $id)
    {
        $this->validate($request, [
            'info_poster' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);
        //memberi nama pada foto yang diunggah
        $imageName = time().'.'.$request->file('info_poster')->getClientOriginalExtension();
        //memperbarui data foto
        DB::table('gallery')->where('gallery_id', $id)->update([
            'album_id' => $request->input('album_id'),
            'gallery_path' => $imageName,
        ]);
        //memindahkan file foto
        $request->file('info_poster')->move(
            base_path() . '/public/images/gallery/', $imageName
        );
        return redirect('dashboard/gallery');
    }

    public function deleteGallery(Request $request)
    {
        //mengambil data foto
        $id = $request->input('gallery_id');
        //menghapus data foto
        $gallery = Gallery::destroy($id);
        if($gallery) return redirect('dashboard/gallery');
    }

    public function monthlySchedule()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Monthly Training Schedule';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['schedule'] = Schedule::find(2);
        //dd($data['blog']);
        return view('admin.monthly', $data);
    }

    public function editMonthlySchedule()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Monthly Training Schedule';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['schedule'] = Schedule::find(2);
        //dd($data['blog']);
        return view('admin.edit-monthly', $data);
    }

    public function submitMonthlySchedule(Request $request, $id)
    {
        $this->validate($request, [
            'video-link' => 'mimes:video/x-msvideo,video/mp4|max:20000'
        ]);
        //memberi nama video
        $videoName = 'monthly'.'.'.$request->file('video-link')->getClientOriginalExtension();
        //memperbarui nama video
        DB::table('schedule')->where('schedule_id', $id)->update([
            'schedule_link' => $videoName,
        ]);
        //menyimpan dan memindahkan video
        $request->file('video-link')->move(
            base_path() . '/public/video/monthly/', $videoName
        );
        return redirect('dashboard/schedule/monthly');
    }

    public function weeklySchedule()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Weekly Training Schedule';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['schedule'] = Schedule::find(1);
        //dd($data['blog']);
        return view('admin.weekly', $data);
    }

    public function editWeeklySchedule()
    {
        //judul halaman
        $data['page_title'] = 'Telkom CorpU News Center | Weekly Training Schedule';
        //menghitung jumlah semua berita untuk sidebar
        $data['count_all'] = Blog::all()->count();
        //menghitung jumlah berita yang diterbitkan untuk sidebar
        $data['count_pub'] = Blog::all()->where('blog_publish','1')->count();
        $data['schedule'] = Schedule::find(1);
        //dd($data['blog']);
        return view('admin.edit-weekly', $data);
    }

    public function submitWeeklySchedule(Request $request, $id)
    {
        $this->validate($request, [
            'video-link' => 'mimes:video/x-msvideo,video/mp4|max:20000'
        ]);
        //memberi nama video
        $videoName = 'weekly'.'.'.$request->file('video-link')->getClientOriginalExtension();
        //memperbarui nama video
        DB::table('schedule')->where('schedule_id', $id)->update([
            'schedule_link' => $videoName,
        ]);
        //memindahkan/menyimpan file video
        $request->file('video-link')->move(
            base_path() . '/public/video/weekly/', $videoName
        );
        return redirect('dashboard/schedule/weekly');
    }
}
