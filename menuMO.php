
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: <?php echo $_SESSION["nombre" ]== "Ofelia"?  "#efbbcc": "#1d2951" ; ?>;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="MO">
        <div class="sidebar-brand-icon">
            <span><i class="fas fa-restroom"></i></span>
        </div>
        <div class="sidebar-brand-text mx-3">Crud Personas</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administración
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Prospectos</span>
        </a>
        <div id="collapseTwo" style="transition:0.8s;" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded" >
                <a class="collapse-item" href="MO-formulario.php">Nuevo prospecto</a>
                <a class="collapse-item" href="MO.php">Listado de prospectos</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>