
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('admin-backend/index')}}" class="site_title"><i class="fa fa-paw"></i> <span>MM Cupid</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ url('assets/images/admin.png')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::guard('admin')->user()->username }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                
                  <div class="menu_section">
               
                <ul class="nav side-menu">              
                  <li style="display: {{ showPermission('admin-backend/index')}}"><a href="{{ url('admin-backend/index')}}"><i class="fa fa-laptop"></i> Home</a></li>
                    <li><a><i class="fa fa-home"></i> User Management <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu"> 
                        <li><a href="{{ url('admin-backend/user/create')}}">Create User</a></li>
                        <li><a href="{{ url('admin-backend/user/index')}}">Listing</a></li>
                      </ul>
                    </li>

                    <li style="display: {{ showPermission('admin-backend/city')}}"><a><i class="fa fa-building"></i> City Management <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu"> 
                        <li><a href="{{ url('admin-backend/city/create')}}">Create City</a></li>
                        <li><a href="{{ url('admin-backend/city/index')}}">Listing</a></li>
                      </ul>
                    </li>
                  
                    <li style="display: {{ showPermission('admin-backend/hobby')}}"><a><i class="fa fa-home"></i> Hobby Management <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">   
                        <li><a href="{{ url('admin-backend/hobby/create')}}">Create Hobbies</a></li>
                        <li><a href="{{ url('admin-backend/hobby/index')}}">Listing</a></li>
                      </ul>
                    </li>                  
                    <li style="display: {{ showPermission('admin-backend/setting')}}">
                      <a href="{{ url('admin-backend/setting/index')}}"><i class="fa fa-gear"></i>Setting</a>
                    </li>                
                </ul>
              </div>
                </ul>
              </div>
              

            </div>
           
          </div>
        </div>