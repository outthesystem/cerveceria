<div class="modal fade" id="add_new_client" role="dialog" aria-labelledby="add_new_client" aria-hidden="true">
  <form action="{{url('/client/store')}}" method="POST" id="form">
      <div class="modal-dialog modal-dialog-popout" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">Agregar cliente</h3>
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
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-12" for="example-text-input">Telefono</label>
                          <div class="col-md-12">
                              <input type="text" class="form-control" id="phone" name="phone">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-12" for="example-text-input">Observaciones</label>
                          <div class="col-md-12">
                            <textarea name="observaciones" class="form-control"></textarea>
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
