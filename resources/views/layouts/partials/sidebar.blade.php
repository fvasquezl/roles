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

          @can('posts.create')
          <li class="nav-item">

            @if(request()->is('admin/posts/*'))
                <a href="{{route('admin.posts.index','#create')}}"
                class = "{{(request()->is('admin/posts/create') ? 'nav-link active' :  'nav-link')}}">
                    <i class="fas fa-plus-square"></i>
                <p>
                    CREAR PUBLICACION
                </p>
                </a>
            @else
            <a href="#" data-toggle="modal" data-target="#myModal"
            class = "{{(request()->is('admin/posts/create') ? 'nav-link active' :  'nav-link')}}">
                <i class="fas fa-plus-square"></i>
            <p>
                CREAR PUBLICACION
            </p>
            </a>
            @endif
          </li>
          @endcan

        <li class="nav-header">MENU</li>

        @can('posts.index')
        <li class="nav-item">
          <a href="{{ route('admin.posts.index') }}" class = "{{(request()->is('admin/posts') ? 'nav-link active' :  'nav-link')}}">
            <i class="fas fa-pencil-alt"></i>
            <p>
              Publicaciones
            </p>
          </a>
        </li>
        @endcan

        @can('categories.index')
        <li class="nav-item">
          <a href="{{ route('admin.categories.index') }}" class = "{{(request()->is('admin/categories') ? 'nav-link active' :  'nav-link')}}">
            <i class="fas fa-clipboard-check"></i>
            <p>
              Categorias
            </p>
          </a>
        </li>
        @endcan
        <li class="nav-header">PERMISOS</li>
        @can('users.index')
        <li class="nav-item">
          <a href="{{ route('admin.users.index') }}" class = "{{(request()->is('admin/permissions') ? 'nav-link active' :  'nav-link')}}">
            <i class="fas fa-users-cog"></i>
            <p>
              Usuarios
            </p>
          </a>
        </li>
        @endcan
        @can('departments.index')
        <li class="nav-item">
          <a href="{{ route('admin.departments.index') }}" class = "{{(request()->is('admin/departments') ? 'nav-link active' :  'nav-link')}}">
            <i class="fas fa-id-card-alt"></i>
            <p>
              Departamentos
            </p>
          </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="nav-item">
          <a href="{{ route('admin.roles.index') }}" class = "{{(request()->is('admin/roles') ? 'nav-link active' :  'nav-link')}}">
            <i class="fas fa-user-secret"></i>
            <p>
              Roles
            </p>
          </a>
        </li>
        @endcan
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
