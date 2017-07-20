@extends('layout.master')

@section('content')

<!-- Form Pencarian -->
<div class="box">
  <!-- /.box-header -->
  	<div class="box-body pad">
  		@if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li><span class="help-block" style="color:red;"><strong>{{ $error }}</strong></span></li>
            @endforeach
        </ul>
    	@endif
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
		        <input name="photos[]" type="file" class="form-control" multiple>
	        </div>
	        <div class="form-group">
	        	{{Form::submit('Save Image',array('class' => 'btn btn-primary btn-sm'))}}
	        </div>
	    </div>    
	    {{Form::close()}}
   	</div>
</div>
@stop