<header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap justify-content-end">

                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ asset('admin_assets/images/icon/avatar.png') }}"
                                                alt="Admin" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>



                                        @if (session()->has('ADMIN_EMAIL'))
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('admin_assets/images/icon/avatar.png') }}"
                                                                alt="Admin" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">Admin</a>
                                                        </h5>
                                                        <span class="email"> {{ session('ADMIN_EMAIL') }}</span>
                                                    </div>
                                                </div>

                                                <div class="account-dropdown__footer">
                                                    <a href="logout">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>