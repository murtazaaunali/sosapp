<html>
    <head>
        <title>@yield('title')</title>
        <meta name="description" content="Dashboard UI Kit">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
        <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        @yield('header_scripts')
        
		<!-- Favicon -->

        <link rel="apple-touch-icon" href="{{ URL::asset('icon.png') }}">
        <link rel="shortcut icon" href="{{ URL::asset('icon.png') }}" type="image/x-icon">
        
        <!-- Style Sheet -->
        <link rel="stylesheet" href="{{ URL::asset('css/main.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}?v=@php {{ echo time(); }} @endphp">

        <!--[if lt IE 9]>
           <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>
           <script src="{{ URL::asset('js/respond.min.js') }}"></script>
        <![endif]-->

    </head>
    <body class="o-page customcss">
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		@section('sidebar')
        <div class="o-page__sidebar js-page-sidebar">
            <div class="c-sidebar">
                <a class="c-sidebar__brand" href="javascript:;">
                    <img class="c-sidebar__brand-img" src="{{ URL::asset('img/logo.png') }}" alt="Logo">
                </a>
                
                <ul class="c-sidebar__list">
                    <li class="c-sidebar__item">
                        @if(Request::segment(2) == 'home')
                        <a class="c-sidebar__link is-active" href="/employee/home">
                        @else
                        <a class="c-sidebar__link" href="/employee/home">
                        @endif
                        <i class="x-client-pre"></i> <span>Home</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        @if(Request::segment(2) == 'documents')
                        <a class="c-sidebar__link is-active" href="/employee/documents">
                        @else
                        <a class="c-sidebar__link" href="/employee/documents">
                        @endif
                        <i class="x-documents"></i> <span>Documents</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item hashDropdown">
                        <a class="c-sidebar__link" href="javascript:void(0);">
                            <i class="x-user"></i> <span>Employee</span>
                        </a>
                        <ul class="subMenu">
                            <li class="c-sidebar__item">
                                @if(Request::segment(2) == 'employee-list' || Request::segment(2) == 'add-employee')
                                <a class="c-sidebar__link is-active" href="/employee/employee-list">
                                @else
                                <a class="c-sidebar__link" href="/employee/employee-list">
                                @endif
                                    <i class="x-users"></i> <span>Employee List</span>
                                </a>
                            </li>
                            <li class="c-sidebar__item">
                                @if(Request::segment(2) == 'emergency-contact')
                                <a class="c-sidebar__link is-active" href="/employee/emergency-contact">
                                @else
                                <a class="c-sidebar__link" href="/employee/emergency-contact">
                                @endif
                                    <i class="x-user-plus"></i> <span>Emergency Contact</span>
                                </a>
                            </li>
                        </ul>
                    <li>
                    <li class="c-sidebar__item">
                        @if(Request::segment(2) == 'clients')
                        <a class="c-sidebar__link is-active" href="/employee/clients">
                        @else
                        <a class="c-sidebar__link" href="/employee/clients">
                        @endif
                        <i class="x-insurance"></i> <span>Clients</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item hashDropdown">
                        <a class="c-sidebar__link" href="javascript:void(0);">
                            <i class="x-insurance"></i> <span>Childs</span>
                        </a>
                        <ul class="subMenu">
                            <li class="c-sidebar__item">
                                @if(Request::segment(2) == 'child-list')
                                <a class="c-sidebar__link is-active" href="/employee/child-list">
                                @else
                                <a class="c-sidebar__link" href="/employee/child-list">
                                @endif
                                <i class="x-insurance"></i> <span>Child Lists</span>
                                </a>
                            </li>
                            <li class="c-sidebar__item">
                                @if(Request::segment(2) == 'add-child')
                                <a class="c-sidebar__link is-active" href="/employee/add-child">
                                @else
                                <a class="c-sidebar__link" href="/employee/add-child">
                                @endif
                                <i class="x-insurance"></i> <span>Add Childs</span>
                                </a>
                            </li>
                            <li class="c-sidebar__item">
                                @if(Request::segment(2) == 'class-schedule' || Request::segment(2) == 'child-schedule')
                                <a class="c-sidebar__link is-active" href="/employee/class-schedule/1">
                                @else
                                <a class="c-sidebar__link" href="/employee/class-schedule/1">
                                @endif
                                    <i class="x-schedule"></i> <span>Child Schedule</span>
                                </a>
                            </li>
                        </ul>
                    <li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/employee/time-punches">
                            <i class="x-demographics"></i> <span>Time Punches</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        @if(Request::segment(2) == 'performance')
                        <a class="c-sidebar__link is-active" href="/employee/performance">
                        @else
                        <a class="c-sidebar__link" href="/employee/performance">
                        @endif
                            <i class="x-reports"></i> <span>Performance</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        @if(Request::segment(2) == 'employee-performance' || Request::segment(2) == 'employee-performance-record')
                        <a class="c-sidebar__link is-active" href="/employee/employee-performance">
                        @else
                        <a class="c-sidebar__link" href="/employee/employee-performance">
                        @endif
                            <i class="x-reports"></i> <span>Employee Performance</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/employee/task">
                            <i class="x-schedule"></i> <span>Task</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/employee/trainings">
                            <i class="x-trainings"></i> <span>Trainings</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        @if(Request::segment(2) == 'threads' || Request::segment(2) == 'parent-training-calls')
                        <a class="c-sidebar__link is-active" href="/employee/threads">
                        @else
                        <a class="c-sidebar__link" href="/employee/threads">
                        @endif
                            <i class="x-trainings"></i> <span>Parent Training</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        @if(Request::segment(2) == 'messages')
                        <a class="c-sidebar__link is-active" href="/employee/messages">
                        @else
                        <a class="c-sidebar__link" href="/employee/messages">
                        @endif
                            <i class="x-messages"></i> <span>Messages</span>
                        </a>
                    </li>
                </ul>
            </div><!-- // .c-sidebar -->
        </div><!-- // .o-page__sidebar -->
        @show

		<main class="o-page__content">
			<header class="c-navbar u-mb-medium">
                <button class="c-sidebar-toggle u-mr-small">
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                </button><!-- // .c-sidebar-toggle -->
                <h2 class="c-navbar__title u-mr-auto">Employee Dashboard</h2>
                <div class="c-dropdown u-hidden-down@mobile">
                    <a class="c-notification dropdown-toggle" href="#" id="dropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="c-notification__icon">
                            <i class="x-alarm"></i>
                        </span>
                        <span class="c-notification__number bg_fc5e5e">1</span>
                    </a>
                    <div class="c-dropdown__menu c-dropdown__menu--large dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuUser">
                        <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="{{ URL::asset('img/avatar1.jpg') }}" alt="User's Profile Picture">
                                </span>
                            </span>
                            <div class="o-media__body">
                                <h6 class="u-mb-zero">Someone mentioned you</h6>
                                <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                            </div>
                        </a>
                        <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="{{ URL::asset('img/avatar1.jpg') }}" alt="User's Profile Picture">
                                </span>
                            </span>
                            <div class="o-media__body">
                                <h6 class="u-mb-zero">Recieved a Payment</h6>
                                <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                            </div>
                        </a>
                        <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="{{ URL::asset('img/avatar1.jpg') }}" alt="User's Profile Picture">
                                </span>
                            </span>
                            <div class="o-media__body">
                                <h6 class="u-mb-zero">You got a promotion</h6>
                                <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="c-dropdown dropdown emailIco u-hidden-down@mobile">
                    <a class="c-notification dropdown-toggle" href="#" id="dropdownMenuAlerts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="c-notification__icon">
                            <i class="x-envelope"></i>
                        </span>
                        <span class="c-notification__number bg_58de9b">4</span>
                    </a>
                    <div class="c-dropdown__menu c-dropdown__menu--large dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAlerts">
                        <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <span class="c-avatar__img u-bg-success u-flex u-justify-center u-align-items-center">
                                        <i class="fa fa-check u-text-large u-color-white"></i>
                                    </span>
                                </span>
                            </span>
                            <div class="o-media__body">
                                <h6 class="u-mb-zero">Completed a task</h6>
                                <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                            </div>
                        </a>
                        <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <span class="c-avatar__img u-bg-fancy u-flex u-justify-center u-align-items-center">
                                        <i class="fa fa-calendar u-text-large u-color-white"></i>
                                    </span>
                                </span>
                            </span>
                            <div class="o-media__body">
                                <h6 class="u-mb-zero">Company meetup</h6>
                                <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                            </div>
                        </a>
                        <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <span class="c-avatar__img u-bg-primary u-flex u-justify-center u-align-items-center">
                                        <i class="fa fa-info u-text-large u-color-white"></i>
                                    </span>
                                </span>
                            </span>
                            <div class="o-media__body">
                                <h6 class="u-mb-zero">Someone mentioned you</h6>
                                <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="c-dropdown dropdown">
                    <a class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="c-avatar__img" src="{{ URL::asset('img/avatar.jpg') }}" alt="User's Profile Picture">
                    </a>
                    <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                        <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
                        <a class="c-dropdown__item dropdown-item" href="#">View Activity</a>
                        <a class="c-dropdown__item dropdown-item" href="#">Manage Roles</a>
						<a class="c-dropdown__item dropdown-item" href="{{ url('/employee/logout') }}"
							onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
							Logout
						</a>

						<form id="logout-form" action="{{ url('/employee/logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
                    </div>
                </div>
            </header>
			<div class="container-fluid">
				@yield('content')
			</div>
		</main>
		@yield('footer')
		
		
		<!-- Javascript Resource -->
		<script src="{{ URL::asset('js/main.min.js') }}"></script>
		<script src="{{ URL::asset('js/functions.js') }}"></script>

		@yield('customjs')
    </body>
</html>