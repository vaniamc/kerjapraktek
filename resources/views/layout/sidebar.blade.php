 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
            <a href="#"><i class="fa fa-archive"></i> List Postingan
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('pendaftar')}}"><i class="fa fa-circle-o"></i> Seluruh Posting</a></li>
                <li><a href="{{url('datawawancara')}}"><i class="fa fa-circle-o"></i> Diposting</a></li>
            </ul>
        </li>
        <li><a href="{{url('/wawancara')}}"><i class="fa fa-plus-square"></i> <span>Tambah Postingan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>