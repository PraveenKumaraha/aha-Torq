<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li>
                    <a href="{{ URL :: to('/admin/dashboard') }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-car"></i>
                        Car Masters
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ URL :: to('/admin/carBrands') }}">
                                <i class="metismenu-icon"></i>
                                Brands
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/carModels') }}">
                                <i class="metismenu-icon"></i>
                                Models
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/carVersions') }}">
                                <i class="metismenu-icon"></i>
                                Version
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/carBodyTypes') }}">
                                <i class="metismenu-icon"></i>
                                Body Type
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/carFuelTypes') }}">
                                <i class="metismenu-icon"></i>
                                Fuel Type
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/carTransmissionTypes') }}">
                                <i class="metismenu-icon pe-7s-tools"></i>
                                Transmission Type
                            </a>
                        </li>
                        <!-- <li class="treeview">
                            <a href="{{ URL :: to('/admin/backups') }}">
                                <i class="metismenu-icon pe-7s-download"></i><span>Backup</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <!-- <li>
                    <a href="{{ URL :: to('/admin/users') }}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Users
                    </a>
                </li> -->
                <li>
                    <a href="{{ URL :: to('/admin/blogs') }}">
                        <i class="metismenu-icon pe-7s-bookmarks"></i>
                        Car Detail 
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-menu"></i>
                        Examples
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li class="treeview">
                            <a href="{{ URL :: to('/admin/passport') }}">
                                <i class="metismenu-icon"></i><span>Laravel Passport</span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-bicycle"></i>
                        Bike Masters
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ URL :: to('/admin/bikeBrands') }}">
                                <i class="metismenu-icon"></i>
                                Brands
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/bikeModels') }}">
                                <i class="metismenu-icon"></i>
                                Models
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/bikeVersions') }}">
                                <i class="metismenu-icon"></i>
                                Version
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/carVersions') }}">
                                <i class="metismenu-icon"></i>
                                Body Type
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/bikeFuelTypes') }}">
                                <i class="metismenu-icon"></i>
                                Fuel Type
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL :: to('/admin/carTransmissionTypes') }}">
                                <i class="metismenu-icon pe-7s-tools"></i>
                                Transmission Type
                            </a>
                        </li>
                        <!-- <li class="treeview">
                            <a href="{{ URL :: to('/admin/backups') }}">
                                <i class="metismenu-icon pe-7s-download"></i><span>Backup</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="{{ URL :: to('/admin_login/logout') }}">
                        <i class="metismenu-icon pe-7s-upload"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- /.sidebar -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.app-sidebar__inner ul li').each(function () {
            if (window.location.href.indexOf($(this).find('a:first').attr('href')) > -1) {
                $(this).closest('ul').closest('li').attr('class', 'mm-active');
                $(this).addClass('mm-active').siblings().removeClass('mm-active');
            }
        });
    });
</script>