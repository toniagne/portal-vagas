@extends('layouts.recruiter.app')
@section('title', 'Candidatos registrados')
@section('content')

    <div class="dashboard-content-inner" >

        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
            <h3><i class="icon-feather-users"></i>  Candidatos</h3>


        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">
                <div class="dashboard-box margin-top-0">

                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover dt-responsive nowrap datatable" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Carreira</th>
                                        <th>Localização</th>
                                        <td>Habilidades</td>
                                        <td>Vagas</td>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($candidates as $candidate)
                                        <tr>
                                            <td><a href="{{ route('candidates.show', $candidate->id) }}"> {{ $candidate->name }} </a></td>
                                            <td>{{ $candidate->email }}</td>
                                            <td>{{ $candidate->career->name }}</td>
                                            <td>{{ $candidate->city->title }} / {{ $candidate->city->state->letter }} </td>
                                            <td>
                                                @foreach ($candidate->getSkills()->get() as $skills)
                                                  [ {{ $skills->skill->name }} ]
                                                @endforeach
                                            </td>
                                            <td>{{ $candidate->applications()->count() }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <a href="{{ route('candidates.show', $candidate->id) }}" class="button gray ripple-effect ico" title="Visualizar perfil" data-tippy-placement="top"><i class="icon-feather-eye"></i></a>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

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
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable( {
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ itens por página",
                        "zeroRecords": "Nâo exite nenhum registro.",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)"
                    },
                    "ordering": false,
                    "info":     false
                });
            } );
        </script>
    @endpush
@endsection