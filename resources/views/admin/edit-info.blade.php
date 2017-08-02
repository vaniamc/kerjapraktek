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
    	{{Form::open(['url'=>'dashboard/edit-info/'.$info->info_id, 'files'=> true])}}
    	<div class="box-body">
	        <div class="form-group">
		        {{Form::label('title', 'Title')}}
		        {{Form::text('title',$info->info_title,array('class' => 'form-control', 'placeholder'=>'Title', 'name'=>'title-info', 'required' => 'required'))}}
	        </div>
			<div class="form-group">
				{{Form::label('title', 'Picture')}}
                <input name="info_poster" type="file" class="form-control" id="imgInp">
                @if($info->info_poster == NULL)
                    <img id="blah" src="#" alt="your image" hidden/>
                @else
                    <img id="blah" src="{{asset('images/info/'.$info->info_poster)}}" alt="your image" class="img-responsive" />
                @endif
                @if ($errors->has('info-poster'))
                    <span class="help-block" style="color:red;">
                        <strong>{{ $errors->first('info-poster') }}</strong>
                    </span>
                @endif
	        </div>
	        <div class="form-group">
	        	{{Form::submit('Update Info',array('class' => 'btn btn-primary btn-sm'))}}
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