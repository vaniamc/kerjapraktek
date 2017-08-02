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
		        {{Form::label('title', 'Title')}}
		        {{Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'Title', 'name'=>'title-blog', 'required' => 'required'))}}
	        </div>
	        <div class="form-group">
		        {{Form::label('category', 'Category')}}
		        <select class="form-control" name="category_id">
		          @foreach($category as $row)
		          <option value="{{$row->category_id}}">{{$row->category_name}}</option>
		          @endforeach
		        </select>
	        </div>
			<div class="form-group">
				{{Form::label('title', 'Picture')}}
		        <input name="blog_picture" type="file" class="form-control" id="imgInp">
		        <img id="blah" src="#" alt="your image" hidden/>
				@if ($errors->has('blog_picture'))
		            <span class="help-block" style="color:red;">
		                <strong>{{ $errors->first('blog_picture') }}</strong>
		            </span>
		        @endif
	        </div>
	        <div class="form-group">
	        	{{Form::label('body', 'Content')}}
	        	<textarea name="content-blog" id="summernote" class="form-control" required></textarea>
	        </div>
	        <div class="checkbox">
	        	<label>
	        		{{Form::checkbox('publish', 1, null)}} Publish
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