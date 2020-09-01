@include('layouts.recruiter.header')

<body class="gray">

<div id="wrapper">

    <!-- Header Container
    ================================================== -->
    <header id="header-container" class="fullwidth dashboard-header not-sticky">

        <!-- Header -->
        <div id="header">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{ route('candidate.dash') }}">
                            {!! img('logo.png', ['alt'=>'contratações']) !!}
                        </a>
                    </div>

                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->


                <!-- Right Side Content / End -->
                <div class="right-side">

                    <!--  User Notifications -->
                    <div class="header-widget hide-on-mobile">

                        <!-- Notifications -->
                        <div class="header-notifications">

                            <!-- Trigger -->
                            <div class="header-notifications-trigger">
                                <a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown">

                                <div class="header-notifications-headline">
                                    <h4>Notificações</h4>
                                    <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                                        <i class="icon-feather-check-square"></i>
                                    </button>
                                </div>

                                <div class="header-notifications-content">
                                    <div class="header-notifications-scroll" data-simplebar>
                                        <ul>
                                            <!-- Notification -->
                                            <li class="notifications-not-read">
                                                <a href="dashboard-manage-candidates.html">
                                                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                                    <span class="notification-text">
													<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
												</span>
                                                </a>
                                            </li>

                                            <!-- Notification -->
                                            <li>
                                                <a href="dashboard-manage-bidders.html">
                                                    <span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
                                                    <span class="notification-text">
													<strong>Gilbert Allanis</strong> placed a bid on your <span class="color">iOS App Development</span> project
												</span>
                                                </a>
                                            </li>

                                            <!-- Notification -->
                                            <li>
                                                <a href="dashboard-manage-jobs.html">
                                                    <span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>
                                                    <span class="notification-text">
													Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.
												</span>
                                                </a>
                                            </li>

                                            <!-- Notification -->
                                            <li>
                                                <a href="dashboard-manage-candidates.html">
                                                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                                    <span class="notification-text">
													<strong>Sindy Forrest</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
												</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!--  User Notifications / End -->

                    <!-- User Menu -->
                    <div class="header-widget">

                        <!-- Messages -->
                        <div class="header-notifications user-menu">
                            <div class="header-notifications-trigger">
                                <a href="#"><div class="user-avatar">{!! img('logo_lite.png')  !!} </div></a>
                            </div>

                            <!-- Dropdown -->
                            <div class="header-notifications-dropdown">

                                <ul class="user-menu-small-nav">
                                    <li><a href="{{ route('admin.settings') }}"><i class="icon-material-outline-settings"></i> Configurações</a></li>
                                    <li><form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="button full-width button-sliding-icon ripple-effect margin-top-10">
                                                SAIR <i class="icon-material-outline-input"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                    <!-- User Menu / End -->

                    <!-- Mobile Navigation Button -->
                    <span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <!-- Dashboard Container -->
    <div class="dashboard-container">

        <!-- Dashboard Sidebar
        ================================================== -->
        <div class="dashboard-sidebar" >
            @include('layouts.recruiter.menus')
        </div>
        <!-- Dashboard Sidebar / End -->


        <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            @yield('content')
        </div>
        <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->

</div>


@include('layouts.recruiter.footer')