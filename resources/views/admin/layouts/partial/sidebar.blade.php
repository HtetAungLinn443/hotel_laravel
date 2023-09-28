<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-hotel" title="Hotel Booking"></i>
                            <span>
                                Hotel Booking
                            </span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if (isset(getSiteSetting()->logo_path))
                                <img src="{{ asset('assets/images/' . getSiteSetting()->logo_path) }}"
                                    class="img-circle profile_img" alt="{{ getSiteSetting()->logo_path }}">
                            @else
                                <img src="{{ asset('images/user.png') }}" alt="" class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>
                                {{ Auth::user()->name }}
                            </h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="{{ route('dashboard') }}" title="{{ route('dashboard') }}">
                                        <i class="fa fa-home"></i> Home
                                    </a>
                                </li>

                                <li>
                                    <a><i class="fa fa-binoculars"></i> Room View <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('viewCreate') }}"
                                                title="{{ route('viewCreate') }}">Create</a></li>
                                        <li><a href="{{ route('viewLists') }}"
                                                title="{{ route('viewLists') }}">Listing</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a><i class="fa fa-bed"></i> Room Bed <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('bedCreate') }}"
                                                title="{{ route('bedCreate') }}">Create</a></li>
                                        <li><a href="{{ route('bedLists') }}"
                                                title="{{ route('bedLists') }}">Listing</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a><i class="fa fa-list"></i> Room Amenities<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('amenityCreate') }}"
                                                title="{{ route('amenityCreate') }}">Create</a></li>
                                        <li><a href="{{ route('amenityLists') }}"
                                                title="{{ route('amenityLists') }}">Listing</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a><i class="fa-solid fa-hotel"></i> Room Special Feature<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('featureCreate') }}"
                                                title="{{ route('featureCreate') }}">Create</a></li>
                                        <li><a href="{{ route('featureLists') }}"
                                                title="{{ route('featureLists') }}">Listing</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a><i class="fa-solid fa-hotel"></i> Room<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('roomCreate') }}"
                                                title="{{ route('roomCreate') }}">Create</a></li>
                                        <li><a href="{{ route('roomLists') }}"
                                                title="{{ route('roomLists') }}">Listing</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a><i class="fa-solid fa-circle-plus"></i> Reservation<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('bookingLists') }}" title="">Listing</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('settingForm') }}" title="{{ route('settingForm') }}">
                                        <i class="fa fa-gear"></i> Site Setting
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>
