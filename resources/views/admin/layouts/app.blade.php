<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Transactions | Transaction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> @yield('style')
    <script src="{{asset('js/jquery.min.js')}}">

    </script>
    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/screenfull.js')}}"></script>
    <script>
        $(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
    </script>

    <!----->

    <!--pie-chart--->
    <script src="{{asset('js/pie-chart.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });
    </script>
    <!--skycons-icons-->
    <script src="{{asset('js/skycons.js')}}"></script>
    <!--//skycons-icons-->
</head>

<body>
    <div id="wrapper">



        <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
                <h1> <a class="navbar-brand" href="{{url('/')}}">Transactions</a></h1>
            </div>
            <div class=" border-bottom">
                <div class="full-left">
                    <section class="full-top">
                        <button id="toggle"><i class="fa fa-arrows-alt"></i></button>
                    </section>
                    <form class=" navbar-left-right">
                        <input type="text" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
                        <input type="submit" value="" class="fa fa-search">
                    </form>
                    <div class="clearfix"> </div>
                </div>


                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="drop-men">
                    <ul class=" nav_1">

                        <li class="dropdown at-drop">
                            <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe"></i> <span class="number">5</span></a>
                            <ul class="dropdown-menu menu1 " role="menu">
                                <li>
                                    <a href="#">

                                        <div class="user-new">
                                            <p>New user registered</p>
                                            <span>40 seconds ago</span>
                                        </div>
                                        <div class="user-new-left">

                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-new">
                                            <p>Someone special liked this</p>
                                            <span>3 minutes ago</span>
                                        </div>
                                        <div class="user-new-left">

                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-new">
                                            <p>John cancelled the event</p>
                                            <span>4 hours ago</span>
                                        </div>
                                        <div class="user-new-left">

                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-new">
                                            <p>The server is status is stable</p>
                                            <span>yesterday at 08:30am</span>
                                        </div>
                                        <div class="user-new-left">

                                            <i class="fa fa-info"></i>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-new">
                                            <p>New comments waiting approval</p>
                                            <span>Last Week</span>
                                        </div>
                                        <div class="user-new-left">

                                            <i class="fa fa-rss"></i>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </a>
                                </li>
                                <li><a href="#" class="view">View all messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Admin<i class="caret"></i></span></a>
                            <ul class="dropdown-menu " role="menu">
                                <li><a href="profile.html"><i class="fa fa-user"></i>Edit Profile</a></li>
                                <li><a href="{{route('add')}}"><i class="fa fa-user"></i>Add</a></li>
                                <li><a href="{{route('successfulTransaction')}}"><i class="fa fa-envelope"></i>Transactions</a></li>
                                <li><a href="{{route('users')}}"><i class="fa fa-calendar"></i>Users</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <div class="clearfix">

                </div>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="{{route('home')}}" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                            </li>

                            <li>
                                <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Transactions</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{route('successfulTransaction')}}" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Successful</a></li>

                                    <li><a href="{{route('pendingTransaction')}}" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Pending</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="{{route('users')}}" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon "></i><span class="nav-label">Users</span> </a>
                            </li>

                        </ul>
                    </div>
                </div>
        </nav>

        @yield('content')



        <!---->
        <div class="copy">
            <p> &copy; 2016 Transaction. All Rights Reserved | Design by <a href="http://facebook.com/multimegaitschool" target="_blank">Multimega School</a>                </p>
        </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    </div>
    <!---->
    <!--scrolling js-->
    <script src="{{asset('js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <!--//scrolling js-->
    <script src="{{asset('js/bootstrap.min.js')}}">

    </script>

    @yield('scripts')
</body>

</html>