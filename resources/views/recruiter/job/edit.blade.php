@extends('layouts.recruiter.app')
@section('title', 'Editar vaga')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-briefcase"></i> Editar uma vaga</h3>
        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">

                <div class="dashboard-box margin-top-0">
                    <form action="{{ route('jobs.update', $job->id) }}" method="POST" class="form">
                        @csrf
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="submit-field">
                                        <h5>Título</h5>
                                        <input type="text" name="title" value="{{ $job->title }}" class="input-text with-border" placeholder="Título da vaga">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Pefil do candidato</h5>
                                        <select class="select with-border" name="job_category_id" >
                                            <option>SELECIONE</option>
                                            @foreach ($jobCategories as $jobCategory)
                                                <option value="{{ $jobCategory->id }}" {{ $job->job_category_id == $jobCategory->id ? "selected" : "" }}> {{ $jobCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="submit-field">
                                        <h5>Nível de experiência</h5>
                                        <select class="select with-border" name="specialization_id" >
                                            <option>SELECIONE</option>
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $specialization->id }}" {{ $job->specialization_id == $specialization->id ? "selected" : "" }}> {{ $specialization->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="submit-field">
                                        <h5>Proeficiência</h5>
                                        <select class="select with-border" name="proficiency_id" >
                                            <option>SELECIONE</option>
                                            @foreach ($proficiencies as $proficiency)
                                                <option value="{{ $proficiency->id }}" {{ $job->proficiency_id == $proficiency->id ? "selected" : "" }} > {{ $proficiency->level }}</option>
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
                                                        <option value="{{ $skill->id }}-{{ $skill->name }}"> {{ $skill->name }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
                                            </div>
                                            <div class="keywords-list">
                                                @foreach ($job->getSkills as $selectedSkill)
                                                    <span class='keyword keyword-skills'>
                                                        <span class='keyword-remove'></span>
                                                        <span class='keyword-text'>{{ $selectedSkill->skill->name }}</span>
                                                        <input id='skill-"+ words[0]+"' type='hidden' name='skills[]' value='{{ $selectedSkill->skill->id }}'>
                                                    </span>
                                                @endforeach

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>



                                    <div class="submit-field">
                                        <h5>Atividades primárias</h5>
                                        <input type="text" name="primary_activities" value="{{ $job->primary_activities }}" class="input-text with-border" placeholder="Descrição das atividades primárias relativas à vaga">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Requisitos obrigatórios</h5>
                                        <input type="text" name="mandatory_requirements" value="{{ $job->mandatory_requirements }}"  class="input-text with-border" placeholder="Descrição dos requisitos obrigatórios da vaga.">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Conhecimentos diferenciais <span>(opcional)</span> </h5>
                                        <input type="text" name="differential_knowledges" value="{{ $job->differential_knowledges }} class="input-text with-border" placeholder="Descrições dos conhecimentos diferenciais">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Regime de contratação</h5>
                                        <select class="select with-border" name="job_regime_id" >
                                            <option>SELECIONE</option>
                                            @foreach ($jobRegimes as $jobRegime)
                                                <option value="{{ $jobRegime->id }}" {{ $job->job_regime_id == $jobRegime->id ? "selected" : "" }} > {{ $jobRegime->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="submit-field">
                                        <h5>Pretenção salarial</h5>
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="input-with-icon">
                                                <input class="with-border mask-money" type="text" name="wage_start" value="{{ $job->wage_start }}" placeholder="Valor mínimo">
                                                    <i class="currency">R$</i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-with-icon">
                                                    <input class="with-border mask-money" type="text" name="wage_end" value="{{ $job->wage_end }}" placeholder="Valor máximo">
                                                    <i class="currency">R$</i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="feedback-yes-no margin-top-0">
                                            <div class="checkbox">
                                                <input type="checkbox" id="two-step" value="1" name="wage_negociation" {{ $job->wage_negociation == 1 ? "checked" : "" }}>
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
                                            <div class="keywords-list-benefits">
                                                @foreach ($job->getBenefits as $selectedBenefits)
                                                    <span class='keyword keyword-benefits'>
                                                        <span class='keyword-remove'></span>
                                                        <span class='keyword-text'>{{ $selectedBenefits->benefits->name }}</span>
                                                        <input id='skill-{{ $selectedBenefits->benefits->id }}' type='hidden' name='benefits[]' value='{{ $selectedBenefits->benefits->id }}'>
                                                    </span>
                                                @endforeach
                                            </div>
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