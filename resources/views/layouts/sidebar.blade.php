

<div class="col-md-3">
    <div class="navbar-collapse">
                <ul class="nav navbar-nav side-nav">
                <li>
                    <a class="list-group-item {{ active_route('home') }}" href="{{ route('home') }}"><i class="fa fa-fw fa-home fa-lg"></i>&nbsp; Home</a>
                </li>
                    @ifSuper
                    <li>
                       <a class="list-group-item {{ active_route('users.index') }}" href="{{ route('users.index') }}"><i class="fa fa-fw fa-user fa-lg"></i>&nbsp; Users</a>
                    </li>
                    @endif
                     @ifSuper
                <li>
                    <a class="list-group-item {{ active_route('roles.index') }}" href="{{ route('roles.index') }}"><i class="fa fa-fw fa-user-circle-o fa-lg"></i>&nbsp; Roles
                    </a>
                </li>
            @endif
                <li>
                    <a class="list-group-item {{ active_route('posts.index') }}" href="{{ route('posts.index') }}"><i class="fa fa-fw fa-edit fa-lg"></i>&nbsp; Posts
                    </a>
                </li>
                <li>
                <a class="list-group-item {{ active_check('images.index') }}" href="{{ route('images.index') }}">
                     <i class="icon-user"></i>&nbsp; Medias
                 </a>
             </li>                
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table "></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
    </div>
</div>