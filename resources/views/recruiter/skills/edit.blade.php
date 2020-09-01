@extends('layouts.recruiter.app')
@section('title', 'Editar Habilidades')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-award"></i>  Habilidades</h3>
        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">

                <div class="dashboard-box margin-top-0">

                    <form action="{{ route('skill.update', $skills->id) }}" data-redirect="true" method="post" class="form">
                        @csrf
                        @method('PUT')
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="submit-field">
                                        <h5>Nome</h5>
                                        <input type="text" name="name"  value="{{ $skills->name }}" class="with-border" placeholder="Título da habilidade">
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