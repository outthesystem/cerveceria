@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Usuarios</title>
@endsection

@section('view')
  <div id="page-container" class="sidebar-o side-scroll sidebar-inverse page-header-modern main-content-boxed">

      @include('backend.partials.aside.default')

      @include('backend.partials.sidebar.default')

      @include('backend.partials.navbar.default')

      <!-- Main Container -->
      <main id="main-container">
          <!-- Page Content -->
          <div class="content">
            <div class="row">
              <div class="col-12 col-sm-12">
                <a class="block block-link-shadow">
                  <div class="block">
                      <div class="block-header block-header-default">
                          <h3 class="block-title">Usuarios <small>{{$users->count()}}</small></h3>
                      </div>
                      <div class="block-content">
                        <form action="{{url('/users')}}" method="GET">
                          <div class="form-group row">
                              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <button type="button" class="btn btn-secondary">
                                                              <i class="fa fa-search"></i> Buscar
                                                          </button>
                                      </div>
                                      <input type="text" class="form-control" id="example-input1-group2" name="search" placeholder="Buscar..." value="{{$search}}" autofocus>
                                  </div>
                              </div>
                          </div>
                        </form>
                        <table class="table table-sm table-hover table-vcenter">
                            <thead>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>Roles</th>
                              <th>Creado</th>
                              <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                              @forelse ($users as $u)
                                <tr>
                                  <td>{{$u->id}}</td>
                                  <td>{{$u->name}}</td>
                                  <td>{{$u->email}}</td>
                                  <td>{{$u->roles()->pluck('name')->implode(' ') }}</td>
                                  <td>{{$u->created_at}}</td>
                                  <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{url('/user/'.$u->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Editar">
                                        <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{url('/deleteuser/'.$u->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                  </td>
                                </tr>
                              @empty
                                <tr>
                                  <td colspan="7">No se han encontrado resultados.</td>
                                </tr>
                              @endforelse
                            </tbody>
                        </table>
                      </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                <a class="block block-transparent text-center bg-gd-lake" href="{{url('/users#add_new_user')}}" data-toggle="modal" data-target="#add_new_user">
                    <div class="block-content">
                        <p class="mt-5">
                            <i class="si si-user-follow fa-4x text-white-op"></i>
                        </p>
                    </div>
                    <div class="block-content bg-black-op-5">
                        <p class="font-w600 text-white">Añadir usuario</p>
                  </div>
                </a>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                <a class="block block-transparent text-center bg-gd-dusk" href="{{url('/permissions#add_new_permission')}}">
                    <div class="block-content">
                        <p class="mt-5">
                            <i class="si si-lock fa-4x text-white-op"></i>
                        </p>
                    </div>
                    <div class="block-content bg-black-op-5">
                        <p class="font-w600 text-white">Añadir permiso</p>
                  </div>
                </a>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                <a class="block block-transparent text-center bg-gd-sun" href="{{url('/roles#add_new_role')}}">
                    <div class="block-content">
                        <p class="mt-5">
                            <i class="si si-list fa-4x text-white-op"></i>
                        </p>
                    </div>
                    <div class="block-content bg-black-op-5">
                        <p class="font-w600 text-white">Añadir rol</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- END Page Content -->

      </main>
      <!-- END Main Container -->

      @include('backend.partials.widgets.modals.auth.createuser')

        <!-- END Pop Out Modal -->
      @include('backend.partials.footer.default')
  </div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {

if(window.location.href.indexOf('#add_new_user') != -1) {
  $('#add_new_user').modal('show');
}

});
</script>
@endsection
