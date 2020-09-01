@extends('layouts.recruiter.app')
@section('title', 'Editar uma rede social')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-share-2"></i> Editar redes sociais</h3>
        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">

                <div class="dashboard-box margin-top-0">

                    <form action="{{ route('social.networks.update', $socialNetworks->id) }}" data-redirect="true" method="post" class="form">
                        @csrf
                        <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="submit-field">
                                        <h5>Nome</h5>
                                        <input type="text" name="name" value="{{ $socialNetworks->name }}" class="input-text with-border" placeholder="Nome">
                                    </div>

                                    <div class="submit-field">
                                        <h5>Ícone</h5>
                                        <select class="selectpicker select with-border" name="icon" data-selected-text-format="count > 1">
                                            <option value="icon-brand-facebook"     {{ $socialNetworks->icon == 'icon-brand-facebook' ? 'selected' : '' }}  data-icon="icon-brand-facebook">Facebook</option>
                                            <option value="icon-brand-flickr"       {{ $socialNetworks->icon == 'icon-brand-flickr' ? 'selected' : '' }}  data-icon="icon-brand-flickr">Flickr</option>
                                            <option value="icon-brand-firstdraft"   {{ $socialNetworks->icon == 'icon-brand-firstdraft' ? 'selected' : '' }}  data-icon="icon-brand-firstdraft">First Draft</option>
                                            <option value="icon-brand-github"       {{ $socialNetworks->icon == 'icon-brand-github' ? 'selected' : '' }}  data-icon="icon-brand-github">Github</option>
                                            <option value="icon-brand-google-plus"  {{ $socialNetworks->icon == 'icon-brand-google-plus' ? 'selected' : '' }}  data-icon="icon-brand-google-plus">Google</option>
                                            <option value="icon-brand-instagram"    {{ $socialNetworks->icon == 'icon-brand-instagram' ? 'selected' : '' }}  data-icon="icon-brand-instagram">Instagram</option>
                                            <option value="icon-brand-snapchat"     {{ $socialNetworks->icon == 'icon-brand-snapchat' ? 'selected' : '' }}  data-icon="icon-brand-snapchat">Snapchat</option>
                                            <option value="icon-brand-vimeo"        {{ $socialNetworks->icon == 'icon-brand-vimeo' ? 'selected' : '' }}  data-icon="icon-brand-vimeo">Vimeo</option>
                                            <option value="icon-brand-youtube"      {{ $socialNetworks->icon == 'icon-brand-youtube' ? 'selected' : '' }}  data-icon="icon-brand-youtube">Youtube</option>
                                            <option value="icon-brand-twitter"      {{ $socialNetworks->icon == 'icon-brand-twitter' ? 'selected' : '' }}  data-icon="icon-brand-twitter">Twitter</option>
                                            <option value="icon-brand-skype"        {{ $socialNetworks->icon == 'icon-brand-skype' ? 'selected' : '' }}  data-icon="icon-brand-skype">Skype</option>
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