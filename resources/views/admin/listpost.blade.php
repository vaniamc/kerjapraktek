@extends('layouts.master')

@section('content')
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Semua Posting</h3><br>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">#/th>
            <th class="text-center">Judul</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td class="text-center">1</td>
              <td class="text-center">lalala</td>
              <td class="text-center">jajajajaja</td>
              <td class="text-center">
                <a href="{{url('user/edit', $row->id )}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{url('user/delete', $row->id )}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
              </td>

          </tr>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div><!-- /.box-body -->

  </div>


@stop