<div id="sidebar">
    <div data-scrollable="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img alt="" src="{{ asset('images/arminsam.jpg') }}"></a>
                </div>
                <div class="info">Armin SAM <small>Senior Software Engineer</small></div>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-header">CMS</li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-globe"></span> Pages</a></li>
            <li class="has-sub {{ Route::is('post*', 'comment*', 'categor*', 'tag*') ? 'expand active' : '' }}"><a href="javascript:;"><span class="glyphicon glyphicon-edit"></span> Posts <b class="caret pull-right"></b></a>
                <ul class="sub-menu">
                    <li class="{{ Route::is('post*') ? 'active' : '' }}"><a href="{{ route('posts_index') }}">Posts</a></li>
                    <li class="{{ Route::is('comment*') ? 'active' : '' }}"><a href="{{ route('comments_index') }}">Comments</a></li>
                    <li class="{{ Route::is('categor*') ? 'active' : '' }}"><a href="{{ route('categories_index') }}">Categories</a></li>
                    <li class="{{ Route::is('tag*') ? 'active' : '' }}"><a href="{{ route('tags_index') }}">Tags</a></li>
                </ul>
            </li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span> Media</a></li>
            <li class="nav-header">RESOURCES</li>
            <li class="has-sub"><a href="javascript:;"><span class="glyphicon glyphicon-user"></span> Users <b class="caret pull-right"></b></a>
                <ul class="sub-menu">
                    <li><a href="javascript:;">Users</a></li>
                    <li><a href="javascript:;">Roles</a></li>
                    <li><a href="javascript:;">Permissions</a></li>
                </ul>
            </li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-star"></span> Companies</a></li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span> Departments</a></li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-briefcase"></span> Employees</a></li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-tasks"></span> Workflows</a></li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-list-alt"></span> Forms</a></li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-star-cog"></span> Processes</a></li>
            <li class="nav-header">SETTINGS</li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-wrench"></span> App Configuration</a></li>
            <li><a href="javascript:;"><span class="glyphicon glyphicon-sunglasses"></span> My Profile</a></li>
        </ul>
    </div>
</div>