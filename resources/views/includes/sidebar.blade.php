<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>

<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <div class="input-group-append">
            <div class="container" style="padding:20px;color:white;">
            <i class="fal fa-user"></i>&nbsp;&nbsp;<span>{{ Auth::user()->email }}<span>
            </div>
          </div>
        </div>
      </div>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Manage Asset Types 
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/home/addAssetType" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Asset Types</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="/home/showAssetType" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Show Asset Types</p>
                    </a>
                    </li>
                    <li class="nav-item">
                      <a href="/home/listAssetType" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Asset Types</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Manage Asset
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/home/addAsset" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Assets </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/home/showAsset" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Assets</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/home/listAsset" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Assets</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Manage Asset
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/home/addAsset" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Assets </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/home/showAsset" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show Assets</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/home/listAsset" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Assets</p>
                      </a>
                    </li>
                  </ul>
                </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
</div>