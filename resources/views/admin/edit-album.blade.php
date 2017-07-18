@extends('layout.master')

@section('content')
<div class="box box-warning">
  <div class="box-body">
    <form role="form" method="post" action="{{url('dashboard/edit-album',$album->album_id)}}">
      {{csrf_field()}}
      <!-- text input -->
      <div class="form-group">
        <label>Album Name</label>
        <input type="text" class="form-control" placeholder="ex: GPDP" name="name" value="{{ $album->album_name }}" required>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div><!-- /.box-body -->
</div>

@stop