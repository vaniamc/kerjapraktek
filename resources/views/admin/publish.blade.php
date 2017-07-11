@extends('layout.master')

@section('content')
  <div class="box">
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ?>
          @foreach($blog as $row)
          <tr>
              <td class="text-center">{{$no++}}</td>
              <td class="text-center">{{$row->blog_title}}</td>
              <td class="text-center">{{$row->created_at}}</td>
              <td class="text-center">
                <a href="{{url('user/edit', $row->blog_id )}}" class="btn btn-primary btn-xs">Edit <span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{url('user/delete', $row->blog_id )}}" class="btn btn-danger btn-xs">Delete <span class="glyphicon glyphicon-remove"></span></a>
              </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div><!-- /.box-body -->

  </div>
@stop
@section('js')
<script>
  $('#example1').DataTable();
</script>
@stop