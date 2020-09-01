@extends('layouts.candidate.app')

@section('content')
    <!-- Spacer -->
    <div class="margin-top-70"></div>
    <!-- Spacer / End-->

    <div class="clearfix"></div>
    <!-- Header Container / End -->
    <div class="dashboard-content-inner">

        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
            <h3>Meu Perfil</h3>
        </div>
        <form action="{{ route('candidate.update') }}" class="form">
            @method('PUT')
            <div class="row">
                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-account-circle"></i> Meus Dados</h3>
                        </div>
                        <div class="content with-padding padding-bottom-0">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                        <img class="profile-pic" src="images/user-avatar-placeholder.png" alt="" />
                                        <div class="upload-button"></div>
                                        <input class="file-upload" type="file" accept="image/*"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Nome</h5>
                                                <input type="text" name="name" class="with-border" value="{{ $auth->name }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Email</h5>
                                                <input type="email" name="email" value="{{ $auth->email }}" class="with-border" value="Smith">
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Telefone</h5>
                                                <input type="text" name="phone" class="mask-phone with-border" value="{{ $auth->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Profissão</h5>
                                                <select name="career_id" class="with-border form-control">
                                                    <option selected value>Selecione uma profissão</option>
                                                    @foreach($careers as $career)
                                                        <option {{ $auth->career && $auth->career->id == $career->id ? 'selected' : '' }} value="{{ $career->id }}">{{ $career->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Foco da Carreira</h5>
                                                <select name="specialization_id" class="with-border form-control">
                                                    <option selected value>Selecione um foco de carreira</option>
                                                    @foreach($specializations as $specialization)
                                                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Deficiente</h5>
                                                <input type="hidden" name="deficient" value="0">
                                                <input type="radio" value="1" name="deficient" class="with-border">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-30">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-location-city"></i> Endereço</h3>
                        </div>

                        <div class="content with-padding padding-bottom-0">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Cidade</h5>
                                        <select name="city_id" class="with-border form-control">
                                            <option selected value>Selecione uma cidade</option>
                                            @foreach($cities as $city)
                                                <option {{ $auth->city && $auth->city->id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Endereço</h5>
                                        <input type="text" name="address_street" class="with-border" value="{{ $auth->address_street }}">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Número</h5>
                                        <input type="text" name="address_number" class="with-border" value="{{ $auth->address_number }}">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Bairro</h5>
                                        <input type="text" name="address_neighborhood" class="with-border" value="{{ $auth->address_neighborhood }}">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Complemento</h5>
                                        <input type="text" name="address_complement" class="with-border" value="{{ $auth->address_complement }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-face"></i> Dados Profissionais</h3>
                        </div>

                        <div class="content">
                            <ul class="fields-ul">
                                <li>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="submit-field">
                                                <div class="bidding-widget">
                                                    <span class="bidding-detail">Informe <strong>o valor minimo</strong> que deseja receber.</span>
                                                    <input class="mask-money margin-top-15" value="{{ $auth->salary->first() ? $auth->salary->first()->minimum : '' }}" type="text" name="salary[wage_start]" placeholder="Valor Minimo">
                                                </div>
                                                <div class="bidding-widget">
                                                    <span class="bidding-detail">Informe <strong>o valor máximo</strong> que deseja receber.</span>
                                                    <input class="mask-money margin-top-15" value="{{ $auth->salary->first() ? $auth->salary->first()->maximum : ''}}" type="text" name="salary[wage_end]" placeholder="Valor Máximo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="submit-field">
                                                <h5>Habilidades <i class="help-icon" data-tippy-placement="right" title="Máximo 10 habilidades"></i></h5>
                                                <div class="keywords-container">
                                                    <div class="keyword-input-container">
                                                        <select class="select keyword-input with-border">
                                                            <option value selected>Selecione a habilidade.</option>
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
                                                <h5>Nível de Inglês <i class="help-icon" data-tippy-placement="right" title="Selecione seu nível de inglês"></i></h5>
                                                <select name="english_proficiency" class="with-border">
                                                    <option value selected>Selecione a um nível de inglês.</option>
                                                    <option value="B">Básico</option>
                                                    <option value="I">Intermediário</option>
                                                    <option value="A">Avançado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="submit-field">
                                                <h5>Attachments</h5>

                                                <!-- Attachments -->
                                                <div class="attachments-container margin-top-0 margin-bottom-0">
                                                    <div class="attachment-box ripple-effect">
                                                        <span>Cover Letter</span>
                                                        <i>PDF</i>
                                                        <button class="remove-attachment" data-tippy-placement="top" title="Remove"></button>
                                                    </div>
                                                    <div class="attachment-box ripple-effect">
                                                        <span>Contract</span>
                                                        <i>DOCX</i>
                                                        <button class="remove-attachment" data-tippy-placement="top" title="Remove"></button>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>

                                                <!-- Upload Button -->
                                                <div class="uploadButton margin-top-0">
                                                    <input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
                                                    <label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
                                                    <span class="uploadButton-file-name">Maximum file size: 10 MB</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="submit-field">
                                                <h5>Nível de Experiência <i class="help-icon" data-tippy-placement="right" title="Selecione seu nível de experiência"></i></h5>
                                                <select name="proficiency_id" class="with-border form-control">
                                                    <option selected value>Selecione um nível de Experiência.</option>
                                                    @foreach($proficiencies as $proficiency)
                                                        <option value="{{ $proficiency->id }}">{{ $proficiency->level }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="submit-field">
                                                <h5>Regime de Contratação <i class="help-icon" data-tippy-placement="right" title="Selecione o tipo de Regime de Contratação : Ex(Pessoa Jurídica)."></i></h5>
                                                <select name="proficiency_id" class="with-border form-control">
                                                    <option selected value>Selecione um regime de contratação.</option>
                                                    @foreach($regimes as $regime)
                                                        <option value="{{ $regime->id }}">{{ $regime->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="submit-field">
                                                <h5>Introdução Profissional</h5>
                                                <textarea cols="30" rows="5" name="personal_summary" class="with-border">{{ $auth->personal_summary }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div id="test1" class="dashboard-box">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
                        </div>

                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <h5>Current Password</h5>
                                        <input type="password" class="with-border">
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <h5>New Password</h5>
                                        <input type="password" class="with-border">
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <h5>Repeat New Password</h5>
                                        <input type="password" class="with-border">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button -->
                <div class="col-xl-12 text-center">
                    <button type="submit"  class="button ripple-effect big margin-top-30">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
@endsection
