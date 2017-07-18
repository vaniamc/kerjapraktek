@extends('layout.master')

@section('content')

<!-- Form Pencarian -->
<div class="box">
  <!-- /.box-header -->
  	<div class="box-body pad">
    	{{Form::open(['route'=>'admin.insert.gallery', 'files'=> true])}}
    	<div class="box-body">
	        <div class="form-group">
		        {{Form::label('album', 'Album Name')}}
		        <select class="form-control" name="album_id">
		          @foreach($album as $row)
		          <option value="{{$row->album_id}}">{{$row->album_name}}</option>
		          @endforeach
		        </select>
	        </div>
			<div class="form-group">
				{{Form::label('title', 'Picture')}}
		        <input name="info-poster" type="file" class="form-control" id="imgInp">
		        <img id="blah" src="#" alt="your image" hidden/>
	        </div>
	        <div class="form-group">
	        	{{Form::submit('Save Image',array('class' => 'btn btn-primary btn-sm'))}}
	        </div>
	    </div>    
	    {{Form::close()}}
   	</div>
</div>
@stop

@section('js')
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