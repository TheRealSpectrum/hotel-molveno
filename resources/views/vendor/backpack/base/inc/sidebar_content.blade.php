<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('room') }}'><i class='la la-bed nav-icon'></i> Rooms</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('roomtype') }}'><i class='nav-icon las la-info'></i> Roomtypes</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('guest') }}'><i class='nav-icon la la-user-tag'></i> Guests</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('reservation') }}'><i class='nav-icon la la-calendar-check'></i> Reservations</a></li>
