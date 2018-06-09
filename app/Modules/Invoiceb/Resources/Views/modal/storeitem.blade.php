<div class="modal fade" id="storeItem{{$p->id}}" role="dialog" aria-labelledby="storeItem{{$p->id}}" aria-hidden="true">
  <form action="{{url('invoiceb/storeitem/'.$invoice->id)}}" method="POST" id="form">
    <input type="hidden" name="product_id" value="{{$p->id}}">
      <div class="modal-dialog modal-dialog-popout" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">Coloca la cantidad</h3>
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
                              <label class="col-12" for="example-text-input">Cantidad</label>
                              <div class="col-md-12">
                                  <input type="number" class="form-control" id="quantity" name="quantity" value="1" autofocus checked>
                              </div>
                          </div>
                        </div>
                    </div>
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
