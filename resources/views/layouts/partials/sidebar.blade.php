<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link">
    <img src="{{asset('img/password.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">MENU</li>

        <li class="nav-item has-treeview {{(request()->is('admin/posts') ? 'menu-open' :  '')}}">
          <a href="#"class="nav-link">
            <i class="fas fa-thumbs-up nav-icon"></i>
            <p>
              Publicaciones
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.posts.index') }}" class="{{ setActiveRoute('admin.posts.index')}}">
                <i class="fa fa-address-card nav-icon"></i>
                <p>Todas las publicaciones</p>
              </a>
            </li>
            <li class="nav-item">
              @if(request()->is('admin/posts/*'))
              <a href="{{route('admin.posts.index','#create')}}"
                class="nav-link">
                <i class="fas fa-edit nav-icon"></i>
                <p>
                  Crear publicacion
                </p>
              </a>
              @else
              <a href="#" data-toggle="modal" data-target="#myModal"
                class="nav-link">
                <i class="fas fa-edit nav-icon"></i>
                <p>
                  Crear publicacion
                </p>
              </a>
              @endif
            </li>
          </ul>
        </li>


        <li class="nav-header">USUARIOS</li>

        <li class="nav-item has-treeview {{(request()->is('admin/users*') ? 'menu-open' :  '')}}">
          <a href="#" class="nav-link">
            <i class="fas fa-user-circle nav-icon"></i>
           
            <p>
              Usuarios
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.users.index') }}" class="{{ setActiveRoute('admin.users.index')}}">
                <i class="fas fa-users nav-icon"></i>
                
                <p>Todos los usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.users.create')}}"
                class="{{ setActiveRoute('admin.users.create')}}">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>
                  Crear usuario
                </p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-header">ACCIONES</li>

        <li class="nav-item">
          <a href="{{ route('admin.categories.index') }}" class="{{ setActiveRoute('admin.categories.index')}}">
            <i class="fas fa-clipboard-check nav-icon"></i>
            <p>
              Categorias
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.departments.index') }}" class="{{ setActiveRoute('admin.departments.index')}}">
            <i class="fas fa-id-card-alt nav-icon"></i>
            <p>
              Departamentos
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.roles.index') }}" class="{{ setActiveRoute('admin.roles.index')}}">
            <i class="fas fa-user-secret nav-icon"></i>
            <p>
              Roles
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.permissions.index') }}" class="{{ setActiveRoute('admin.permissions.index')}}">
            <i class="fas fa-key nav-icon"></i>
            <p>
              Permissions
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>