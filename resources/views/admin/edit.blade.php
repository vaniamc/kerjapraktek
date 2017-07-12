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
    	{{Form::open(['url'=>'dashboard/edit/'.$blog->blog_id, 'files'=> true])}}
    	<div class="box-body">
	        <div class="form-group">
		        {{Form::label('title', 'Title')}}
		        {{Form::text('title',$blog->blog_title,array('class' => 'form-control', 'placeholder'=>'Title', 'name'=>'title-blog'))}}
	        </div>
			<div class="form-group">
				{{Form::label('title', 'Picture')}}
		        <input name="blog_picture" type="file" class="form-control" id="imgInp">
		        @if($blog->blog_picture == NULL)
		        	<img id="blah" src="#" alt="your image" hidden/>
		        @else
		        	<img id="blah" src="{{asset('images/blog/'.$blog->blog_picture)}}" alt="your image" class="img-responsive" />
		        @endif
	        </div>
	        <div class="form-group">
	        	{{Form::label('body', 'Content')}}
	        	<textarea name="content-blog" id="summernote" class="form-control"><?php echo $blog->blog_content?></textarea>
	        </div>
	        <div class="checkbox">
	        	<label>
	        		@if($blog->blog_publish == 1)
	        			{{Form::checkbox('publish', 1, true)}} Publish
	        		@else
	        			{{Form::checkbox('publish', 1, null)}} Publish
	        		@endif
	        	</label>
	        </div>
	        <div class="form-group">
	        	{{Form::submit('Save Post',array('class' => 'btn btn-primary btn-sm'))}}
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