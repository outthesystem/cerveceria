@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Editando producto {{$product->name}}</title>
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
              <div class="col-sm-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Registros de movimientos <small>{{$regstocks->count()}}</small></h3>
                    </div>
                    <div class="block-content">
                      <table class="table table-sm table-hover table-vcenter">
                          <thead>
                            <th>ID</th>
                            <th>Stock anterior</th>
                            <th>Modificacion</th>
                            <th>Stock nuevo</th>
                            <th>Motivo</th>
                          </thead>
                          <tbody>
                            @forelse ($regstocks as $r)
                              <tr
                              @if ($r->sum == 1)
                                class="table-success" data-toggle="tooltip" data-placement="bottom" data-original-title="Agregado"
                                @else
                                class="table-danger" data-toggle="tooltip" data-placement="bottom" data-original-title="Descontado"
                              @endif
                              >
                                <td>{{$r->id}}</td>
                                <td>{{$r->stock_old}}</td>
                                <td>{{$r->stock_modify}}</td>
                                <td>{{$r->stock_new}}</td>
                                <td>{!! $r->reason !!}</td>
                              </tr>
                            @empty
                              <tr>
                                <td colspan="7">No se han encontrado resultados.</td>
                              </tr>
                            @endforelse
                          </tbody>
                      </table>
                      @if ($product->is_cut != 1)
                        <form action="{{url('/invoiceb/updatestock/'.$product->id)}}" method="POST">
                          {{csrf_field()}}
                          <div class="form-group row">
                              <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="col-12" for="name">Stock actualizado</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="stock" name="stock">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4" for="name">Motivo</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="reason" name="reason" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                      <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </form>
                      @endif
                    </div>

                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                  <center>
                                  {!! $regstocks->links() !!}</center>
                              </div>

                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6 col-lg-6 ">
                  <form action="{{url('/product/update/'.$product->id)}}" method="post">
                  <div class="block">
                      <div class="block-header block-header-default">
                          <h3 class="block-title">Editando a <b>{{$product->name}}</b></h3>
                          <div class="block-options">
                            <a href="{{url('/product/index')}}" class="btn-block-option">
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
                              <label class="col-12" for="example-text-input">Categoria</label>
                              <div class="col-md-12">
                                <select class="js-select2 form-control" id="example-select2" name="category_id" style="width: 100%;" data-placeholder="Selecciona una categoria" autofocus required>
                                  <option></option>
                                      @foreach ($categories as $c)
                                        <option value="{{$c->id}}"
                                          @if ($product->category_id == $c->id)
                                            selected
                                          @endif
                                          >{{$c->name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                            <div class="form-group row">
                                <label class="col-12" for="name">Nombre</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12" for="description">Descripcion</label>
                                <div class="col-md-12">
                                  <textarea class="form-control" name="description" id="description" rows="8" cols="80">{{$product->description}}</textarea>
                                </div>
                            </div>

                            @if ($product->is_cut != 1)
                              <div class="form-group row">
                                  <label class="col-12" for="price">Stock</label>
                                  <div class="col-md-12">
                                      <input type="number" class="form-control" id="stock" name="stock" value="{{$product->stock}}" readonly>
                                  </div>
                              </div>
                            @endif

                            <div class="form-group row">
                                <label class="col-12" for="price">Precio</label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
                                </div>
                            </div>

                            @if ($product->is_cut == 1)
                              <div class="form-group row">
                                  <label class="col-12" for="price">Tiempo</label>
                                  <div class="col-md-12">
                                      <input type="text" class="form-control" id="time" name="time" value="{{$product->time}}">
                                  </div>
                              </div>
                            @endif

                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Opciones</label>
                                <div class="col-md-12">
                                  <div class="custom-control custom-checkbox mb-5">
                                          <input class="custom-control-input" type="checkbox" name="count_stock" id="count_stock" value="1"
                                          @if ($product->count_stock == 1)
                                            checked
                                          @endif
                                          >
                                          <label class="custom-control-label" for="count_stock">No controlar stock</label>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="custom-control custom-checkbox mb-5">
                                          <input class="custom-control-input" type="checkbox" name="is_cut" id="is_cut" value="1"
                                          @if ($product->is_cut == 1)
                                            checked
                                          @endif
                                          >
                                          <label class="custom-control-label" for="is_cut">Es un corte?</label>
                                      </div>
                                </div>
                            </div>

                      </div>
                      <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <div class="block-options text-right">
                          <a href="{{url('/product/index')}}" class="btn-block-option">
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
                <a class="block block-transparent text-center bg-gd-sun" href="{{url('/product/index#add_new_product')}}">
                    <div class="block-content">
                        <p class="mt-5">
                            <i class="si si-plus fa-4x text-white-op"></i>
                        </p>
                    </div>
                    <div class="block-content bg-black-op-5">
                        <p class="font-w600 text-white">Añadir producto</p>
                  </div>
                </a>
              </div>
              </div>
          <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      @include('backend.partials.footer.default')
  </div>
@endsection

@section('js')

@endsection
