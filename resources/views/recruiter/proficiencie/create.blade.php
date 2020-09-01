@extends('layouts.recruiter.app')
@section('title', 'Manutenção de categorias')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-anchor"></i> Adicionar proeficiencia</h3>
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


                    <form action="{{ route('proficiencie.store') }}" data-redirect="true" method="post" class="form">
                @csrf
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="submit-field">
                                    <h5>Nome</h5>
                                    <input type="text" name="level" class="input-text with-border" placeholder="Nível">
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