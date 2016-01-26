{{--*/ $segment = GLobalHelper::indexUrl(); /*--}}
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">Manajemen Data</li>
            <li class="treeview {!! $segment == 'groups' || $segment == 'users' ? 'active' : '' !!} ">
                <?php $segmentReport = Request::segment(2); ?>
                <a href="#">
                    <i class="fa fa-area-chart"></i>
                    <span>Master</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! $segment == 'groups' ? 'active' : '' !!}">
                        <a href="{!! url('/groups') !!}">
                            <i class="fa fa-bar-chart"></i>
                            <span>Groups</span>
                        </a>
                    </li>
                    <li class="{!! $segment == 'users'  ? 'active' : '' !!}">
                        <a href="{!! url('/users') !!}">
                            <i class="fa fa-bar-chart"></i>
                            <span>Users</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">Aktivitas</li>
            <li class="{!! $segment == 'partners'  ? 'active' : '' !!}">
                <a href="{!! url('/partners') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Partners</span>
                </a>
            </li>
            <li class="{!! $segment == 'back-newsletter'  ? 'active' : '' !!}">
                <a href="{!! url('/back-newsletter') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Newsletter</span>
                </a>
            </li>

            <li class="treeview {!! $segment == 'back-campaign' || $segment == 'back-campaign-category' ? 'active' : '' !!} ">
                <?php $segmentReport = Request::segment(2); ?>
                <a href="#">
                    <i class="fa fa-area-chart"></i>
                    <span>Campaign</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! $segment == 'back-campaign-category'  ? 'active' : '' !!}">
                        <a href="{!! url('/back-campaign-category') !!}">
                            <i class="fa fa-bar-chart"></i>
                            <span>Category Campaign</span>
                        </a>
                    </li>
                    <li class="{!! $segment == 'back-campaign' ? 'active' : '' !!}">
                        <a href="{!! url('/back-campaign') !!}">
                            <i class="fa fa-bar-chart"></i>
                            <span>Campaign</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{!! $segment == 'users'  ? 'active' : '' !!}">
                <a href="{!! url('/users') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Pembayaran</span>
                </a>
            </li>
            <li class="{!! $segment == 'back-contacts'  ? 'active' : '' !!}">
                <a href="{!! url('/back-contacts') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Contact</span>
                </a>
            </li>

            <li class="header">Report</li>
            <li class="{!! $segment == 'users'  ? 'active' : '' !!}">
                <a href="{!! url('/users') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Donation</span>
                </a>
            </li>

            <li class="header">Setting</li>
            <li class="{!! $segment == 'configuration'  ? 'active' : '' !!}">
                <a href="{!! url('/configuration') !!}">
                    <i class="fa fa-wrench"></i>
                    <span>Setting Website</span>
                </a>
            </li>

            <div style="display:none">
            <li class="header">Setting</li>
            <li class="treeview {!! $segment == 'reports' ? 'active' : '' !!}">
                <?php $segmentReport = Request::segment(2); ?>
                <a href="#">
                    <i class="fa fa-area-chart"></i>
                    <span>Manajemen Module</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! $segment == 'groups' ? 'active' : '' !!}">
                        <a href="{!! url('/groups') !!}">
                            <i class="fa fa-bar-chart"></i>
                            <span>Module</span>
                        </a>
                    </li>
                    <li class="{!! $segment == 'users'  ? 'active' : '' !!}">
                        <a href="{!! url('/users') !!}">
                            <i class="fa fa-bar-chart"></i>
                            <span>Akses Module</span>
                        </a>
                    </li>
                </ul>
            </li>
            </div>

            <!--<li class="header">KONFIGURASI</li>
            <li class="{!! $segment == 'configuration' ? 'active' : '' !!}">
                <a href="{!! url('configuration') !!}">
                    <i class="fa  fa-gear"></i> <span>Konfigurasi Umum</span>
                </a>
            </li>
            <li class="{!! $segment == 'module_access' ? 'active' : '' !!}">
                <a href="{!! url('module_access') !!}">
                    <i class="fa fa-shield"></i> <span>Modul Akses</span>
                </a>
            </li> -->


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>