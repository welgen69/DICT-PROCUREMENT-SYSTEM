
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ set_active(['/','dashboard/page']) }}" href="{{ route('dashboard/page') }}">Admin Dashboard</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-object-group"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ set_active(['form/input/page']) }}" href="{{ route('form/input/page') }}">Form Input</a></li>
                        <li><a class="{{ set_active(['form/radio/index']) }}" href="{{ route('form/radio/index') }}">Form Radio</a></li>
                        <li><a class="{{ set_active(['form/checkbox/index']) }}" href="{{ route('form/checkbox/index') }}">Form Checkbox</a></li>
                        <li><a class="{{ set_active(['form/update/page']) }}" href="{{ route('form/update/page') }}">Form Upload File</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span> Page View </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ set_active(['form/page/view']) }} {{ request()->is('form/input/edit/*') ? 'active' : '' }}" href="{{ route('form/page/view') }}">Report Form Input</a></li>
                        <li><a class="{{ set_active(['view/upload/file']) }} {{ request()->is('download/file/*') ? 'active' : '' }}" href="{{ route('view/upload/file') }}">Report Form Upload File</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->