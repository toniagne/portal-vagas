@include('layouts.candidate.header')
    <body>
    <div id="warpper">
        <!-- Header Container -->
        <header id="header-container" class="fullwidth">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{ route('home') }}">{!! img('logo.png') !!}</a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation">
                            <ul id="responsive">

                                <li><a href="{{ route('home') }}" class="{{ (request()->is('/')) ? 'current' : '' }}">Início</a> </li>

                                <li><a href="{{ route('home.careers') }}" class="{{ (request()->is('carreiras')) ? 'current' : '' }}">Carreiras</a> </li>

                                <li><a href="{{ route('home.jobs') }}" class="{{ (request()->is('vagas')) ? 'current' : '' }}">Vagas</a> </li>

                                <li><a href="{{ route('home.contact') }}" class="{{ (request()->is('contato')) ? 'current' : '' }}">Contato</a> </li>

                                <li><a href="{{ route('home.about') }}" class="{{ (request()->is('sobre')) ? 'current' : '' }}">Sobre</a> </li>

                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>
                    <!-- Left Side Content / End -->


                    <!-- Right Side Content / End -->
                    <div class="right-side">
                        @if($auth)
                            @include('layouts.candidate.auth-menu')
                        @else
                            @include('layouts.candidate.guest-menu')
                        @endauth

                    </div>
                    <!-- Right Side Content / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        @yield('content')


    </div>
    </body>
@include('layouts.candidate.footer')
