@extends('layout.master')

@section('content')
<div class="box box-warning">
  <div class="box-body">
    <form role="form" method="post" action="{{url('dashboard/edit-category',$category->category_id)}}">
      {{csrf_field()}}
      <!-- text input -->
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="ex: GPDP" name="name" value="{{ $category->category_name }}" required>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div><!-- /.box-body -->
</div>

@stop