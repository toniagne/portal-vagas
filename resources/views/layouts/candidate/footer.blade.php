<div id="footer">
    <!-- Footer Top Section -->
    <div class="footer-top-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Footer Rows Container -->
                    <div class="footer-rows-container">
                        <!-- Left Side -->
                        <div class="footer-rows-left">
                            <div class="footer-row">
                                <div class="footer-row-inner footer-logo">
                                   {!! img('header.png') !!}
                                </div>
                            </div>
                        </div>

                        <!-- Right Side -->
                        <div class="footer-rows-right">

                            <!-- Social Icons -->
                            <div class="footer-row">
                                <div class="footer-row-inner">
                                    <ul class="footer-social-links">
                                        <li>
                                            <a href="https://www.facebook.com/inovedados" target="_blank" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
                                                <i class="icon-brand-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/company/inovedados/" target="_blank" title="Linkedin" data-tippy-placement="bottom" data-tippy-theme="light">
                                                <i class="icon-brand-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send?phone=553140422999&text=Quero%20saber%20mais%20sobre%20seu%20trabalho" title="Whatsapp" target="_blank" data-tippy-placement="bottom" data-tippy-theme="light">
                                                <i class="icon-brand-whatsapp"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a title="Skype" href="skype:inovedados?chat?text=Oi" data-tippy-placement="bottom" data-tippy-theme="light">
                                                <i class="icon-brand-skype"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <!-- Language Switcher -->
                            <div class="footer-row">
                                <div class="footer-row-inner">

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Footer Rows Container / End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top Section / End -->

    <!-- Footer Middle Section -->
    <div class="footer-middle-section">
        <div class="container">
            <div class="row">

                <!-- Links -->
                <div class="  col-md-2">
                    <div class="footer-links">
                        <h3>Profissional</h3>
                        <ul>
                            <li><a href="#"><span>Carreiras</span></a></li>
                            <li><a href="#"><span>Últimas vagas</span></a></li>
                        </ul>
                    </div>
                </div>


                <!-- Links -->
                <div class="  col-md-3">
                    <div class="footer-links">
                        <h3>Empresa</h3>
                        <ul>
                            <li><a href="#"><span>Site</span></a></li>
                            <li><a href="#"><span>Contato</span></a></li>
                            <li><a href="#"><span>Sobre</span></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Links -->
                <div class=" col-md-3">
                    <div class="footer-links">
                        <h3>Links Úteis</h3>
                        <ul>
                            <li><a href="#"><span>Política de privacidade</span></a></li>
                            <li><a href="#"><span>Termos de uso</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Middle Section / End -->

    <!-- Footer Copyrights -->
    <div class="footer-bottom-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    © {{ date('Y') }} | <strong>Inove Dados</strong> &copy; Todos os direitos reservados.
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->

<!-- Scripts
================================================== -->

<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

    <!--Tabs -->
    <div class="sign-in-form">

        <ul class="popup-tabs-nav">
            <li><a href="#login">Entrar</a></li>
            <li><a href="#register">Registrar-se</a></li>
        </ul>

        <div class="popup-tabs-container">

            <!-- Login -->
            <div class="popup-tab-content" id="login">

                <!-- Welcome Text -->
                <div class="welcome-text">
                    <span>Não possui uma conta? <a href="#" class="register-tab">Registre-se!</a></span>
                </div>

                <!-- Form -->
                <form class="form" method="post" action="{{ route('login') }}" id="login-form">
                    @csrf
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="email" class="input-text with-border" name="email" id="email" placeholder="Endereço de e-mail" required/>
                    </div>

                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="password" id="password" placeholder="senha" required/>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Esqueceu a senha?</a>
                </form>

                <!-- Button -->
                <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="login-form">Acessar <i class="icon-material-outline-arrow-right-alt"></i></button>

                <!-- Social Login -->
                <div class="social-login-separator"><span>ou</span></div>
                <div class="social-login-buttons">
                    <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Acessar via Facebook</button>
                    <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Acessar via Google+</button>
                </div>

            </div>

            <!-- Register -->
            <div class="popup-tab-content" id="register">

                <!-- Form -->
                <form action="{{ route('register') }}" class="form" id="register-account-form">

                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-account-circle"></i>
                        <input type="text" class="input-text with-border" name="name" id="name" placeholder="Nome Completo" required/>
                    </div>

                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="text" class="input-text with-border" name="email" id="email" placeholder="Email Address" required/>
                    </div>

                    <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
                    </div>

                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="password_confirmation" id="confirmation-password" placeholder="Repeat Password" required/>
                    </div>

                    <div class="text-center">
                        <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.key') }}"></div>
                    </div>
                </form>

                <div class="font-size-13">
                    <span>Ao se registrar voce aceita <a href="{{ asset('/pdfs/termos-de-uso.pdf') }}" style="color: red;" target="_blank">nossos termos de uso.</a></span>
                </div>

                <!-- Button -->
                <button class="margin-top-10 button full-width button-sliding-icon ripple-effect" type="submit" form="register-account-form">Register <i class="icon-material-outline-arrow-right-alt"></i></button>

                <!-- Social Login -->
                <div class="social-login-separator"><span>or</span></div>
                <div class="social-login-buttons">
                    <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Register via Facebook</button>
                    <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Register via Google+</button>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Sign In Popup / End -->

<script src="{{ asset("js/app.js")}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@stack('scripts')
</body>
</html>
