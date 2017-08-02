@extends('layout.master')

@section('content')

<!-- Form Pencarian -->
<div class="box">
  <!-- /.box-header -->
  	<div class="box-body pad">
    	{{Form::open(['url'=>'dashboard/schedule/weekly/edit/'.$schedule->schedule_id, 'files'=> true])}}
    	<div class="box-body">
			<div class="form-group">
				{{Form::label('title', 'Video')}}
		        <input name="video-link" type="file" class="form-control" required>
                @if ($errors->has('video-link'))
                    <span class="help-block" style="color:red;">
                        <strong>{{ $errors->first('video-link') }}</strong>
                    </span>
                @endif
	        </div>
	        <div class="form-group">
	        	{{Form::submit('Save Video',array('class' => 'btn btn-primary btn-sm'))}}
	        </div>
	    </div>    
	    {{Form::close()}}
   	</div>
</div>
@stop