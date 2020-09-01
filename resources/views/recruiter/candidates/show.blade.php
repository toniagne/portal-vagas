@extends('layouts.recruiter.app')
@section('title', 'Visualizar candidato')
@section('content')

    <div class="dashboard-content-inner" >

        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
            <h3>{{ $candidate->name }}</h3>
            <span class="margin-top-7">{{ $candidate->career->name }} </span>
        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">
                <div class="dashboard-box ">


                    <!-- Tabs Container -->
                    <div class="tabs">
                        <div class="tabs-header">
                            <ul>
                                <li class="active"><a href="#tab-1" data-tab-id="1">Dados Pessoais</a></li>
                                <li><a href="#tab-2" data-tab-id="2">Vagas de interesse </a> </li>
                            </ul>
                            <div class="tab-hover"></div>
                            <nav class="tabs-nav">
                                <span class="tab-prev"><i class="icon-material-outline-keyboard-arrow-left"></i></span>
                                <span class="tab-next"><i class="icon-material-outline-keyboard-arrow-right"></i></span>
                            </nav>
                        </div>
                        <!-- Tab Content -->
                        <div class="tabs-content">
                            <div class="tab active" data-tab-id="1">

                                <div class="content with-padding padding-bottom-10">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar-wrapper" >
                                                <img class="profile-pic" src="images/user-avatar-placeholder.png" alt="" />

                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="row">

                                                <div class="col-xl-6">
                                                    <div class="submit-field">
                                                        <h5>Nome</h5>
                                                        {{ $candidate->name }}
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="submit-field">
                                                        <h5>Carreira</h5>
                                                        {{ $candidate->career->name }}
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <!-- Account Type -->
                                                    <div class="submit-field">
                                                        <h5>Data de nascimento</h5>
                                                        {{ \Carbon\Carbon::parse($candidate->born_date)->format('d/m/Y')  }}
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="submit-field">
                                                        <h5>E-mail</h5>
                                                        {{ $candidate->email}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-headline border-top margin-top-40 padding-top-45 margin-bottom-25">
                                    </div>
                                    <!-- HABILIDADES / SITUAÇÃO / REGIME / PROEFICIÊNCIA / ESPECIALIZAÇÃO -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class=" col-md-4">
                                                    <div class="submit-field">
                                                        <h5><i class="icon-feather-award"></i> Habilidades</h5>
                                                            <ul class="list-3 color">
                                                                @foreach ($candidate->getSkills()->get() as $skill)
                                                                <li>{{ $skill->skill->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                    </div>
                                                </div>
                                                <div class=" col-md-4">
                                                    <div class="submit-field">
                                                        <h5><i class="icon-feather-clipboard"> </i>Situação</h5>
                                                        {{ $candidate->employedSituation() }}
                                                    </div>

                                                    <div class="submit-field">
                                                        <h5><i class="icon-feather-file-text"></i> Regime de contratação</h5>
                                                        {{ $candidate->jobRegime->name }}
                                                    </div>
                                                </div>
                                                <div class=" col-md-4">
                                                    <div class="submit-field">
                                                        <h5><i class="icon-feather-anchor"></i> Proeficiência</h5>
                                                        {{ $candidate->proficiency->level }}
                                                    </div>

                                                    <div class="submit-field">
                                                        <h5><i class="icon-feather-box"></i> Especialização</h5>
                                                        {{ $candidate->specialization->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab" data-tab-id="2">
                                <div class="container">

                                    <!-- Row -->
                                    <div class="row">

                                        <!-- Dashboard Box -->
                                        <div class="col-xl-12">
                                            <div class="dashboard-box margin-top-0">


                                                <div class="content">
                                                    <ul class="dashboard-box-list">
                                                       @forelse($candidate->applications()->get() as $job)

                                                        <li>
                                                            <!-- Job Listing -->
                                                            <div class="job-listing">

                                                                <!-- Job Listing Details -->
                                                                <div class="job-listing-details">

                                                                    <div class="job-listing-description">
                                                                        <h3 class="job-listing-title"><a href="#">{{ $job->job->title}}</a> <span class="dashboard-status-button {{ $job->job->finished == 0 ? "green" : "red" }}">{{ $job->job->finished() }} </span></h3>

                                                                        <!-- Job Listing Footer -->
                                                                        <div class="job-listing-footer">
                                                                            <ul>
                                                                                <li><i class="icon-material-outline-date-range"></i> Candidatou-se em: {{ $job->created_at->format('d/m/Y H:s') }}</li>
                                                                                <li><i class="icon-material-outline-date-range"></i> Publicada em: {{ $job->job->created_at->format('d/m/Y H:s') }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Buttons -->
                                                            <div class="buttons-to-right always-visible">
                                                                <a href="{{ route('jobs.show', $job->job->id) }}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Detalhes da vaga </a>
                                                            </div>
                                                        </li>

                                                        @empty
                                                           <li> <h4>AINDA NÃO SE CANDIDATOU À NENHUMA VAGA</h4></li>
                                                        @endforelse


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Row / End -->
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- Tabs Container / End -->

                </div>
            </div>
        </div>
            <!-- Row / End -->

        <!-- Footer -->
        <div class="dashboard-footer-spacer"></div>
        <div class="small-footer margin-top-15">
            <div class="small-footer-copyrights">
                © {{ date('Y') }} <strong>{{ config('app.name') }}</strong> todos os direitos reservados.
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- Footer / End -->

    </div>

@endsection