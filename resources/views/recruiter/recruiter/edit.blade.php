@extends('layouts.recruiter.app')

@section('title', 'Editar categorias')

@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-shield"></i>  Alterar um recrutador</h3>
        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">


                <div class="dashboard-box margin-top-0">

                    <form action="{{ route('recruiter.update', $recruiter->id) }}" data-redirect="true" method="post" class="form">
                        @csrf
                        @method('PUT')
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="submit-field">
                                        <h5>Nome</h5>
                                        <input type="text" name="name" value="{{ $recruiter->name }}" required class="input-text with-border" placeholder="Título">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Cargo</h5>
                                        <select class="select with-border" name="positions_id" >
                                            <option>SELECIONE</option>
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}" {{  $recruiter->id == $position->id ? "selected" : "" }}> {{ $position->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="submit-field">
                                        <h5>E-mail</h5>
                                        <input type="email" name="email" value="{{ $recruiter->email }}"  required class="input-text with-border" placeholder="E-mail">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Telefone</h5>
                                        <input type="text" name="phone" value="{{ $recruiter->phone }}"  class="input-text with-border" placeholder="Telefone">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Senha</h5>
                                        <input type="password" name="password"  required class="input-text with-border" placeholder="Senha">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Status</h5>
                                        <select class="select with-border" name='active' data-size="7" title="Selecione">
                                            <option value="1" {{ $recruiter->active == 1 ? 'selected' : '' }} >Ativado</option>
                                            <option value="2" {{ $recruiter->active == 2 ? 'selected' : '' }} >Desativado</option>
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