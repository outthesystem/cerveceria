<div class="modal fade" id="add_new_role" tabindex="-1" role="dialog" aria-labelledby="add_new_role" aria-hidden="true">
  <form action="{{url('/role')}}" method="POST" id="form">
      <div class="modal-dialog modal-dialog-popout" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">Agregar rol</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="si si-close"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content">
                    {{csrf_field()}}
                      <div class="form-group row">
                          <label class="col-12" for="example-text-input">Nombre del rol</label>
                          <div class="col-md-12">
                              <input type="text" class="form-control" id="name" name="name" autofocus>
                              <div class="form-text text-muted">Nombre del rol a adminsitrar.</div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-12">Asigna este rol a los roles</label>
                          <div class="col-12">
                            @forelse ($permissions as $p)
                              <div class="custom-control custom-checkbox mb-5">
                                  <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$p->id}}" value="{{$p->id}}" >
                                  <label class="custom-control-label" for="{{$p->id}}">{{ucfirst($p->name)}}</label>
                              </div>
                              @empty
                                No hay roles disponibles. <a href="{{url('/permissions#add_new_permission')}}" target="_blank">Cargalos ahora</a>.
                            @endforelse
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
