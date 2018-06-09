<div class="modal fade" id="add_new_user" tabindex="-1" role="dialog" aria-labelledby="add_new_user" aria-hidden="true">
  <form action="{{url('/user')}}" method="POST" id="form">
      <div class="modal-dialog modal-dialog-popout" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">Agregar usuario</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="si si-close"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content">
                    {{csrf_field()}}
                      <div class="form-group row">
                          <label class="col-12" for="example-text-input">Nombre</label>
                          <div class="col-md-12">
                              <input type="text" class="form-control" id="name" name="name" autofocus>
                              <div class="form-text text-muted">Nombre de pila del usuario.</div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-12" for="example-text-input">Email</label>
                          <div class="col-md-12">
                              <input type="email" class="form-control" id="email" name="email">
                              <div class="form-text text-muted">Email, lo usara para ingresar.</div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-12">Roles</label>
                          <div class="col-12">
                            @forelse ($roles as $role)
                              <div class="custom-control custom-checkbox mb-5">
                                  <input class="custom-control-input" type="checkbox" name="roles[]" id="{{$role->id}}" value="{{$role->id}}" >
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
              </div>
              <div class="modal-footer">
                  <a href="#" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</a>
                  <button type="submit" class="btn btn-alt-success">
                      <i class="fa fa-check"></i> Crear
                  </button>
              </div>
          </div>
      </div>
    </form>
  </div>
