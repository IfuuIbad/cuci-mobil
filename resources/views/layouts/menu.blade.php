<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item {{ Request::is('transaction*') ? 'menu-is menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('transaction*') ? 'active' : '' }}">
        <i class="nav-icon far fa-envelope"></i>
        <p>
        Transaction
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{ route('invoice') }}" class="nav-link {{ Request::is('transaction/invoice') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Invoice</p>
        </a>
        </li>
    </ul>
</li>
