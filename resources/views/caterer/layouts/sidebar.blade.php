<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar mt-1">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-profile"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <img src="{{  Auth::user()->imagePath() }}" class="" alt="user">
                                <span class="hide-menu text-capitalize">{{ Auth::user()->getFullname() }}  </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('caterer/profile') }}">My Profile </a></li>
                                <li><a href="javascript:void()">My Balance</a></li>
                                <li><a href="javascript:void()">Inbox</a></li>
                                <li><a href="javascript:void()">Account Setting</a></li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li> 
                            <a class="waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="mdi mdi-bullseye"></i>
                                <span class="hide-menu">Transactions</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>