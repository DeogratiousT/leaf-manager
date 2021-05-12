<div class="left-side-menu mm-active">

    <div class="slimScrollDiv mm-show" style="position: relative; overflow: hidden; width: auto; height:auto;"><div class="slimscroll-menu mm-active" id="left-side-menu-container" style="overflow: hidden; width: auto; height: auto;">

        <!-- LOGO -->
        <a href="javascript:void(0);" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('/images/logo2.png') }}" alt="" height="36" id="side-main-logo">
            </span>
        </a>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav mm-show">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item" id="side-nav-item">
                <a href="{{ route('home') }}" class="side-nav-link">
                    <i class="mdi mdi-home"></i>
                    <span>Dashboard</span>
                </a>
            </li> 

            @can('viewAny', App\User::class)
                <li class="side-nav-item" id="side-nav-item">
                    <a href="{{ route('users.index') }}" class="side-nav-link">
                        <i class="mdi mdi-home"></i>
                        <span>Users</span>
                    </a>
                </li>
            @endcan
            
            <li class="side-nav-item" id="menuLi2" onclick="toggleFunc2()">
                <a href="javascript: void(0);" class="side-nav-link" id="menuLiAn2" aria-expanded="false">
                <i class="mdi mdi-account-multiple"></i>
                    <span> Farmers </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse" id="menuLiUl2" aria-expanded="false" style="height:0px;">
                    <li>
                        <a href="{{ route('farmers.index') }}">All Farmers</a>
                    </li>
                    <li>
                        <a href="{{ route('cropyears.index') }}">Crop Years</a>
                    </li>
                    <li>
                        <a href="{{ route('farminputs.index') }}">Farm Inputs</a>
                    </li>
                    <li>
                        <a href="{{ route('farmerinputs.index') }}">Allocate Inputs to Farmers</a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item" id="menuLi1" onclick="toggleFunc1()">
                <a href="javascript: void(0);" class="side-nav-link" id="menuLiAn1" aria-expanded="false">
                    <i class="mdi mdi-cash"></i>
                    <span> Tobacco Buying </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse" id="menuLiUl1" aria-expanded="false" style="height:0px;">
                    <li>
                        <a href="{{ route('balereceptions.index') }}">Bale Reception</a>
                    </li>
                    <li>
                        <a href="{{ route('loadings.index') }}">Loading</a>
                    </li>
                    <li>
                        <a href="{{ route('offloadings.index') }}">Off Loading</a>
                    </li>
                    <li>
                        <a href="{{ route('allbales') }}">All Bales</a>
                    </li>
                    <li>
                        <a href="{{ route('lorries.index') }}">Trucks</a>
                    </li>
                    <li>
                        <a href="{{ route('stations.index') }}">Markets</a>
                    </li>
                    <li>
                        <a href="{{ route('stores.index') }}">Stores</a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item" id="menuLi" onclick="toggleFunc()">
                <a href="javascript: void(0);" class="side-nav-link" id="menuLiAn" aria-expanded="false">
                    <i class="mdi mdi-package"></i>
                    <span> Products and Grades </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse" id="menuLiUl" aria-expanded="false" style="height:0px;">
                    <li>
                        <a href="{{ route('tobaccotypes.index') }}">Tobacco Types</a>
                    </li>
                    <li>
                        <a href="{{ route('grades.index') }}">Grades</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}">Products</a>
                    </li>
                </ul>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('customers.index') }}" class="side-nav-link">
                    <i class="mdi mdi-account-multiple"></i>
                    <span>Customers</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('orders.index') }}" class="side-nav-link">
                    <i class="mdi mdi-reorder-horizontal"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('production-line-components.index') }}" class="side-nav-link">
                    <i class="mdi mdi-reorder-horizontal"></i>
                    <span>Line Components</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('units.index') }}" class="side-nav-link">
                    <i class="mdi mdi-weight"></i>
                    <span>Weighing Units</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('counties.index') }}" class="side-nav-link">
                    <i class="mdi mdi-island"></i>
                    <span>Counties</span>
                </a>
            </li>
                
        </ul>
        <!-- End Sidebar -->

    </div><div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 4px; position: absolute; top: -100.922px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 30px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    <!-- Sidebar -left -->

</div>