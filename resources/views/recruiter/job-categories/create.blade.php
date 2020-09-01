@extends('layouts.recruiter.app')
@section('title', 'Manutenção de categorias')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="iicon-feather-folder"></i> Cadastrar uma nova categorias</h3>
        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">
                <div class="dashboard-box margin-top-0">


                    <form action="{{ route('job-categories.store') }}" data-redirect="true" method="post" class="form">
                @csrf
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="submit-field">
                                    <h5>Nome</h5>
                                    <input type="text" name="name" class="input-text with-border" placeholder="Título da categoria">
                                </div>

                                <div class="submit-field">
                                    <h5>Descrição</h5>
                                    <input type="text" name="description" class="input-text with-border" placeholder="Descrição da categoria">
                                </div>

                                <div class="submit-field">
                                    <h5>Ícone</h5>
                                    <select class="selectpicker select with-border" name="icon" data-selected-text-format="count > 1">
                                        <option data-icon="icon-material-outline-assignment">Assignment</option>
                                        <option data-icon="icon-material-outline-access-alarm">Alarm</option>
                                        <option data-icon="icon-material-outline-account-circle">Account</option>
                                        <option data-icon="icon-material-outline-cake">Cake</option>
                                        <option data-icon="icon-material-outline-dashboard">dashboard</option>
                                        <option data-icon="icon-material-outline-arrow-back">arrow-back</option>
                                        <option data-icon="icon-material-outline-arrow-forward">arrow-forward</option>
                                        <option data-icon="icon-material-outline-gavel">gavel</option>
                                        <option data-icon="icon-material-baseline-mail-outline">mail outline</option>
                                        <option data-icon="icon-material-baseline-star-border">star-border</option>
                                        <option data-icon="icon-material-outline-account-balance-wallet">account-balance-wallet</option>
                                        <option data-icon="icon-material-outline-account-balance">account-balance"</option>
                                        <option data-icon="icon-material-outline-computer">computer</option>
                                        <option data-icon="icon-material-outline-extension">extension</option>
                                    </select>
                                </div>

                                <div class="submit-field">
                                    <h5>Status</h5>
                                    <select class="select with-border" name='active' data-size="7" title="Selecione">
                                        <option value="1">Ativado</option>
                                        <option value="2">Desativado</option>
                                    </select>
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