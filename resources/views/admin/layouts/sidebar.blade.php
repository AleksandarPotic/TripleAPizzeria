<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Storage::url(Auth::user()->image) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@yield('active1')"><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @can('admins.view', Auth::user())
                <li class="@yield('active5')"><a href="{{ route('admins.index') }}"><i class="fa fa-user-md"></i> <span>Admins</span></a></li>
            @endcan
            @can('products.view', Auth::user())
                <li class="@yield('activeCategory') treeview">
                    <a href="#">
                        <i class="fa fa-navicon"></i>
                        <span>Menu</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@yield('Pizza')"><a href="{{ route('products.index', ['category=pizza']) }}"><i class="fa fa-circle-o"></i> Pizza</a></li>
                        <li class="@yield('Salads')"><a href="{{ route('products.index', ['category=salads']) }}"><i class="fa fa-circle-o"></i> Salads</a></li>
                        <li class="@yield('Appetizers')"><a href="{{ route('products.index', ['category=appetizers']) }}"><i class="fa fa-circle-o"></i> Appetizers</a></li>
                        <li class="@yield('Nachos')"><a href="{{ route('products.index', ['category=nachos']) }}"><i class="fa fa-circle-o"></i> Nachos</a></li>
                        <li class="@yield('Calzones')"><a href="{{ route('products.index', ['category=calzones']) }}"><i class="fa fa-circle-o"></i> Calzones</a></li>
                        <li class="@yield('Garlic Fingers')"><a href="{{ route('products.index', ['category=garlic_fingers']) }}"><i class="fa fa-circle-o"></i> Garlic Fingers</a></li>
                        <li class="@yield('Chicken')"><a href="{{ route('products.index', ['category=chicken']) }}"><i class="fa fa-circle-o"></i> Chicken</a></li>
                        <li class="@yield('Chicken Wings')"><a href="{{ route('products.index', ['category=chicken_wings']) }}"><i class="fa fa-circle-o"></i> Chicken Wings</a></li>
                        <li class="@yield('Sandwiches')"><a href="{{ route('products.index', ['category=sandwiches']) }}"><i class="fa fa-circle-o"></i> Sandwiches</a></li>
                        <li class="@yield('Subs')"><a href="{{ route('products.index', ['category=subs']) }}"><i class="fa fa-circle-o"></i> Subs</a></li>
                        <li class="@yield('Wraps')"><a href="{{ route('products.index', ['category=wraps']) }}"><i class="fa fa-circle-o"></i> Wraps</a></li>
                        <li class="@yield('Donairs')"><a href="{{ route('products.index', ['category=donairs']) }}"><i class="fa fa-circle-o"></i> Donairs</a></li>
                        <li class="@yield('Poutine')"><a href="{{ route('products.index', ['category=poutine']) }}"><i class="fa fa-circle-o"></i> Poutine</a></li>
                        <li class="@yield('Seafood')"><a href="{{ route('products.index', ['category=seafood']) }}"><i class="fa fa-circle-o"></i> Seafood</a></li>
                        <li class="@yield('Burgers')"><a href="{{ route('products.index', ['category=burgers']) }}"><i class="fa fa-circle-o"></i> Burgers</a></li>
                        <li class="@yield('Drinks')"><a href="{{ route('products.index', ['category=drinks']) }}"><i class="fa fa-circle-o"></i> Drinks</a></li>
                        <li class="@yield('Munchies')"><a href="{{ route('products.index', ['category=munchies']) }}"><i class="fa fa-circle-o"></i> Munchies</a></li>
                        <li class="@yield('Desserts')"><a href="{{ route('products.index', ['category=desserts']) }}"><i class="fa fa-circle-o"></i> Desserts</a></li>
                        <li class="@yield('Sauces')"><a href="{{ route('products.index', ['category=sauces']) }}"><i class="fa fa-circle-o"></i> Sauces</a></li>
                    </ul>
                </li>
            @endcan
            @can('customizes.view', Auth::user())
                <li class="@yield('active12')"><a href="{{ route('specials.index') }}"><i class="fa fa-diamond"></i> <span>Specials</span></a></li>
            @endcan
            @can('customizes.view', Auth::user())
                <li class="@yield('active9')"><a href="{{ route('customize.index') }}"><i class="fa fa-pie-chart"></i> <span>Pizza Toppings</span></a></li>
            @endcan
            @can('orders', Auth::user())
                <li class="@yield('active4')"><a href="{{ route('orders.index') }}"><i class="fa fa-shopping-cart"></i> <span>Online Orders</span></a></li>
            @endcan
            @can('orders', Auth::user())
                <li class="@yield('active8')"><a href="{{ route('finishedOrders.index') }}"><i class="fa fa-cart-arrow-down"></i> <span>Order History</span></a></li>
            @endcan
            @can('roles.view', Auth::user())
                <li class="@yield('active6')"><a href="{{ route('roles.index') }}"><i class="fa  fa-user-secret"></i> <span>Roles</span></a></li>
            @endcan
            @can('messages', Auth::user())
                <li class="@yield('active7')"><a href="{{ route('message.index') }}"><i class="fa fa-envelope-o"></i> <span>Email</span></a></li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>