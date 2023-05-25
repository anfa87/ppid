<!-- Sidebar -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav collapse navbar-collapse">

        <ul class="nav">
            
            <li>
                <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li> 
                <a href="/dashboard/information" class="{{ Request::is('dashboard/information*') ? 'active' : '' }} "><i class="fa fa-file fa-fw" aria-hidden="true"></i> Informasi Publik</a>
            </li>
            <li>
                <a href="/dashboard/division" class="{{ Request::is('dashboard/division*') ? 'active' : '' }} " ><i class="fa fa-briefcase fa-fw" aria-hidden="true"></i> Data Bidang</a>
            </li>
            <li>
                <a href="/dashboard/demand" class="{{ Request::is('dashboard/demand*') ? 'active' : '' }} "><i class="fa fa-file-text fa-fw"></i> Permohonan Informasi</a>
            </li>
            @can('super_admin')
            <li>
                <a href="/dashboard/users" class="{{ Request::is('dashboard/users*') ? 'active' : '' }} "><i class="fa fa-users fa-fw"></i> Users</a>
            </li>
            @endcan
           
        </ul>

    </div>
</div>