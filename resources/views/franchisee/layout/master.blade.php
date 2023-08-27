<html>
    <head>
		<meta name="_token" content="{{csrf_token()}}" />
	
        <title>@yield('title')</title>
		<meta name="description" content="Dashboard UI Kit">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Favicon -->
        <link rel="apple-touch-icon" href="{{ URL::asset('apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
		
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
                        <a class="c-sidebar__link" href="/client/client-preauthorization">
                            <i class="x-client-prea"></i> <span>Client Preauthorization</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/client/insurance">
                            <i class="x-insurance"></i> <span>Insurance</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link is-active" href="/client/parent-dashboard">
                            <i class="x-multi-users"></i> <span>Demographic</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/client/documents">
                            <i class="x-document"></i> <span>Documents</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/client/reports">
                            <i class="x-report"></i> <span>Reports</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/client/schedule">
                            <i class="x-schedule"></i> <span>Schedule</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/client/trainings">
                            <i class="x-trainings"></i> <span>Trainings</span>
                        </a>
                    </li>
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="/client/messages">
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
                <h2 class="c-navbar__title u-mr-auto">Parents Dashboard</h2>
                <div class="c-dropdown u-hidden-down@mobile">
                    <a class="c-notification dropdown-toggle" href="#" id="dropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="c-notification__icon">
                            <i class="fa fa-bell"></i>
                        </span>
                        <span class="c-notification__number bg_fc5e5e">1</span>
                    </a>
                    <div class="c-dropdown__menu c-dropdown__menu--large dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuUser">
                        <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="{{ URL::asset('img/avatar2-72.jpg') }}" alt="User's Profile Picture">
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
                                    <img class="c-avatar__img" src="{{ URL::asset('img/avatar3-72.jpg') }}" alt="User's Profile Picture">
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
                                    <img class="c-avatar__img" src="{{ URL::asset('img/avatar4-72.jpg') }}" alt="User's Profile Picture">
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
                            <i class="fa fa-envelope"></i>
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
						<a class="c-dropdown__item dropdown-item" href="{{ url('/franchisee/logout') }}"
							onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
							Logout
						</a>

						<form id="logout-form" action="{{ url('/franchisee/logout') }}" method="POST" style="display: none;">
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