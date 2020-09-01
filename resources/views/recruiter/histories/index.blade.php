@extends('layouts.recruiter.app')
@section('title', 'Cadastro')
@section('content')

    <div class="dashboard-content-inner" >

        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
            <h3><i class="icon-feather-clock"></i>  Históricos</h3>


        </div>

        <!-- Row -->
        <div class="row">

            <!-- Dashboard Box -->
            <div class="col-md-12">
                <div class="dashboard-box margin-top-0">

                    @if ($message = Session::get('success'))
                        <div class="notification success closeable">
                            <p>{{ $message }}</p>
                            <a class="close" href="#"></a>
                        </div>
                    @endif


                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>IP</th>
                                        <th>Data/Hora</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($histories as $history)
                                        <tr>
                                            <td>{{ $history->user()->first()->name }} </td>
                                            <td>{{ $history->action }} </td>
                                            <td>{{ $history->ip }} </td>
                                            <td>{{ $history->created_at->format('d/m/Y H:s') }} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                        <th>IP</th>
                                        <th>Data/Hora</th>
                                    </tr>
                                    </tfoot>
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