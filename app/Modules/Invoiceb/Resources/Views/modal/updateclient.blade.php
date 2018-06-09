<div class="modal fade" id="update_client" role="dialog" aria-labelledby="step1" aria-hidden="true">
  <form action="{{url('invoiceb/updateclient/'.$invoice->id)}}" method="POST" id="form">
      <div class="modal-dialog modal-dialog-popout" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">Seleccionar cliente</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="si si-close"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Buscar</label>
                        <div class="col-md-12">
                          <select class="js-select2 form-control" id="example-select2" name="client_id" style="width: 100%;" data-placeholder="Selecciona un cliente" required>
                            <option></option>
                                @foreach ($clients as $c)
                                  <option value="{{$c->id}}"
                                    @if ($c->id == $invoice->client_id)
                                      selected
                                    @endif
                                    >{{$c->name}} - {{$c->phone}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <a href="#" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</a>
                  <button type="submit" class="btn btn-alt-success">
                      <i class="fa fa-check"></i> Actualizar
                  </button>
              </div>
          </div>
      </div>
    </form>
  </div>
