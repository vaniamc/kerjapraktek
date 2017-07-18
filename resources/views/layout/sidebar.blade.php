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
      <!-- --------------------------------POST---------------------- -->
        <li class="treeview active">
            <a href="#"><i class="fa fa-archive"></i><span>POST</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.all')}}"><i class="fa fa-circle-o"></i> All Posts ({{$count_all}})</a></li>
                <li><a href="{{route('admin.published')}}"><i class="fa fa-circle-o"></i> Published ({{$count_pub}})</a></li>
                <li><a href="{{route('admin.view.category')}}"><i class="fa fa-folder-open"></i> Category</a></li>
                <li><a href="{{route('admin.add')}}"><i class="fa fa-plus-square"></i>New Post</a></li>
            </ul>
        </li>
        <!-- ---------------------------END of POST-------------------------------- -->
        <!-- ----------------------------INFO---------------------------------- -->
        <li class="treeview active">
            <a href="#"><i class="fa fa-info"></i><span>INFO</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.all.info')}}"><i class="fa fa-circle-o"></i> All Info</a></li>
                <li><a href="{{route('admin.add.info')}}"><i class="fa fa-plus-square"></i>New Info</a></li>
            </ul>
        </li>
        <!-- ----------------------------END of INFO---------------------------------- -->
        <!-- ----------------------------Gallery---------------------------------- -->
        <li class="treeview active">
            <a href="#"><i class="fa fa-image"></i><span>GALLERY</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.all.gallery')}}"><i class="fa fa-circle-o"></i> All Image</a></li>
                <li><a href="{{route('admin.all.album')}}"><i class="fa fa-folder-open"></i> Album</a></li>
                <li><a href="{{route('admin.add.gallery')}}"><i class="fa fa-plus-square"></i>New Image</a></li>
            </ul>
        </li>
        <!-- ----------------------------END of Gallery---------------------------------- -->
        <!-- ----------------------------training---------------------------------- -->
        <li class="treeview active">
            <a href="#"><i class="fa fa-calendar"></i><span>TRAINING SCHEDULE</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.all')}}"><i class="fa fa-circle-o"></i> Weekly</a></li>
                <li><a href="{{route('admin.published')}}"><i class="fa fa-circle-o"></i> Monthly</a></li>
            </ul>
        </li>
        <!-- ----------------------------END of TRAINING---------------------------------- -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>