@extends('layout.master')

@section('content')

<!-- Form Pencarian -->
<div class="box">
  <!-- /.box-header -->
  	<div class="box-body pad">
    	{{Form::open(['url'=>'dashboard/edit-gallery/'.$gallery->gallery_id, 'files'=> true])}}
    	<div class="box-body">
	        <div class="form-group">
		        {{Form::label('album', 'Album Name')}}
		        <select class="form-control" name="album_id">
		          @foreach($album as $row)
		          <option value="{{$row->album_id}}"{{($row->album_id == $gallery->album_id) ? 'selected' : '' }}>{{$row->album_name}}</option>
		          @endforeach
		        </select>
	        </div>
			<div class="form-group">
				{{Form::label('title', 'Picture')}}
		        <input name="info_poster" type="file" class="form-control" id="imgInp">
		        <img id="blah" src="{{asset('images/gallery/'.$gallery->gallery_path)}}" alt="your image" class="img-responsive" />
	        </div>
	        <div class="form-group">
	        	{{Form::submit('Update Image',array('class' => 'btn btn-primary btn-sm'))}}
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