@extends('layouts.recruiter.app')
@section('title', 'Detalhes do recrutador')
@section('content')

    <div class="dashboard-content-inner" >


        <div class="dashboard-headline">
            <h3><i class="icon-feather-shield"></i>  Detalhes do recrutador</h3>

            <nav id="breadcrumbs" >
                <a class="button gray ripple-effect ripple-effect action-confirm"
                   title="Reenviar senha de acesso"
                   data-tippy-placement="top"
                   data-row="{{ $recruiter->id }}"
                   data-route="{{ route('recruiter.resend-password', $recruiter->id) }}"
                   data-message="Deseja reenviar uma nova senha ?" >
                    <i class="icon-feather-rotate-ccw"></i> Reenviar uma nova senha
                </a>

                <a class="button gray ripple-effect action-confirm"
                   title="{{ $recruiter->active == 1 ? 'Desativar' : 'Reativar' }}"
                   data-tippy-placement="top"
                   data-row="{{ $recruiter->id }}"
                   data-route="{{ route('recruiter.status', $recruiter->id) }}"
                   data-message="Deseja {{ $recruiter->active == 1 ? 'desativar' : 'reativar' }} esse recrutador ?" >
                    <i class="icon-feather-alert-triangle"></i>
                    {{ $recruiter->active == 1 ? 'Desativar' : 'Reativar' }} recrutador.
                </a>
            </nav>
        </div>



        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">


                <div class="dashboard-box margin-top-0">

                         <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="submit-field">
                                        <h5>Nome</h5>
                                        {{ $recruiter->name }}
                                    </div>

                                    <div class="submit-field">
                                        <h5>Cargo</h5>
                                        {{ $recruiter->position->name }}
                                    </div>

                                    <div class="submit-field">
                                        <h5>E-mail</h5>
                                        {{ $recruiter->email }}
                                    </div>

                                    <div class="submit-field">
                                        <h5>Telefone</h5>
                                        {{ $recruiter->phone }}
                                    </div>



                                    <div class="submit-field">
                                        <h5>Status</h5>
                                        {{ $recruiter->status() }}
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