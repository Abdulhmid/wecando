<?php $segment = GLobalHelper::indexUrl(); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">Manajemen Data</li>
            <li class="treeview {!! $segment == 'reports' ? 'active' : '' !!}">
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
            <li class="{!! $segment == 'groups' ? 'active' : '' !!}">
                <a href="{!! url('/groups') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Campaign</span>
                </a>
            </li>
            <li class="{!! $segment == 'users'  ? 'active' : '' !!}">
                <a href="{!! url('/users') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Donasi</span>
                </a>
            </li>
            <li class="{!! $segment == 'users'  ? 'active' : '' !!}">
                <a href="{!! url('/users') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Pembayaran</span>
                </a>
            </li>
            <li class="{!! $segment == 'users'  ? 'active' : '' !!}">
                <a href="{!! url('/users') !!}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Newsletter</span>
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
            <li class="{!! $segment == 'users'  ? 'active' : '' !!}">
                <a href="{!! url('/users') !!}">
                    <i class="fa fa-bar-chart"></i>
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