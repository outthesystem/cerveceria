<div class="modal fade" id="add_new_product" role="dialog" aria-labelledby="add_new_product" aria-hidden="true">
  <form action="{{url('/product/store')}}" method="POST" id="form">
      <div class="modal-dialog modal-dialog-popout" role="document">
          <div class="modal-content">
              <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">Agregar producto</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                              <i class="si si-close"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Categoria</label>
                        <div class="col-md-12">
                          <select class="js-select2 form-control" id="example-select2" name="category_id" style="width: 100%;" data-placeholder="Selecciona una categoria" autofocus required>
                            <option></option>
                                @foreach ($categories as $c)
                                  <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Nombre</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="name" name="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Descripcion</label>
                        <div class="col-md-12">
                          <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Stock</label>
                        <div class="col-md-12">
                            <input type="number" class="form-control" id="stock" name="stock">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Precio</label>
                        <div class="col-md-12">
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Opciones</label>
                        <div class="col-md-12">
                          <div class="custom-control custom-checkbox mb-5">
                                  <input class="custom-control-input" type="checkbox" name="count_stock" id="count_stock" value="1">
                                  <label class="custom-control-label" for="count_stock">No controlar stock</label>
                              </div>
                        </div>
                        <div class="col-md-12">
                          <div class="custom-control custom-checkbox mb-5">
                                  <input class="custom-control-input" type="checkbox" name="is_cut" id="is_cut" value="1">
                                  <label class="custom-control-label" for="is_cut">Es un corte?</label>
                              </div>
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
