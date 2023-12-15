<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('city_list') }}" class="nav-link {{ Request::is('city') ? 'active' : '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>City</p>
    </a>
</li>
