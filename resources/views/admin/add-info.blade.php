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
    	{{Form::open(['route'=>'admin.insert.info', 'files'=> true])}}
    	<div class="box-body">
	        <div class="form-group">
		        {{Form::label('title', 'Title')}}
		        {{Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'Title', 'name'=>'title-info', 'required' => 'required'))}}
	        </div>
			<div class="form-group">
				{{Form::label('title', 'Picture')}}
		        <input name="info-poster" type="file" class="form-control" id="imgInp" required>
		        <img id="blah" src="#" alt="your image" hidden/>
	        </div>
	        <div class="form-group">
	        	{{Form::submit('Save Info',array('class' => 'btn btn-primary btn-sm'))}}
	        </div>
	    </div>    
	    {{Form::close()}}
   	</div>
</div>
@stop

@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script>
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