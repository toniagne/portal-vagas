@extends('layouts.recruiter.app')
@section('title', 'Manutenção de categorias')
@section('content')

    <div class="dashboard-content-inner" >

        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
            <h3><i class="icon-feather-box"></i>  Especializações</h3>

            <!-- Breadcrumbs -->
            <nav id="breadcrumbs" >
                <a href="{{ route('specialization.create') }}" class="button btn-outline-danger ripple-effect"><i class="icon-material-outline-add"></i> Adicionar uma especialização</a>
            </nav>
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
                             <table  class="table table-hover dt-responsive nowrap datatable" style="width:100%">
                                 <thead>
                                 <tr>
                                     <th>Nome</th>
                                     <th>Ações</th>
                                 </tr>
                                 </thead>
                                 <tbody>

                                 @foreach($specializations as $specialization)
                                 <tr>
                                     <td><a href="{{ route('specialization.edit', $specialization->id) }}"> {{ $specialization->name }} </a></td>
                                      <td>
                                         <div class="row">
                                             <div class="col-sm-2">
                                                 <a href="{{ route('specialization.edit', $specialization->id) }}" class="button gray ripple-effect ico" title="Editar" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                                             </div>
                                             <div class="col-sm-2">
                                                 <a class="button gray ripple-effect ico action-delete"
                                                    title="Remover"
                                                    data-tippy-placement="top"
                                                    data-row="{{ $specialization->id }}"
                                                    data-route="{{ route('specialization.delete', $specialization->id) }}"
                                                    data-message="Deseja apagar este registro ?" >
                                                     <i class="icon-feather-trash-2"></i>
                                                 </a>
                                                 </form>
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