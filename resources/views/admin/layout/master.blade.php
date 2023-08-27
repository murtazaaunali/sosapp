<html>

<head>
    <meta name="_token" content="{{csrf_token()}}" />

    <title>@yield('title')</title>
    <meta name="description" content="Dashboard UI Kit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ URL::asset('apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">

    <!-- Style Sheet -->

    <link rel="stylesheet" href="{{ URL::asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}?v= {{ time() }}">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!--[if lt IE 9]>
            <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>
            <script src="{{ URL::asset('js/respond.min.js') }}"></script>
        <![endif]-->
</head>

<body class="o-page customcss">
    @php
    $CurrentUser = Auth::user();
    $picture_url = Storage::url($CurrentUser->picture);
    @endphp
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    @include('admin.blocks.sidebar');
    <main class="o-page__content">
        <header class="c-navbar u-mb-medium">
            <button class="c-sidebar-toggle u-mr-small">
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                </button>
            <!-- // .c-sidebar-toggle -->
            <h2 class="c-navbar__title u-mr-auto">{{ $page_title ?? '' }}</h2>
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
                                    <img class="c-avatar__img" src="../img/avatar1.jpg" alt="User's Profile Picture">
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
                                    <img class="c-avatar__img" src="../img/avatar1.jpg" alt="User's Profile Picture">
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
                                    <img class="c-avatar__img" src="../img/avatar1.jpg" alt="User's Profile Picture">
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

                <a class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{$CurrentUser->name}}
                        <img class="c-avatar__img" src="{{ url($picture_url) }}" alt="{{$CurrentUser->name}}">
                    </a>
                <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                    <a class="c-dropdown__item dropdown-item" href="{{ url('/admin/profile') }}">Edit Profile</a>
                    <a class="c-dropdown__item dropdown-item" href="{{ url('/admin/profile') }}">View Activity</a>
                    <a class="c-dropdown__item dropdown-item" href="{{ url('/admin/profile') }}">Manage Roles</a>
                    <a class="c-dropdown__item dropdown-item" href="{{ url('/admin/logout') }}" onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
							Logout
						</a>

                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
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
</body>

</html>