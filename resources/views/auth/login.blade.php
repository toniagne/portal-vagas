@extends('layouts.candidate.app')

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

                    <h2>Área do candidato</h2>

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
                        <h3>Estamos felizes em vê-lo novamente!</h3>
                        <span>Não possui uma conta? <a href="{{ route('register') }}">Registrar-se</a></span>
                    </div>

                    <!-- Form -->
                    @isset($url)
                        <form method="POST" action="{{ route($url) }}">
                    @else
                        <form method="POST" action="{{ route('login') }}">
                    @endisset
                        @csrf
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

                        <!-- Button -->
                        @if (Route::has('password.request'))
                            <a class="forgot-password" href="{{ route('password.request') }}">
                                Esqueceu a senha ?
                            </a>
                        @endif

                        <button type="submit" class="button full-width button-sliding-icon ripple-effect margin-top-10">
                             ACESSSAR <i class="icon-material-outline-arrow-right-alt"></i>
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
