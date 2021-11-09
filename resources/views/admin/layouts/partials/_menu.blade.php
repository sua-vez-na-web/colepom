<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!-- <img src="{{asset('assets/images/avatar.png')}}" class="img-circle" alt="User Image"> -->
                <i class="fa fa-user-o fa-3x"></i>
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name ?? 'Developer'}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Ativo</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            @can('administrator')
            <li class="{{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : ''  }}">
                <a href="{{ route('categories.index') }}">
                    <i class="fas fa-list">
                    </i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="{{ request()->is('admin/syndicates') || request()->is('admin/syndicates/*') ? 'active' : ''  }}">
                <a href="{{ route('syndicates.index') }}">
                    <i class="fas fa-bullhorn">
                    </i>
                    <span>Sindicatos</span>
                </a>
            </li>
            @endcan
            @can('administrator')
            <li class="{{ request()->is('admin/partners') || request()->is('admin/partners/*') ? 'active' : ''  }}">
                <a href="{{ route('partners.index') }}">
                    <i class="fas fa-handshake-o">
                    </i>
                    <span>Parceiros</span>
                </a>
            </li>
            @endcan
            @can('partner','administrator')
            <li class="{{ request()->is('admin/stores') || request()->is('admin/stores/*') ? 'active' : ''  }}">
                <a href="{{ route('stores.index') }}">
                    <i class="fas fa-shopping-basket">
                    </i>
                    <span>Estabelecimentos</span>
                </a>
            </li>
            @endcan
            @can('syndicate','administrator')
            <li class="{{ request()->is('admin/affiliates') || request()->is('admin/affiliates/*') ? 'active' : ''  }}">
                <a href="{{ route('affiliates.index') }}">
                    <i class="fas fa-users">
                    </i>
                    <span>Associados</span>
                </a>
            </li>
            @endcan
            @can('partner','administrator')
            <li class="{{ request()->is('admin/promotions') || request()->is('admin/promotions/*') ? 'active' : ''  }}">
                <a href="{{ route('promotions.index') }}">
                    <i class="fa fa-dollar">
                    </i>
                    <span>Promoções</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/affiliates-coupons') || request()->is('admin/affiliates-coupons/*') ? 'active' : ''  }}">
                <a href="{{ route('affiliates-coupons.index') }}">
                    <i class="fa fa-tag">
                    </i>
                    <span>Cupons Resgatados</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/coupons') || request()->is('admin/coupons/*') ? 'active' : ''  }}">
                <a href="{{ route('coupons.index') }}">
                    <i class="fa fa-tag">
                    </i>
                    <span>Cupons</span>
                </a>
            </li>
            @endcan
            @can('administrator')

            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''  }}">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-user-circle-o">
                    </i>
                    <span>Usuários</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/subscriptions') || request()->is('admin/subscriptions/*') ? 'active' : ''  }}">
                <a href="{{ route('subscriptions.index') }}">
                    <i class="fa fa-dollar">
                    </i>
                    <span>Assinaturas</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/plans') || request()->is('admin/plans/*') ? 'active' : ''  }}">
                <a href="{{ route('plans.index') }}">
                    <i class="fa fa-list">
                    </i>
                    <span>Planos</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/testimonials') || request()->is('admin/testimonials/*') ? 'active' : ''  }}">
                <a href="{{ route('testimonials.index') }}">
                    <i class="fa fa-list">
                    </i>
                    <span>Depoimentos</span>
                </a>
            </li>
            @endcan
            <li><a href="{{route('profile.edit')}}"><i class="fa fa-user"></i>Minha Conta</a></li>
            <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="fa fa-sign-out"></i> <span>Sair</span></a></li>
        </ul>
    </section>
    <form action="{{route('logout')}}" sytle="display:none" id="logout-form" method="POST">
        @csrf
    </form>
    <!-- /.sidebar -->
</aside>