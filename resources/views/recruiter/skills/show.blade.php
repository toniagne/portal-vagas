@extends('layouts.recruiter.app')
@section('title', 'Visualizar habilidade')
@section('content')

    <div class="dashboard-content-inner" >

        <div class="dashboard-headline">
            <h3><i class="icon-feather-award"></i>  Visualizar habilidade <i class="icon-material-outline-arrow-forward"></i>  {{ $skills->name }}</h3>
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


                                        @forelse($skills->jobs()->get() as $jobs)

                                            @empty
                                        <h4> Não há vagas com esta habilidade</h4>
                                        @endforelse
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