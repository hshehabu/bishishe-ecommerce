<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_lights">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">Personal</li>

            <li>
                <a class="" href="/home" aria-expanded="false">
                    <i class="nav-icon fa fa-home mr-3"></i>
                    <span class="nav-title">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="" href="/setting" aria-expanded="false">
                    <i class="nav-icon fa fa-user"></i>
                    <span class="nav-title">Account Settings</span>
                </a>
            </li>
            <li class="{{ Request::is('pending') ? 'active' :''}}">
                <a href="{{ url('pending') }}" aria-expanded="false"><i class="nav-icon fa fa-tasks"></i><span
                        class="nav-title">new orders
                    </span>
                </a>
            </li>
            <li class="{{ Request::is('completed') ? 'active' :''}}">
                <a href="{{ url('completed') }}" aria-expanded="false"><i class="nav-icon fa fa-check"></i><span
                        class="nav-title">completed orders
                    </span>
                </a>
            </li>
            <li class="{{ Request::is('orders') ? 'active' :'' }}">
                <a href="{{ url('orders') }}" aria-expanded="false"><i class="nav-icon fa fa-history"></i><span
                        class="nav-title">order history

                    </span> </a>
            </li>
            <li>
                <a class="has-arrow " href="javascript: void(0);">
                    <i class="nav-icon fa fa-gear"></i><span class="nav-title">Manage Sales

                    </span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ Request::is('add_sales') ? 'active' :'' }}">
                        <a href="{{ url('add_sales') }}">Add Sales</a>
                    </li>
                    <li class="{{ Request::is('manage') ? 'active' :'' }}">
                        <a href="{{ url('manage') }}">Manage</a>
                    </li>

                </ul>
            </li>



            <li class="{{ Request::is('create') ? 'active' :''}}"> 
                <a href="{{ url('create') }}" aria-expanded="false"><i class="nav-icon zmdi zmdi-plus"></i><span
                        class="nav-title">add product

                    </span> </a>
            </li>
            <li class="{{ Request::is('earlier') ? 'active' :''}}">
                <a href="{{ url('earlier') }}" aria-expanded="false"><i class="nav-icon fa fa-angle-down"></i><span
                        class="nav-title">products 

                    </span> </a>
            </li>

            <li>

                <div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>



        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>