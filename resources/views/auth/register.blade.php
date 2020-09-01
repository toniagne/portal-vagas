@extends('candidate.home.index')

@section('content')

    <!-- Spacer -->
    <div class="margin-top-70"></div>
    <!-- Spacer / End-->

    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <!-- Titlebar
    ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Área do candidato / Registrar-se</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{ route('home') }}">Início</a></li>
                            <li>Área do candidato</li>
                            <li>Registrar-se</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">


                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Cadastrar-se como candidato!</h3>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input id="name" type="text" class="form-control @error('name') text-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Seu nome"  autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input id="phone" type="text" class="form-control @error('phone') text-danger @enderror" name="name" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Telefone"  autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input id="email" type="text" class="form-control @error('email') text-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Seu e-mail"  autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Senha"  required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirmar senha"  required autocomplete="new-password">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <button type="submit" class="button full-width button-sliding-icon ripple-effect margin-top-10">
                            CADASTRAR-SE <i class="icon-material-outline-arrow-right-alt"></i>
                        </button>


                    </form>
                    <!-- Social Login -->
                    <div class="social-login-separator"><span>ou</span></div>
                    <div class="social-login-buttons">
                        <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
                        <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Spacer -->
    <div class="margin-top-70"></div>
    <!-- Spacer / End-->

    <div class="clearfix"></div>
    <!-- Header Container / End -->



@endsection
