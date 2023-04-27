<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Advertisments | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- bootstrap 3.0.2 -->
    @include('layouts.partials._css')
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            Advertisments
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        @include('layouts.partials._navbar')
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            @include('layouts.partials._sidebar')
            <!-- /.sidebar -->
        </aside>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href={{ route('dashboard') }}><i class="fa fa-dashboard"></i> Home</a></li>
                    @yield('link')

                </ol>
            </section>
            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
    <!-- add new calendar event modal -->
    @include('layouts.partials._js')
    @yield('js')
</body>

</html>
