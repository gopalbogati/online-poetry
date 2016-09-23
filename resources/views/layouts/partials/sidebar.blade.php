<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                    </a>
                </div>
            </div>
    @endif

    <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control"
                       placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('welcome.user') }}"><i class="fa fa-external-link" aria-hidden="true"></i>Front page</a>
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i>
                    <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Categories</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('categorycreate') }}">Create category</a></li>
                    <li><a href="{{ route('categorylist') }}">List categories</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Users</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('userlist') }}">List Users</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Posts</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('postcreate') }}">Create post</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="{{ route('postLists') }}">List posts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-gear fa-fw"></i> Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                       {{-- <a href="{{ route('user.group.index') }}"> Users</a>--}}
                    </li>
                    <li>
                        <a href="{{ route('role.index') }}"> Roles</a>
                    </li>
                    <li>
                        <a href="{{ route('permission.index') }}"> Permissions</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
