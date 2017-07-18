@extends('layout.master')

@section('content')
<div class="box box-warning">
  <div class="box-body">
    <form role="form" method="post" action="{{route('admin.insert.category')}}">
      {{csrf_field()}}
      <!-- text input -->
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="ex: GPDP" name="name" required>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div><!-- /.box-body -->
</div>

@stop