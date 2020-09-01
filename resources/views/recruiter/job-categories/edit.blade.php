@extends('layouts.recruiter.app')
@section('title', 'Editar categorias')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-folder"></i> Editar uma categoria</h3>
        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Atenção!</strong> Verifique os erros abaixo.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="dashboard-box margin-top-0">

                    <form action="{{ route('job-categories.update', $jobCategory->id) }}" data-redirect="true" method="post" class="form">
                        @csrf
                        @method('PUT')
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="submit-field">
                                        <h5>Nome</h5>
                                        <input type="text" name="name"  value="{{ $jobCategory->name }}" class="with-border" placeholder="Título da categoria">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Ícone</h5>
                                        <select class="select with-border" name="icon" data-selected-text-format="count > 1">
                                            <option {{ $jobCategory->icon == 'Assignment' ? 'selected' : '' }} data-icon="icon-material-outline-assignment">Assignment</option>
                                            <option {{ $jobCategory->icon == 'Alarm' ? 'selected' : '' }} data-icon="icon-material-outline-access-alarm">Alarm</option>
                                            <option {{ $jobCategory->icon == "Account" ? 'selected' : '' }} data-icon="icon-material-outline-account-circle">Account</option>
                                            <option {{ $jobCategory->icon == 'Cake' ? 'selected' : '' }} data-icon="icon-material-outline-cake">Cake</option>
                                            <option {{ $jobCategory->icon == 'dashboard' ? 'selected' : '' }} data-icon="icon-material-outline-dashboard">dashboard</option>
                                            <option {{ $jobCategory->icon == 'arrow-back' ? 'selected' : '' }} data-icon="icon-material-outline-arrow-back">arrow-back</option>
                                            <option {{ $jobCategory->icon == 'arrow-forward' ? 'selected' : '' }} data-icon="icon-material-outline-arrow-forward">arrow-forward</option>
                                            <option {{ $jobCategory->icon == 'gavel' ? 'selected' : '' }} data-icon="icon-material-outline-gavel">gavel</option>
                                            <option {{ $jobCategory->icon == 'mail outline' ? 'selected' : '' }} data-icon="icon-material-baseline-mail-outline">mail outline</option>
                                            <option {{ $jobCategory->icon == 'star-border' ? 'selected' : '' }} data-icon="icon-material-baseline-star-border">star-border</option>
                                            <option {{ $jobCategory->icon == 'ccount-balance-wallet' ? 'selected' : '' }} data-icon="icon-material-outline-account-balance-wallet">account-balance-wallet</option>
                                            <option {{ $jobCategory->icon == 'account-balance' ? 'selected' : '' }} data-icon="icon-material-outline-account-balance">account-balance"</option>
                                            <option {{ $jobCategory->icon == 'computer' ? 'selected' : '' }} data-icon="icon-material-outline-computer">computer</option>
                                            <option {{ $jobCategory->icon == 'extension' ? 'selected' : '' }} data-icon="icon-material-outline-extension">extension</option>
                                        </select>
                                         </div>

                                    <div class="submit-field">
                                        <h5>Status</h5>
                                        <select class="select with-border" name='active' data-size="7" title="Selecione">
                                            <option value="1" {{ $jobCategory->active == 1 ? 'selected' : '' }} >Ativado</option>
                                            <option value="2" {{ $jobCategory->active == 2 ? 'selected' : '' }} >Desativado</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="btn-block pull-right">
                                    <button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-save"></i> &nbsp; Salvar</button>
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