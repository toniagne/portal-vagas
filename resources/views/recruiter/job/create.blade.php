@extends('layouts.recruiter.app')
@section('title', 'Manutenção de categorias')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-briefcase"></i> Cadastrar uma nova vaga</h3>
        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">

                <div class="dashboard-box margin-top-0">
                    <form action="{{ route('jobs.store') }}" method="POST" class="form">
                @csrf
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="submit-field">
                                    <h5>Título</h5>
                                    <input type="text" name="title" class="input-text with-border" required placeholder="Título da vaga">
                                </div>

                                <div class="submit-field">
                                    <h5>Pefil do candidato</h5>
                                    <select class="select with-border" required name="job_category_id" >
                                        <option>SELECIONE</option>
                                        @foreach ($jobCategories as $jobCategory)
                                            <option value="{{ $jobCategory->id }}"> {{ $jobCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="submit-field">
                                    <h5>Nível de experiência</h5>
                                    <select class="select with-border" required name="specialization_id" >
                                        <option>SELECIONE</option>
                                        @foreach ($specializations as $specialization)
                                            <option value="{{ $specialization->id }}"> {{ $specialization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="submit-field">
                                    <h5>Proeficiência</h5>
                                    <select class="select with-border" required name="proficiency_id" >
                                        <option>SELECIONE</option>
                                        @foreach ($proficiencies as $proficiency)
                                            <option value="{{ $proficiency->id }}"> {{ $proficiency->level }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="submit-field">
                                    <h5>Habilidades   <i class="help-icon" data-tippy-placement="right" title="Máximo 10 habilidades"></i></h5>
                                    <div class="keywords-container">
                                        <div class="keyword-input-container">
                                            <select class="select keyword-input with-border"  >
                                                <option>SELECIONE</option>
                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}*{{ $skill->name }}"> {{ $skill->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
                                        </div>
                                        <div class="keywords-list"><!-- keywords go here --></div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>



                                <div class="submit-field">
                                    <h5>Atividades primárias</h5>
                                    <input type="text" name="primary_activities" class="input-text with-border" placeholder="Descrição das atividades primárias relativas à vaga" required>
                                </div>

                                <div class="submit-field">
                                    <h5>Requisitos obrigatórios</h5>
                                    <input type="text" name="mandatory_requirements" class="input-text with-border" placeholder="Descrição dos requisitos obrigatórios da vaga." required>
                                </div>

                                <div class="submit-field">
                                    <h5>Conhecimentos diferenciais <span>(optional)</span> </h5>
                                    <input type="text" name="differential_knowledges" class="input-text with-border" placeholder="Descrições dos conhecimentos diferenciais" required>
                                </div>

                                <div class="submit-field">
                                    <h5>Regime de contratação</h5>
                                    <select class="select with-border" name="job_regime_id" required>
                                        <option>SELECIONE</option>
                                        @foreach ($jobRegimes as $jobRegime)
                                            <option value="{{ $jobRegime->id }}"> {{ $jobRegime->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="submit-field">
                                    <h5>Pretenção salarial</h5>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="input-with-icon">
                                                <input class="with-border mask-money" type="text" name="wage_start" placeholder="Valor mínimo">
                                                <i class="currency">R$</i>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-with-icon">
                                                <input class="with-border mask-money" type="text" name="wage_end" placeholder="Valor máximo">
                                                <i class="currency">R$</i>
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
                                    <div class="keywords-container">
                                        <div class="keyword-input-container">

                                            <select class="select keyword-input-benefits with-border"  >
                                                <option>SELECIONE</option>
                                                @foreach ($benefits as $benefit)
                                                    <option value="{{ $benefit->id }}-{{ $benefit->name }}"> {{ $benefit->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="keyword-input-button-benefits ripple-effect"><i class="icon-material-outline-add"></i></button>
                                        </div>
                                        <div class="keywords-list-benefits"><!-- keywords go here --></div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>

                                <div class="btn-block pull-right">
                                   <button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-save"></i> &nbsp; Salvar</button>
                                </div>



                            </div>


                        </div>
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
