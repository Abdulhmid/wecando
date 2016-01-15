<?php $segment = GLobalHelper::indexUrl(); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">Manajemen Dat</li>
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
            <li class="header">KONFIGURASI</li>
            <li class="{!! $segment == 'configuration' ? 'active' : '' !!}">
                <a href="{!! url('configuration') !!}">
                    <i class="fa  fa-gear"></i> <span>Konfigurasi Umum</span>
                </a>
            </li>
            <li class="{!! $segment == 'module_access' ? 'active' : '' !!}">
                <a href="{!! url('module_access') !!}">
                    <i class="fa fa-shield"></i> <span>Modul Akses</span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>