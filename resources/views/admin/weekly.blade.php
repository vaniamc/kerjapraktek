@extends('layout.master')

@section('css')
<style type="text/css">
	video{
		width: 100%;
		height: auto;
	}
</style>
@stop

@section('content')

<!-- Form Pencarian -->
<div class="box">
  <!-- /.box-header -->
  	<div class="box-body pad">
    	<div class="box-body">
			<div class="form-group">
				<label>Video</label><br><br>
		        @if($schedule->schedule_link == NULL)
		        <a href="{{url('dashboard/schedule/weekly/edit', $schedule->schedule_id )}}" class="btn btn-primary"><span>Upload Video </span><span><i class="fa fa-video-camera"></i></span></a>
		        @else
		        <video controls>
		        	<source src="{{asset('video/weekly/'.$schedule->schedule_link)}}">
		        </video>
		        @endif
	        </div>
	        <div class="form-group">
	        	<a href="{{url('dashboard/schedule/weekly/edit', $schedule->schedule_id )}}" class="btn btn-primary"><span>Edit </span><span class="glyphicon glyphicon-pencil"></span></a>
	        </div>
	    </div>
   	</div>
</div>
@stop