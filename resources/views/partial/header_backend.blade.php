<style type="text/css">
    .active-site{
        background-color: #f4f4f4;
    }
</style>

<header class="main-header">
    <!-- Logo -->
    <a href="{!! url('/home') !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">We Can </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{!! Auth::user()->fullname !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                          <li class="user-header">
                             <img src="{!! GLobalHelper::checkImage(Auth::user()->image) !!}" class="img-circle" alt="User Image"/>
                            <p>
                              {!! Auth::user()->fullname !!}
                              <small>Member since {!! GLobalHelper::formatDate(Auth::user()->created_at, 'd F Y') !!}</small>
                            </p>
                          </li>
                          <!-- Menu Footer-->
                          <li class="user-footer">
                            <div class="pull-left">
                              <a href="{!! url('home/profil') !!}" class="btn btn-default btn-flat">Profile</a>
                              <a href="{!! url('/profil') !!}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                              <a href="{!! url('logout') !!}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                          </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>