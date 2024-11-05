<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-bar">
        <div class="nk-apps-brand">
            <a href="html/index.html" class="logo-link">
                <img class="logo-light logo-img" src="{{ asset('images/logo-small.png') }}"
                    srcset="./images/logo-small2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('images/logo-dark-small.png') }}"
                    srcset="./images/logo-dark-small2x.png 2x" alt="logo-dark">
            </a>
        </div>
        
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-body">
                <div class="nk-sidebar-content" data-simplebar>
                    <div class="nk-sidebar-menu">
                        <!-- Menu -->
                        <ul class="nk-menu apps-menu">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navApps">
                                    <span class="nk-menu-icon"><em class="icon ni ni-menu-circled"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navPages">
                                    <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navMisc">
                                    <span class="nk-menu-icon"><em class="icon ni ni-server"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navError">
                                    <span class="nk-menu-icon"><em class="icon ni ni-alert-c"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-hr"></li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navComponents">
                                    <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-sidebar-footer">
                        <ul class="nk-menu nk-menu-md apps-menu">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link" title="Settings">
                                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="nk-sidebar-profile nk-sidebar-profile-fixed">
                    <a href="#" class="toggle" data-target="profileDD">
                        <div class="user-avatar">
                            <span>AB</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md m-1 nk-sidebar-profile-dropdown"
                        data-content="profileDD">
                        <div class="dropdown-inner user-card-wrap d-none d-md-block">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <span>AB</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">Abu Bin Ishtiyak</span>
                                    <span class="sub-text text-soft">info@softnio.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="html/user-profile-regular.html"><em
                                            class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                <li><a href="html/user-profile-setting.html"><em
                                            class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                <li><a href="html/user-profile-activity.html"><em
                                            class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                            </ul>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>
            <div class="nk-menu-content menu-active" data-content="navDashboards">
                <h5 class="title">Dashboards</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="html/index.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Default Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/index-ecommerce.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Ecommerce Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/index-sales.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Sales Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/index-analytics.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                            <span class="nk-menu-text">Analytics Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navApps">
                <h5 class="title">Apps</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="html/apps-inbox.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-inbox-fill"></em></span>
                            <span class="nk-menu-text">Mailbox</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-messages.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                            <span class="nk-menu-text">Messages</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-file-manager.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-folder-fill"></em></span>
                            <span class="nk-menu-text">File Manager</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-chats.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-circle-fill"></em></span>
                            <span class="nk-menu-text">Chats</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-calendar.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-calender-date-fill"></em></span>
                            <span class="nk-menu-text">Calendar</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/apps-kanban.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-template-fill"></em></span>
                            <span class="nk-menu-text">Kanban Board</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navPages">
                <h5 class="title">Pages</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                            <span class="nk-menu-text">Projects</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/project-card.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Project Cards</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/project-list.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Project List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">User Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/user-list-regular.html" class="nk-menu-link"><span
                                        class="nk-menu-text">User List - Regular</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/user-list-compact.html" class="nk-menu-link"><span
                                        class="nk-menu-text">User List - Compact</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/user-details-regular.html" class="nk-menu-link"><span
                                        class="nk-menu-text">User Details - Regular</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/user-profile-regular.html" class="nk-menu-link"><span
                                        class="nk-menu-text">User Profile - Regular</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/user-card.html" class="nk-menu-link"><span class="nk-menu-text">User
                                        Contact - Card</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                            <span class="nk-menu-text">Customers</span><span class="nk-menu-badge">New</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/customer-list.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Customer List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/customer-details.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Customer Details</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-cart-fill"></em></span>
                            <span class="nk-menu-text">Ecommerce Pages</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/products.html" class="nk-menu-link"><span class="nk-menu-text">Product
                                        List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/orders-regular.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Order List - Regular</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/orders-sales.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Order List - Sales</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/invoice-list.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Invoices List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/invoice-details.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Invoice Details</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-list-fill"></em></span>
                            <span class="nk-menu-text">Products</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/product-list.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Product List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/product-card.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Product Card</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/product-details.html" class="nk-menu-link"><span
                                        class="nk-menu-text">Product Details</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/pricing-table.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-col-fill"></em></span>
                            <span class="nk-menu-text">Pricing Table</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/gallery.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-img-fill"></em></span>
                            <span class="nk-menu-text">Image Gallery</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/_blank.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-fill"></em></span>
                            <span class="nk-menu-text">Blank / Startup</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/faqs.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-fill"></em></span>
                            <span class="nk-menu-text">Faqs / Help</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/terms-policy.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-fill"></em></span>
                            <span class="nk-menu-text">Terms / Policy</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/regular-v1.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-fill"></em></span>
                            <span class="nk-menu-text">Regular Page - v1</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/regular-v2.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-fill"></em></span>
                            <span class="nk-menu-text">Regular Page - v2</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navMisc">
                <h5 class="title">Misc Pages</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="html/pages/auths/auth-login.html" class="nk-menu-link" target="_blank"><span
                                class="nk-menu-text">Login / Signin</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/auths/auth-register.html" class="nk-menu-link" target="_blank"><span
                                class="nk-menu-text">Register / Signup</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/auths/auth-reset.html" class="nk-menu-link" target="_blank"><span
                                class="nk-menu-text">Forgot Password</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/auths/auth-success.html" class="nk-menu-link" target="_blank"><span
                                class="nk-menu-text">Success / Confirm</span></a>
                    </li>
                    <li class="nk-menu-item no-icon">
                        <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Classic
                                Version - v2</span></a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/pages/auths/auth-login-v2.html" class="nk-menu-link"
                                    target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pages/auths/auth-register-v2.html" class="nk-menu-link"
                                    target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pages/auths/auth-reset-v2.html" class="nk-menu-link"
                                    target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pages/auths/auth-success-v2.html" class="nk-menu-link"
                                    target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item no-icon">
                        <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">No Slider
                                Version - v3</span></a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/pages/auths/auth-login-v3.html" class="nk-menu-link"
                                    target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pages/auths/auth-register-v3.html" class="nk-menu-link"
                                    target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pages/auths/auth-reset-v3.html" class="nk-menu-link"
                                    target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/pages/auths/auth-success-v3.html" class="nk-menu-link"
                                    target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navError">
                <h5 class="title">Error Pages</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="html/pages/errors/404-classic.html" target="_blank" class="nk-menu-link"><span
                                class="nk-menu-text">404 Classic</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/errors/504-classic.html" target="_blank" class="nk-menu-link"><span
                                class="nk-menu-text">504 Classic</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/errors/404-s1.html" target="_blank" class="nk-menu-link"><span
                                class="nk-menu-text">404 Modern</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/pages/errors/504-s1.html" target="_blank" class="nk-menu-link"><span
                                class="nk-menu-text">504 Modern</span></a>
                    </li>
                </ul><!-- .nk-menu -->
            </div>





            </ul><!-- .nk-menu -->
        </div>
    </div>
</div>
</div>
