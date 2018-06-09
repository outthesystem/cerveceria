@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Editando factura de {{$invoice->client->name}}</title>
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
                <div class="col-sm-9">
                  <div class="block block-themed block-rounded">
                      <div class="block-header bg-primary-dark">
                          <h3 class="block-title">Selecciona los productos</h3>
                      </div>
                      <div class="block-content">
                        <form action="{{url('/invoiceb/edit/'.$invoice->id)}}" method="GET">
                          <div class="form-group row">
                              <div class="col-sm-12">
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
                        <div class="row">
                          @forelse ($products as $p)
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                              <a class="block block-transparent text-center
                              @if ($p->is_cut == 1)
                                bg-primary
                                @else
                                  bg-success
                              @endif
                              " data-toggle="modal" data-target="#storeItem{{$p->id}}">
                                  <div class="block-content">
                                      <p class="mt-5">
                                        @if ($p->is_cut != 1)
                                          <i class="si si-basket fa-4x text-white-op"></i>
                                          @else
                                          <i class="si si-moustache fa-4x text-white-op"></i>
                                        @endif
                                      </p>
                                      <p class="font-w600 text-white">
                                        <b>
                                          {{$p->category->name}}
                                        </b>
                                        <br>
                                        {{$p->name}}
                                        <br>
                                        @if ($p->count_stock != 1)
                                             Stock: {{$p->stock}}
                                        @endif
                                        @if ($p->is_cut == 1)
                                           Tiempo: {{$p->time}} minutos
                                        @endif
                                        <br>
                                        <b>
                                          ${{ number_format($p->price, 2) }}
                                        </b>
                                      </p>
                                  </div>
                              </a>
                            </div>
                            @include('invoiceb::modal.storeItem')
                          @empty
                            <div class="col-sm-12">
                              <a class="block block-transparent text-center bg-warning" href="{{url('invoiceb/edit/'.$invoice->id)}}">
                                  <div class="block-content">
                                      <p class="mt-5">
                                          <i class="si si-dislike fa-4x text-white-op"></i>
                                      </p>
                                      <p class="font-w600 text-white">
                                      No se han encontrado resultados.
                                      </p>
                                  </div>
                              </a>
                            </div>
                          @endforelse
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                  <div class="block block-themed block-rounded">
                      <div class="block-header bg-gd-sea">
                          <h3 class="block-title">
                            <b>
                              {{$invoice->client->name}}
                            </b>
                          </h3>
                          <div class="block-options">
                              <button type="button" class="btn-block-option">
                                  <i class="si si-user"></i>
                              </button>
                          </div>
                      </div>
                      <div class="block-content">
                        <a class="block block-link-shadow text-center" onclick="$('#update_client').modal('show');">
                            <div class="block-content">
                                <p class="mt-5">
                                    <i class="si si-refresh fa-4x text-danger"></i>
                                </p>
                                <p class="font-w600">Cambiar cliente</p>
                            </div>
                        </a>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="block block-themed block-rounded">
                      <div class="block-header bg-pulse">
                          <h3 class="block-title">
                            <b>
                              Detalles de la factura
                            </b>
                          </h3>
                          <div class="block-options">
                              <button type="button" class="btn-block-option">
                                  <i class="si si-basket"></i>
                              </button>
                          </div>
                      </div>
                      <div class="block-content">
                        <a class="block block-link-shadow text-center">
                            <div class="block-content">
                              <table class="table table-sm table-hover table-vcenter">
                                  <thead>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Precio unit.</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th class="text-center">Acciones</th>
                                  </thead>
                                  <tbody>
                                    @forelse ($invoice->items as $i)
                                      <tr>
                                        <td>{{$i->id}}</td>
                                        <td>{{$i->product->name}}</td>
                                        <td>${{ number_format($i->price, 2) }}</td>
                                        <td>{{$i->quantity}}</td>
                                        <td>${{ number_format($i->total, 2) }}</td>
                                        <td class="text-center">
                                          @if ($invoice->paid == 1)
                                            Esta factura esta abonada, debes
                                            <a href="{{url('invoiceb/cancelinvoice/'.$invoice->id)}}">editar la factura</a>
                                             para eliminar lineas.
                                            @else
                                              <div class="btn-group">
                                                  <a class="btn btn-sm btn-secondary"
                                                    data-toggle="modal" data-target="#deleteItem{{$i->id}}">
                                                    <i class="fa fa-times"></i>
                                                  </a>
                                              </div>
                                          @endif
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
                            <h2>Total: ${{ number_format($invoice->total, 2) }}</h2>

                        </a>
                        <div class="row">
                          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <a class="block block-transparent text-center bg-info" href="{{url('/invoiceb/create_step1#step1')}}">
                                <div class="block-content">
                                    <p class="mt-5">
                                        <i class="si si-bag fa-4x text-white"></i>
                                    </p>
                                    <p class="font-w600 text-white">Crear otra factura</p>
                                </div>
                            </a>
                          </div>
                          @if ($invoice->paid == 1)
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                              <a class="block block-transparent text-center bg-warning" href="{{url('invoiceb/cancelinvoice/'.$invoice->id)}}">
                                  <div class="block-content">
                                      <p class="mt-5">
                                          <i class="si si-refresh  fa-4x text-white"></i>
                                      </p>
                                      <p class="font-w600 text-white">Editar factura</p>
                                  </div>
                              </a>
                            </div>
                            @else
                              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <a class="block block-transparent text-center bg-success" href="{{url('invoiceb/paidinvoice/'.$invoice->id)}}">
                                    <div class="block-content">
                                        <p class="mt-5">
                                            <i class="si si-check  fa-4x text-white"></i>
                                        </p>
                                        <p class="font-w600 text-white">Pagar factura</p>
                                    </div>
                                </a>
                              </div>
                          @endif
                        </div>
                      </div>

                  </div>
                </div>
              </div>
          </div>
          <!-- END Page Content -->

      </main>
      <!-- END Main Container -->
      @include('invoiceb::modal.updateclient')

      @foreach ($invoice->items as $ii)
        @include('invoiceb::modal.deleteItem')
      @endforeach


      @include('backend.partials.footer.default')
  </div>
@endsection

@section('js')

@endsection
