<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            @auth
                <p>Hello, {{ auth()->user()->name }}</p>
            @endauth


            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." />
            <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i
                        class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active">
            <a href={{ route('dashboard') }}>
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Settings</span>
            </a>
        </li>



        <li>
            <a href={{ route('users.index') }}>
                <i class="fa fa-th"></i> <span>Users</span> <small class="badge pull-right bg-green">new</small>
            </a>
        </li>
        <li>
            <a href={{ route('advertisments.index') }}>
                <i class="fa fa-th"></i> <span>Advertisments</span> <small class="badge pull-right bg-green">new</small>
            </a>
        </li>
        <li>
            <a href={{ route('filter.index') }}>
                <i class="fa fa-th"></i> <span>Filter</span> <small class="badge pull-right bg-green">new</small>
            </a>
        </li>

    </ul>
</section>
