 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
            <a href="#"><i class="fa fa-archive"></i><span>Posts</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.all')}}"><i class="fa fa-circle-o"></i> All Posts ({{$count_all}})</a></li>
                <li><a href="{{route('admin.published')}}"><i class="fa fa-circle-o"></i> Published ({{$count_pub}})</a></li>
            </ul>
        </li>
        <li><a href="{{route('admin.add')}}"><i class="fa fa-plus-square"></i> <span>New Post</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>