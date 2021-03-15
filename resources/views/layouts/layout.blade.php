@include('layouts.header')
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>DashBoard</span></a></li>

            @if (Auth::user()->user_type ==2)
                <li><a href="{{ url('/my-issued-book') }}"><i class="fa fa-dashboard"></i> <span>My Issued Book</span></a></li>
            @endif


            @if (Auth::user()->user_type !=2)
            <li><a href="{{ route('category.index') }}"><i class="fa fa-book"></i> <span>Manage Category</span></a></li>
            <li><a href="{{ route('book.index') }}"><i class="fa fa-book"></i> <span>Manage Book</span></a></li>

             <li class=" treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Manage Issue Book</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('issue-book.index') }}"><i class="fa fa-circle-o"></i>Issue Book</a></li>
                <li><a href="{{ url('return-book') }}"><i class="fa fa-circle-o"></i>Return Book</a></li>

                <li><a href="{{ url('all-issue-book') }}"><i class="fa fa-circle-o"></i>Issue History</a></li>

                @endif

              </ul>
            </li>

            <li><a href="{{ url('admin-logout') }}"><i class="fa fa-book"></i> <span>Logout</span></a></li>

            {{-- <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li> --}}
{{--
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li><a href="{{ url('admin-logout') }}"><i class="fa fa-book"></i> <span>Logout</span></a></li> --}}

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      @yield('content')

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
@include('layouts.footer')
