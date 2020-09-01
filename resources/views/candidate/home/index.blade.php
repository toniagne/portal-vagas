@extends('layouts.candidate.app')
@section('content')
    <!-- Intro Banner
================================================== -->
    <!-- add class "disable-gradient" to enable consistent background overlay -->
    <div class="intro-banner">
        <div class="container">

            <!-- Intro Headline -->
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-headline">
                        <h4>
                            <strong class="font">Buscamos pessoas inovadoras, apaixonadas por excelência e qualidade.</strong>
                            <br>

                            <span>  Faça parte da nossa equipe.</span>
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row">
                <div class="col-md-12">
                    <div class="intro-banner-search-form margin-top-95">

                        <!-- Search Field -->
                        <div class="intro-search-field with-autocomplete">
                            <label for="autocomplete-input" class="field-title ripple-effect">Onde?</label>
                            <div class="input-with-icon">
                                <input id="autocomplete-input" type="text" placeholder="Remoto">
                                <i class="icon-material-outline-location-on"></i>
                            </div>
                        </div>

                        <!-- Search Field -->
                        <div class="intro-search-field">
                            <label for ="intro-keywords" class="field-title ripple-effect">Em que área?</label>
                            <input id="intro-keywords" type="text" placeholder="Ex: Analista Desenvolvedor...">
                        </div>

                        <!-- Button -->
                        <div class="intro-search-button">
                            <button class="button ripple-effect">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li>
                            <strong class="counter">1,586</strong>
                            <span>Vagas Publicadas</span>
                        </li>
                        <li>
                            <strong class="counter">1,232</strong>
                            <span>Profissionais Cadastrados</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Icon Boxes -->
    <div class="section padding-top-65 padding-bottom-65">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <div class="section-headline centered margin-bottom-15">
                        <h3>Encontre sua carreira</h3>
                    </div>

                    <div class="categories-container">
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <a href="jobs-grid-layout-full-page.html" class="category-box">
                                    <div class="category-box-icon">
                                        <i class="{{ $category->icon }}"></i>
                                    </div>
                                    <div class="category-box-counter">{{ $category->jobs()->notFinished()->hasPublished()->count() }}</div>
                                    <div class="category-box-content">
                                        <h3>{{ $category->name }}</h3>
                                        <p>{{ $category->description }}</p>
                                    </div>
                                </a>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Icon Boxes / End -->

    <!-- Content
    ================================================== -->

    <!-- Features Jobs -->
    <div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Section Headline -->
                    <div class="section-headline margin-top-0 margin-bottom-35">
                        <h3>Últimas Vagas</h3>
                    </div>
                    <div class="listings-container compact-list-layout margin-top-35">
                        @foreach($jobs as $job)
                            <a class="job-listing with-apply-button">
                                <div class="job-listing-details">
                                    <div class="job-listing-company-logo">
                                        <img src="images/inverse.png" alt="">
                                    </div>
                                    <div class="job-listing-description">
                                        <h3 class="job-listing-title">{{ $job->title }}</h3>
                                        <div class="job-listing-footer">
                                            <ul>
                                                <li><i class="icon-material-outline-location-on"></i> Remoto</li>
                                                <li><i class="icon-material-outline-layers"></i> {{ $job->proficiency->level }}</li>
                                                <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                                                <li><i class="icon-material-outline-access-time"></i> {{ $job->days_go }} </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button href="{{ $auth ? route('jobs.apply',['job' => $job->id]) : '#sign-in-dialog' }}" class="{{ $auth ? ''  : 'popup-with-zoom-anim'}} job-apply list-apply-button ripple-effect bg-layout-red text-white">Candidatar-se</button>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Jobs / End -->
@push('scripts')

    <!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
    <script>
        // Snackbar for user status switcher
        $('#snackbar-user-status label').click(function() {
            Snackbar.show({
                text: 'Your status has been changed!',
                pos: 'bottom-center',
                showAction: false,
                actionText: "Dismiss",
                duration: 3000,
                textColor: '#fff',
                backgroundColor: '#383838'
            });
        });
    </script>


    <!-- Google Autocomplete -->
    <script>
        function initAutocomplete() {
            var options = {
                types: ['(cities)'],
                // componentRestrictions: {country: "us"}
            };

            var input = document.getElementById('autocomplete-input');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }

        // Autocomplete adjustment for homepage
        if ($('.intro-banner-search-form')[0]) {
            setTimeout(function(){
                $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
            }, 300);
        }

    </script>
@endpush
@endsection


