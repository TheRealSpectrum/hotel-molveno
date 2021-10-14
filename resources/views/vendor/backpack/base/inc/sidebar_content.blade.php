<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('room') }}'><i class='la la-bed nav-icon'></i> Rooms</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('roomtype') }}'><i class='nav-icon las la-info'></i> Room types</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('package') }}'><i class='nav-icon las la-info'></i> Packages</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('guest') }}'><i class='nav-icon la la-user-tag'></i> Guests</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('reservation') }}'><i class='nav-icon la la-calendar-check'></i> Reservations</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-file-o'></i> <span>Pages</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('document') }}'><i class='nav-icon la la-calendar-check'></i> Documents</a></li>

