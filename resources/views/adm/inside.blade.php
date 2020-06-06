@extends('adm.template')

@section('content')
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="{{ route('admin_dashboard') }}">Colepom - Administração</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                    <a href="{{route('admin_logout')}}">
                            <i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{route('admin_dashboard')}}">
                            <i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="{{route('admin_adm_list')}}">
                            <i class="fa fa-users fa-fw"></i> Administradores</a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-building-o fa-fw"></i> Sindicatos/Associações
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('admin_sin_list')}}">Sindicatos/Associações</a>
                            </li>
                            <li>
                                <a href="{{route('admin_sin_est_list')}}">Endereços</a>
                            </li>   
                            <li>
                                <a href="{{route('admin_sin_cat_list')}}">Categorias</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('admin_ass_list')}}">
                            <i class="fa fa-thumbs-o-up fa-fw"></i> Associados</a>
                        </li>
                    <li>

                    <li>
                        <a href="#">
                            <i class="fa fa-cubes fa-fw"></i> Parceiros
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('admin_par_list')}}">Parceiros</a>
                            </li>
                            <li>
                                <a href="{{route('admin_par_est_list')}}">Endereços</a>
                            </li>  
                            <li>
                                <a href="{{route('admin_par_cat_list')}}">Categorias/Subcategorias</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-money fa-fw"></i> Promoções
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('admin_pro_list')}}">Promoções</a>
                            </li>
                            <li>
                                <a href="{{route('admin_pro_cat_list')}}">Categorias/Subcategorias</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin_cup_list')}}">
                            <i class="fa fa-ticket fa-fw"></i> Cupons</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    @yield('inside')

</div>
@endsection