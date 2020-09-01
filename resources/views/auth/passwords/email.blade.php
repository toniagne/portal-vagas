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

                    <h2>Área do candidato / Recuperar senha</h2>
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
                        <h3>Esqueceu sua senha ?</h3>
                        <span>Não possui uma conta? <a href="{{ route('register') }}">Registrar-se</a></span>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Form -->
                    <form method="POST" class="form" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input id="email" type="text" class="form-control @error('email') text-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Seu e-mail"  autofocus>

                            <div class="text-center">
                                <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.key') }}"></div>
                            </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>


                        <button type="submit" class="button full-width button-sliding-icon ripple-effect margin-top-10">
                            RECUPERAR SENHA <i class="icon-material-outline-arrow-right-alt"></i>
                        </button>


                    </form>
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
