@extends('layout.master')

@section('content')
  <div class="box">
    <div class="box-body">
      <a href="{{route('admin.add.info')}}" class="btn btn-primary"><span>New Info </span><span class="glyphicon glyphicon-plus"></span></a><br><br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Title</th>
            <th class="text-center">Content</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ?>
          @foreach($info as $row)
          <tr>
              <td class="text-center">{{$no++}}</td>
              <td class="text-center">{{$row->info_title}}</td>
              <td class="text-center">
                @if($row->info_poster == NULL)
                  -
                @else
                  <img src="{{asset('images/info/'.$row->info_poster)}}" class="img-responsive" style="max-width: 30%">
                @endif
              </td>
              <td class="text-center">
                <a href="{{url('dashboard/edit-info', $row->info_id )}}" class="btn btn-primary btn-xs"><span>Edit </span><span class="glyphicon glyphicon-pencil"></span></a>
                <!-- <a href="{{url('dashboard/delete', $row->blog_id )}}" class="btn btn-danger btn-xs" id="delete_product"><span>Delete </span><span class="glyphicon glyphicon-remove"></span></a> -->
                <button type="button" data-product_id="{{ $row->info_id }}" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete">Delete <span class="glyphicon glyphicon-remove"></span></button>
              </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div><!-- /.box-body -->

  </div>

  <!-- Modal -->
  <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <center><h2 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-warning"></i></b></h2></center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><p>Are you sure you want to delete this info?</p></center>        
        </div>
        <div class="modal-footer">
          {!! Form::open(['method' => 'post', 'id'=>'delForm']) !!}
            <input type="text" name="info_id" id="id_blog" hidden>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-danger">Delete</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop
@section('js')
<script>
  $('#example1').DataTable();
  $('#confirmDelete').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var productId = $(e.relatedTarget).data('product_id');
    $("#id_blog").attr('value', productId);
    $("#delForm").attr('action', 'delete-info');//e.g. 'domainname/products/' + productId
  });
</script>
@stop