<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        @if(isset($sidebarOptionsMain) && count($sidebarOptionsMain)>0)
        <ul class="nav flex-column">
            <li class="nav-link font-weight-bold">Dashboard</li>
            @foreach($sidebarOptionsMain as $sidebarOption)
                @if(isset($sidebarOption['name'], $sidebarOption['link']))
                <li class="nav-item">
                    <a class="nav-link {{ Request::is($sidebarOption['link']) ? 'active' : null }}" href="{{ url($sidebarOption['link']) }}">
                        {{ $sidebarOption['name'] }}<span class="sr-only"></span>
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/admin') ? 'active' : null }}" href="#">
                    Admin<span class="sr-only"></span>
                </a>
            </li>
        </ul>
        @endif
        @if(isset($sidebarOptionsSensors) && count($sidebarOptionsSensors)>0)
        <hr>
        <ul class="nav flex-column">
            <li class="nav-link font-weight-bold">Sensors</li>
            @foreach($sidebarOptionsSensors as $sidebarOption)
                @if(isset($sidebarOption['name'], $sidebarOption['link']))
                <li class="nav-item">
                    <a class="nav-link {{ Request::is($sidebarOption['link']) ? 'active' : null }}" href="{{ url($sidebarOption['link']) }}">
                        {{ $sidebarOption['name'] }}<span class="sr-only"></span>
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
        @endif
    </div>
</nav>