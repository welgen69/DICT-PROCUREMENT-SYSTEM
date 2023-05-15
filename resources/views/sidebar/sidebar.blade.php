
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-object-group"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ set_active(['form/update/page']) }}" href="{{ route('form/update/page') }}">Form Upload File</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span> Page View </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ set_active(['view/upload/file']) }} {{ request()->is('download/file/*') ? 'active' : '' }}" href="{{ route('view/upload/file') }}">Report Form Upload File</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->