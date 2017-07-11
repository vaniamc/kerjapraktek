@extends('layout.master')

@section('css')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@stop

@section('content')

<!-- Form Pencarian -->
<div class="box">
  <!-- /.box-header -->
  	<div class="box-body pad">
    	{{Form::open(['route'=>'admin.insert', 'files'=> true])}}
    	<div class="box-body">
	        <div class="form-group">
		        {{Form::label('title', 'Judul')}}
		        {{Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'Judul', 'name'=>'title-blog'))}}
	        </div>
			<div class="form-group">
				{{Form::label('title', 'Gambar')}}
		        <input name="blog_picture" type="file" class="form-control" id="imgInp">
		        <img id="blah" src="#" alt="your image" hidden/>
	        </div>
	        <div class="form-group">
	        	{{Form::label('body', 'Konten')}}
	        	<textarea name="content-blog" id="summernote" class="form-control"></textarea>
	        </div>
	        <div class="checkbox">
	        	<label>
	        		{{Form::checkbox('publish', 1, null)}} Posting
	        	</label>
	        </div>
	        <div class="form-group">
	        	{{Form::submit('Simpan Postingan',array('class' => 'btn btn-primary btn-sm'))}}
	        </div>
	    </div>    
	    {{Form::close()}}
   	</div>
</div>
@stop

@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script>
	$('#summernote').summernote({
		placeholder: 'Tulis di sini...'
	});
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                document.getElementById("blah").removeAttribute("hidden");
                document.getElementById("blah").setAttribute("class", "img-responsive");
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>
@stop