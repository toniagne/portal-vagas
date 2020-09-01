@extends('layouts.recruiter.app')
@section('title', 'Visualização da vaga')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-briefcase"></i> Visualização da vaga</h3>

            <nav id="breadcrumbs" >

                <a class="button gray ripple-effect ripple-effect action-confirm"
                   title="{{ $job->published == 0 ? "Publicar" : "Ocultar"}} a vaga"
                   data-tippy-placement="top"
                   data-row="{{ $job->id }}"
                   data-route="{{ route('jobs.publish', $job->id) }}"
                   data-message="Deseja {{ $job->published == 0 ? "publicar" : "ocultar"}}  essa vaga ?" >
                    <i class="icon-feather-rotate-ccw"></i> {{ $job->published == 0 ? "Publicar a vaga" : "Ocultar a vaga"}}

                </a>

                <a class="button gray ripple-effect ripple-effect action-confirm"
                   title="{{ $job->finished == 0 ? "concluir" : "restaurar"}} a vaga"
                   data-tippy-placement="top"
                   data-row="{{ $job->id }}"
                   data-route="{{ route('jobs.finished', $job->id) }}"
                   data-message="Deseja {{ $job->finished == 0 ? "Concluir" : "Restaurar"}} essa vaga ?" >
                    <i class="icon-feather-eye-off"></i> {{ $job->finished == 0 ? "Concluir a vaga" : "Restaurar a vaga"}}

                </a>


            </nav>
        </div>




        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">

                <div class="dashboard-box margin-top-0">

                    <div class="tabs">
                        <div class="tabs-header">
                            <ul>
                                <li class="active"><a href="#tab-1" data-tab-id="1">Detalhes da vaga</a></li>
                                <li><a href="#tab-2" data-tab-id="2">Candidatos interessados</a></li>
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
                                <div class="content ">
                                    <div class="row">
                                         <div class="col-md-12">


                                            <div class="notification {{ $job->published == 0 ? "error" : "success"}} closeable">
                                                <p>{{ $job->published == 0 ? "Esta vaga não esta sendo exibida, você precisa publicá-la." : "Esta vaga esta publicada desde o dia ". $job->updated_at->format('d/m/Y H:s') }}   .</p>
                                            </div>

                                             @if($job->finished ==1)
                                                 <div class="notification warning closeable">
                                                     <p><span class="icon-feather-alert-circle"> </span> Esta vaga esta concluída.</p>
                                                 </div>
                                             @endif

                                            <div class="submit-field">
                                                <h5>Título</h5>
                                                {{ $job->title }}
                                            </div>

                                            <div class="submit-field">
                                                <h5>Pefil do candidato</h5>
                                                {{ $job->category->name }}
                                            </div>

                                            <div class="submit-field">
                                                <h5>Nível de experiência</h5>
                                                {{ $job->specialization->name }}
                                            </div>

                                            <div class="submit-field">
                                                <h5>Proeficiência</h5>
                                                {{ $job->proficiency->level }}
                                            </div>


                                            <div class="submit-field">
                                                <h5>Habilidades   <i class="help-icon" data-tippy-placement="right" title="Máximo 10 habilidades"></i></h5>



                                                @foreach ($job->getSkills()->get() as $skills)
                                                    {{ $skills->skill->name }}
                                                @endforeach

                                            </div>



                                            <div class="submit-field">
                                                <h5>Atividades primárias</h5>
                                                {{ $job->primary_activities }}

                                            </div>

                                            <div class="submit-field">
                                                <h5>Requisitos obrigatórios</h5>
                                                {{ $job->mandatory_requirements }}

                                            </div>

                                            <div class="submit-field">
                                                <h5>Conhecimentos diferenciais <span>(optional)</span> </h5>
                                                {{ $job->differential_knowledges }}

                                            </div>

                                            <div class="submit-field">
                                                <h5>Regime de contratação</h5>
                                                {{ $job->regime->name }}
                                            </div>

                                            <div class="submit-field">
                                                <h5>Pretenção salarial</h5>
                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="input-with-icon">
                                                            @convertMoney($job->wage_start )
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-with-icon">
                                                            @convertMoney($job->wage_end)
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="feedback-yes-no margin-top-0">
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="two-step" value="1" name="wage_negociation">
                                                        <label for="two-step"><span class="checkbox-icon"></span> Salário à negociar</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="submit-field">
                                                <h5>Benefícios   <i class="help-icon" data-tippy-placement="right" title="Máximo 10 habilidades"></i></h5>

                                                @foreach ($job->getBenefits()->get() as $benefits)
                                                    {{ $benefits->benefits->name }}
                                                @endforeach
                                            </div>





                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="tab" data-tab-id="2">

                                        <table class="table table-hover dt-responsive nowrap datatable" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Nome</th>
                                                <th>E-mail</th>
                                                <th>Telefone</th>
                                                <th>Situação</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach ($job->applications as $interested)
                                                <tr>
                                                    <td>{{ $interested->created_at->format('d/m/Y H:s') }}</td>
                                                    <td><i class="{{ $interested->favorite == 1 ? "icon-material-baseline-star-border" : ""  }}"></i> {{  $interested->candidate->name  }}</td>
                                                    <td>{{  $interested->candidate->email  }}</td>
                                                    <td>{{  $interested->candidate->phone  }}</td>
                                                    <td> NOVO </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <a class="button gray ripple-effect ico action-confirm"
                                                                   title="{{ $interested->favorite == 1 ? "Desfavoritar" : "Favoritar" }}"
                                                                   data-tippy-placement="top"
                                                                   data-row="{{ $interested->id }}"
                                                                   data-route="{{ route('jobs.favorite', $interested->id) }}"
                                                                   data-message="Deseja {{ $interested->favorite == 1 ? "desfavoritar" : "Favoritar" }} esse candidato para essa vaga ?" >
                                                                    <i class="icon-feather-star"></i>
                                                                </a>

                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a class="button gray ripple-effect ico action-confirm"
                                                                   title="{{ $interested->rejected == 1 ? "Aceitar" : "Rejeitar" }}"
                                                                   data-tippy-placement="top"
                                                                   data-row="{{ $interested->id }}"
                                                                   data-route="{{ route('jobs.reject', $interested->id) }}"
                                                                   data-message="Deseja {{ $interested->rejected == 1 ? "aceitar" : "rejeitar" }} esse candidato para essa vaga ?" >
                                                                    <i class="icon-feather-thumbs-{{ $interested->rejected == 1 ? "up" : "down" }}"></i>
                                                                </a>


                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                    <!-- Tabs Container / End -->
                </div>




                </div>
            </div>


            </form>
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