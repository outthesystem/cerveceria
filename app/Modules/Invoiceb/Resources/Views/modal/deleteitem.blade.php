<div class="modal fade" id="deleteItem{{$ii->id}}" role="dialog" aria-labelledby="deleteItem{{$ii->id}}" aria-hidden="true">
  <form action="{{url('invoiceb/deleteitem/'.$ii->id)}}" method="POST" id="form">
      <div class="modal-dialog modal-dialog-popout" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">Seguro de eliminar esta linea?</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="si si-close"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-md-12">
                          <div class="form-group row">
                              <label class="col-12" for="example-text-input">Motivo</label>
                              <div class="col-md-12">
                                  <input type="text" class="form-control" id="reason" name="reason" autofocus>
                              </div>
                          </div>
                        </div>
                    </div>
                    @if ($ii->product->is_cut != 1)
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Opciones</label>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox mb-5">
                                    <input class="custom-control-input" type="checkbox" name="return_stock" id="return_stock" value="1" checked>
                                    <label class="custom-control-label" for="return_stock">Devolver stock</label>
                            </div>
                        </div>
                    </div>
                  @endif
                  </div>
              </div>
              <div class="modal-footer">
                  <a href="#" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</a>
                  <button type="submit" class="btn btn-alt-success">
                      <i class="fa fa-check"></i> Guardar
                  </button>
              </div>
          </div>
      </div>
    </form>
  </div>
