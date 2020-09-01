
<div class="dashboard-sidebar-inner" data-simplebar>
    <div class="dashboard-nav-container">

        <!-- Responsive Navigation Trigger -->
        <a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
            <span class="trigger-title">Dashboard Navigation</span>
        </a>

        <!-- Navigation -->
        <div class="dashboard-nav">
            <div class="dashboard-nav-inner ">
                <BR>

                <ul data-submenu-title="Analytics">
                    <li class="{{ (request()->is('recrutador')) ? 'active' : '' }}"><a href="{{ route('admin.dash') }}" ><i class="icon-feather-layers"></i> Dashboard</a></li>
               </ul>

                <ul data-submenu-title="Processo seletivo">
                    <li class="{{ (request()->is('recrutador/candidatos*')) ? 'active' : '' }}"><a href="{{ route('candidates') }}" ><i class="icon-feather-users"></i> Candidatos</a></li>
                    <li class="{{ (request()->is('recrutador/vagas*')) ? 'active' : '' }}"><a href="{{ route('jobs') }}" ><i class="icon-feather-briefcase"></i> Vagas</a></li>
                </ul>

                <ul data-submenu-title="Configurações">
                    <li class="{{ (request()->is('recrutador/carreiras*')) ? 'active' : '' }}"><a href="{{ route('careers') }}"><i class="icon-material-outline-free-breakfast"></i>Carreiras</a></li>
                    <li class="{{ (request()->is('recrutador/categorias*')) ? 'active' : '' }}"><a href="{{ route('job-categories') }}"><i class="icon-feather-folder"></i>Categorias</a></li>
                    <li class="{{ (request()->is('recrutador/especializacoes*')) ? 'active' : '' }}"><a href="{{ route('specialization') }}"><i class="icon-feather-box"></i> Especializações</a></li>
                    <li class="{{ (request()->is('recrutador/proficiencias*')) ? 'active' : '' }}"><a href="{{ route('proficiencie') }}"><i class="icon-feather-anchor"></i> Proficiências</a></li>
                    <li class="{{ (request()->is('recrutador/regime-contratacoes*')) ? 'active' : '' }}"><a href="{{ route('job-regime') }}"><i class="icon-feather-file-text"></i> Regimes de contratação</a></li>
                    <li class="{{ (request()->is('recrutador/habilidades*')) ? 'active' : '' }}"><a href="{{ route('skill') }}"><i class="icon-feather-award"></i> Habilidades</a></li>
                    <li class="{{ (request()->is('recrutador/benefícios*')) ? 'active' : '' }}"><a href="{{ route('benefits') }}"><i class="icon-feather-flag"></i> Benefícios</a></li>
                    <li class="{{ (request()->is('recrutador/cargos*')) ? 'active' : '' }}"><a href="{{ route('positions') }}"><i class="icon-feather-users"></i> Cargos</a></li>
                    <li class="{{ (request()->is('recrutador/redes-sociai*')) ? 'active' : '' }}"><a href="{{ route('social.networks') }}"><i class="icon-feather-share-2"></i> Redes Sociais</a></li>

                </ul>

                <ul data-submenu-title="Administrativo">
                    <li class="{{ (request()->is('recrutador/recrutadores*')) ? 'active' : '' }}"><a href="{{ route('recruiter') }}" ><i class="icon-feather-shield"></i> Recrutadores</a></li>
                    <li class="{{ (request()->is('recrutador/historico*')) ? 'active' : '' }}"><a href="{{ route('admin.histories') }}" ><i class="icon-feather-clock"></i> Histórico</a></li>
                </ul>

            </div>
        </div>
        <!-- Navigation / End -->

    </div>
</div>