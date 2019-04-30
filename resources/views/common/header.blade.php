<!-- Main Header -->
<header class="main-header">

<!-- Logo -->
<a href="{{ url('/') }}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini">{{ config('app.name', 'Laravel') }}</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>{{ config('app.name', 'Laravel') }}</b></span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->
      <li class="dropdown messages-menu">
        <!-- Menu toggle button -->
        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-envelope-o"></i>
          <span class="label label-success"></span>
        </a> -->
        <!-- <ul class="dropdown-menu">
          <li class="header">You have 4 messages</li>
          <li> -->
            <!-- inner menu: contains the messages -->
            <!-- <ul class="menu">
              <li>start message -->
                <!-- <a href="#">
                  <div class="pull-left"> -->
                    <!-- User Image -->
                    <!-- <img src="{{ asset('theme/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                  </div> -->
                  <!-- Message title and timestamp -->
                  <!-- <h4>
                    Support Team
                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                  </h4> -->
                  <!-- The message -->
                  <!-- <p>Why not buy a new awesome theme?</p>
                </a>
              </li> -->
              <!-- end message -->
            <!-- </ul> -->
            <!-- /.menu -->
          <!-- </li> -->
          <!-- <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
      </li> -->
      <!-- /.messages-menu -->

      
     
          
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="{{ asset('theme/dist/img/avatar.jpg ') }}" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="{{ asset('theme/dist/img/avatar.jpg') }}" class="img-circle" alt="User Image">

            <p>
              {{ Auth::user()->name }}
              <small>Member since {{ Auth::user()->created_at }}</small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <!-- <div class="row">
              <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
              </div>
            </div> -->
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
            </div>
            <div class="pull-right">
              <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>
</nav>
</header>