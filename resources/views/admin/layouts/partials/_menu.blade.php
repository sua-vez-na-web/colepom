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
        <a class="navbar-brand" href="#">Colepom - Administração</a>
        </div>      

        <ul class="nav navbar-top-links navbar-right">          
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    {{Auth::user()->name ?? 'Develop'}}
                    <i class="fa fa-user fa-fw"></i>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="#">
                            <i class="fa fa-user fa-fw"></i> Minha Conta
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                            <i class="fa fa-sign-out fa-fw"></i> Logout
                        </a>
                    </li>                    
                </ul>                
            </li>           
        </ul>

        <form action="{{ route('logout') }}" id="logout-form" style="display:none" method="post">
            @csrf
        </form>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{route('categories.index')}}">Categorias/Subcategorias</a>
                    </li>        
                    @can('administrator')            
                        <li>
                            <a href="{{route('syndicates.index')}}">Sindicatos</a>
                        </li>
                    @endcan
                    @can('administrator')
                        <li>
                            <a href="{{route('partners.index')}}">Parceiros</a>
                        </li>
                    @endcan
                    @can('partner','administrator')
                        <li>
                            <a href="{{route('stores.index')}}">Estabelecimentos</a>
                        </li>
                    @endcan
                    @can('syndicate','administrator')
                        <li>
                            <a href="{{route('affiliates.index')}}">Associados</a>
                        </li>
                    @endcan
                    @can('partner','administrator')
                        <li>
                            <a href="{{route('promotions.index')}}">Promoções</a>
                        </li>
                    @endcan
                    <!-- <li>
                        <a href="#">
                            <i class="fa fa-money fa-fw"></i> Promoções
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Promoções</a>
                            </li>
                            <li>
                                <a href="#">Categorias/Subcategorias</a>
                            </li>
                        </ul>
                    </li> -->                   
                </ul>
            </div>          
        </div>        
    </nav>
</div>
