<!-- need to remove -->

@if (Auth::user()->role == 'admin')
    <li class="nav-item">
        <a href="{{ route('admin') }}" class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.transaction') }}" class="nav-link {{ Request::is('admin/transaction*') ? 'active' : '' }}">
            <i class="nav-icon far fa-envelope"></i>
            <p>Transaction</p>
        </a>
    </li>
    {{-- <li class="nav-item {{ Request::is('transaction*') ? 'menu-is menu-is-opening menu-open' : '' }}" >
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
            <li class="nav-item">
                <a href="{{ route('admin.inbox') }}" class="nav-link {{ Request::is('admin/inbox') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inbox</p>
                </a>
            </li>
        </ul>
    </li> --}}
@elseif (Auth::user()->role == 'member')
    <li class="nav-item">
        <a href="{{ route('member.dashboard') }}" class="nav-link {{ Request::is('member*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('car.index') }}" class="nav-link {{ Request::is('car*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-car"></i>
            <p>Car</p>
        </a>
    </li>
@endif

