@extends('layout.master')

@section('content')
  <div class="box">
    <div class="box-body">
      <a href="{{route('admin.new.category')}}" class="btn btn-primary"><span>New Category </span><span class="glyphicon glyphicon-plus"></span></a><br><br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ?>
          @foreach($category as $row)
          <tr>
              <td class="text-center">{{$no++}}</td>
              <td class="text-center">{{$row->category_name}}</td>
              <td class="text-center">
                <a href="{{url('dashboard/edit-category', $row->category_id )}}" class="btn btn-primary btn-xs"><span>Edit </span><span class="glyphicon glyphicon-pencil"></span></a>
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
  $('#confirmDelete').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var productId = $(e.relatedTarget).data('product_id');
    $("#id_blog").attr('value', productId);
    $("#delForm").attr('action', 'delete');//e.g. 'domainname/products/' + productId
  });
</script>
@stop