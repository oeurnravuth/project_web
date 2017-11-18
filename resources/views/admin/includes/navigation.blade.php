<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Admin!</span></a>
        </div>
        <br/>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{route('admin.dashboard.list')}}"><i class="fa fa-home"></i> Dashboard </a>
                    </li>
                    @if(AuthRole::isAuthenticate(AuthRole::admin()))
                        <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin.users.get_add_new')}}">Add New</a></li>
                                <li><a href="{{route('admin.users.list')}}">List</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(AuthRole::isAuthenticate(AuthRole::author()))
                        <li><a><i class="fa fa fa-file-photo-o"></i> Content <span
                                        class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin.contents.get_add_new')}}">Add New</a></li>
                                <li><a href="{{route('admin.contents.list')}}">List</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>