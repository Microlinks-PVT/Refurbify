<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="26">
            </span>
        </a>
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="24">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">{{ __('t-menu') }}</span></li>
                <li class="nav-item">
                    <a href="index" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span data-key="t-dashboard">{{ __('t-dashboard') }}</span> <span class="badge badge-pill bg-danger-subtle text-danger" data-key="t-hot">{{ __('t-hot') }}</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAccounts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccounts">
                        <i class="bi bi-person-circle"></i> <span data-key="t-accounts">{{ __('t-accounts') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAccounts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="account" class="nav-link" data-key="t-my-account">{{ __('t-my-account') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="account-settings" class="nav-link" data-key="t-settings">{{ __('t-settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-signup-basic" class="nav-link" data-key="t-sign-up">{{ __('t-sign-up') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-signin-basic" class="nav-link" data-key="t-sign-in">{{ __('t-sign-in') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-pass-reset-basic" class="nav-link" data-key="t-passowrd-reset">{{ __('t-passowrd-reset') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-pass-change-basic" class="nav-link" data-key="t-create-password">{{ __('t-create-password') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-success-msg-basic" class="nav-link" data-key="t-success-message">{{ __('t-success-message') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-twostep-basic" class="nav-link" data-key="t-two-step-verify">{{ __('t-two-step-verify') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-logout-basic" class="nav-link" data-key="t-logout">{{ __('t-logout') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-404" class="nav-link" data-key="t-error-404">{{ __('t-error-404') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-500" class="nav-link" data-key="t-error-500">{{ __('t-error-500') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="coming-soon" class="nav-link" data-key="t-coming-soon">{{ __('t-coming-soon') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="bi bi-share"></i> <span data-key="t-multi-level">{{ __('t-multi-level') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-level-1.1"> {{ __('t-level-1.1') }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> {{ __('t-level-1.2') }}
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-key="t-level-2.1"> {{ __('t-level-2.1') }} </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm" data-key="t-level-2.2"> {{ __('t-level-2.2') }}
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.1"> {{ __('t-level-3.1') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.2"> {{ __('t-level-3.2') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>