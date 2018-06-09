@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Editando a {{$user->name}}</title>
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
              <div class="col-sm-12 col-md-6 col-lg-6 col-lg-6 ">
                  <form action="{{url('/user/'.$user->id)}}" method="post">
                  <div class="block">
                      <div class="block-header block-header-default">
                          <h3 class="block-title">Editando a <b>{{$user->name}}</b></h3>
                          <div class="block-options">
                            <a href="{{url('/users')}}" class="btn-block-option">
                              <i class="fa fa-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn-block-option">
                                <i class="fa fa-check"></i> Guardar
                            </button>
                          </div>
                      </div>
                      <div class="block-content">
                          {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Nombre</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                    <div class="form-text text-muted">Nombre de pila del usuario.</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Email</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                    <div class="form-text text-muted">Email, lo usara para ingresar.</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Roles</label>
                                <div class="col-12">
                                  @forelse ($roles as $role)
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input class="custom-control-input" type="checkbox" name="roles[]" id="{{$role->id}}" value="{{$role->id}}"
                                        @foreach ($assigned_roles as $roleasigned)
                                          @if ($role->name == $roleasigned)
                                            checked
                                          @endif
                                        @endforeach>
                                        <label class="custom-control-label" for="{{$role->id}}">{{ucfirst($role->name)}}</label>
                                    </div>
                                    @empty
                                      No hay roles disponibles. <a href="{{url('/roles')}}" target="_blank">Cargalos ahora</a>.
                                  @endforelse
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Contraseña</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <div class="form-text text-muted">Contraseña, al menos 6 caracteres.</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Confirmar contraseña</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>
                      </div>
                      <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <div class="block-options text-right">
                          <a href="{{url('/users')}}" class="btn-block-option">
                            <i class="fa fa-arrow-left"></i> Volver
                          </a>
                          <button type="submit" class="btn-block-option">
                              <i class="fa fa-check"></i> Guardar
                          </button>
                        </div>
                      </div>
                  </div>
                </form>
              </div>
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
          <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

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
