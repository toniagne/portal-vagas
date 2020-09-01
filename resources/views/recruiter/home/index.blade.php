@extends('layouts.recruiter.app')
@section('content')

    <div class="dashboard-content-inner" >

        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
            <h3>Olá, {{ Auth::user()->name }}!</h3>
            <span>Você tem 16 novas candidaturas nos processos seletivos em andamento</span>


        </div>


        <!-- Fun Facts Container -->
        <div class="fun-facts-container">
            <div class="fun-fact" data-fun-fact-color="#000000">
                <div class="fun-fact-text">
                    <span>Vagas abertas</span>
                    <h4>{{ $jobsOpenlyCount }}</h4>
                </div>
                <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
            </div>
            <div class="fun-fact" data-fun-fact-color="#000000">
                <div class="fun-fact-text">
                    <span>Vagas concluídas</span>
                    <h4>4</h4>
                </div>
                <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
            </div>


            <!-- Last one has to be hidden below 1600px, sorry :( -->
            <div class="fun-fact" data-fun-fact-color="#000000">
                <div class="fun-fact-text">
                    <span>Candidatos ativos</span>
                    <h4>987</h4>
                </div>
                <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
            </div>

            <!-- Last one has to be hidden below 1600px, sorry :( -->
            <div class="fun-fact" data-fun-fact-color="#000000">
                <div class="fun-fact-text">
                    <span>Testes ativos</span>
                    <h4>987</h4>
                </div>
                <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
            </div>
        </div>






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