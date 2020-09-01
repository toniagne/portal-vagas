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

                <h2>Área do candidato / Redefinir Senha</h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-5 offset-xl-3">

            <div class="recovery-password">
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <span>Não possui uma conta? <a href="{{ route('register') }}">Registrar-se</a></span>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif

            <!-- Form -->
                <form method="POST" class="form" action="{{ route('password.update') }}">
                    <input type="hidden" value="{{ $token }}" name="token">
                    @csrf
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input id="email" type="text" class="form-control @error('email') text-danger @enderror" name="email" value="{{ $email }}" required placeholder="E-mail"  autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-https"></i>
                        <input id="password" type="password" class="form-control @error('password') text-danger @enderror" name="password" required placeholder="Senha"  autofocus>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-https"></i>
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') text-danger @enderror" name="password_confirmation" required placeholder="Confirmação de Senha"  autofocus>

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.key') }}"></div>
                    </div>


                    <button type="submit" class="button full-width button-sliding-icon ripple-effect margin-top-10">
                        Redefinir Senha <i class="icon-material-outline-arrow-right-alt"></i>
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
