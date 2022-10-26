@if(auth()->user()->level =='superadmin')
<ul class="nav navbar-nav">
    <li class="active">
        <a href="{{url('/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
    </li>
    <h3 class="menu-title">Data User</h3><!-- /.menu-title -->
    <li>
        <a href="{{url('alumni')}}"> <i class="menu-icon fa fa-users"></i>Alumni </a>
    </li>
    <li>
        <a href="{{url('admin')}}"> <i class="menu-icon fa fa-briefcase"></i>Admin </a>
    </li>
    <li>
        <a href="{{url('him')}}"> <i class="menu-icon fa fa-user"></i>HIM </a>
    </li>

    <h3 class="menu-title">Broadcast</h3><!-- /.menu-title -->
    <li>
        <a href="{{url('data')}}"> <i class="menu-icon fa fa-bullhorn"></i>Broadcast </a>
    </li>

    <li>
        <a href="{{url('pesan1')}}"> <i class="menu-icon ti-email"></i>Pesan </a>
    </li>
</ul>
@elseif(auth()->user()->level =='admin')
<ul class="nav navbar-nav">
    <li class="active">
        <a href="{{url('/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
    </li>
    <h3 class="menu-title">Data User</h3><!-- /.menu-title -->
    <li>
        <a href="{{url('alumni')}}"> <i class="menu-icon fa fa-users"></i>Alumni </a>
    </li>
    <li>
        <a href="{{url('user')}}"> <i class="menu-icon fa fa-user"></i>User </a>
    </li>

    <h3 class="menu-title">Broadcast</h3><!-- /.menu-title -->

    <li>
        <a href="{{url('data')}}"> <i class="menu-icon fa fa-bullhorn"></i>Broadcast </a>
    </li>
    <li>
        <a href="{{url('pesan1')}}"> <i class="menu-icon ti-email"></i>Pesan </a>
    </li>
</ul>

@elseif(auth()->user()->level =="user")
<ul class="nav navbar-nav">
    <li class="active">
        <a href="{{url('home')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
    </li>

    <h3 class="menu-title">Broadcast</h3><!-- /.menu-title -->

    <li>
        <a href="{{url('data1')}}"> <i class="menu-icon fa fa-users"></i>Data Broadcast </a>
    </li>
    <li>
        <a href="{{url('pesan')}}"> <i class="menu-icon ti-email"></i>Pesan </a>
    </li>
</ul>

@endif