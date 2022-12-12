<aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Personal</li>

                            <li class="{{ Request::is('dash') ? 'active' :''}}">
                            <a href="{{ url('dash') }}" aria-expanded="false">
                                <i class="nav-icon fa fa-home mr-3"></i>
                                <span class="nav-title">Dashboard</span>
                            
                            </a>
                            </li>
                           
                            <li class="{{ Request::is('new') ? 'active' :''}}">
                                <a href="{{ url('new') }}" aria-expanded="false"><i class="nav-icon fa fa-tasks"></i><span
                                        class="nav-title">new orders
                                    </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('done') ? 'active' :''}}">
                                <a href="{{ url('done') }}" aria-expanded="false"><i class="nav-icon fa fa-check"></i><span
                                        class="nav-title">completed orders
                                    </span>
                                </a>
                            </li>
                              <li> 
                                 <div>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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