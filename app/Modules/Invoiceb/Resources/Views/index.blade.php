@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Facturas</title>
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
                <div class="col-sm-12 col-md-12 col-xl-12">
                  <div class="block">
                      <div class="block-header block-header-default">
                          <h3 class="block-title">Facturas <small>{{$invoices->count()}}</small></h3>
                      </div>
                      <div class="block-content">
                        <form action="{{url('/invoice/index')}}" method="GET">
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
                        <table class="table table-sm table-hover table-vcenter">
                            <thead>
                              <th>ID</th>
                              <th>Nombre del cliente</th>
                              <th>Total</th>
                              <th>Tiempo total de demora</th>
                              <th>Observaciones</th>
                              <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                              @forelse ($invoices as $i)
                                <tr
                                @if ($i->paid == 1)
                                  class="table-primary" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$i->date_paid}}"
                                  @else
                                    class="table-warning" data-toggle="tooltip" data-placement="bottom" data-original-title="Aun esta pendiente"

                                @endif
                                >
                                  <td>{{$i->id}}</td>
                                  <td>{{$i->name}} | {{$i->phone}}</td>
                                  <td>${{ number_format($i->total, 2) }}</td>
                                  <td>
                                    <b>{{$i->time_total}} minutos.</b>
                                  </td>
                                  <td>{{$i->observaciones}}</td>
                                  <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{url('/invoiceb/edit/'.$i->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Editar">
                                        <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{url('/invoiceb/delete/'.$i->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <i class="fa fa-times"></i>
                                        </a>
                                    </div>
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
                      <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    <center>
                                    {!! $invoices->links() !!}</center>
                                </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-xl-12">
                  <div class="block block-themed block-rounded">
                      <div class="block-header block-header-default bg-pulse">
                          <h3 class="block-title">Reservaciones <small>{{$reservations->count()}}</small></h3>
                      </div>
                      <div class="block-content">
                        <form action="{{url('/invoice/index')}}" method="GET">
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
                        <table class="table table-sm table-hover table-vcenter">
                            <thead>
                              <th>ID</th>
                              <th>Nombre del cliente</th>
                              <th>Total</th>
                              <th>Fecha de reserva</th>
                              <th>Observaciones</th>
                              <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                              @forelse ($reservations as $r)
                                <tr
                                >
                                  <td>{{$r->id}}</td>
                                  <td>{{$r->name}} | {{$r->phone}}</td>
                                  <td>${{ number_format($r->total, 2) }}</td>
                                  <td>
                                    <b>{{$r->date_reservation}} | {{$r->hour_reservation}}</b>
                                  </td>
                                  <td>{{$i->observaciones}}</td>
                                  <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{url('/invoiceb/edit/'.$r->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Editar">
                                        <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{url('/invoiceb/delete/'.$r->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <i class="fa fa-times"></i>
                                        </a>
                                    </div>
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
                      <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    <center>
                                    {!! $invoices->links() !!}</center>
                                </div>
                  </div>
                </div>
                  <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                    <a class="block block-transparent text-center bg-gd-lake" href="{{url('/invoiceb/create_step1#step1')}}">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-plus fa-4x text-white-op"></i>
                            </p>
                        </div>
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white">Añadir factura</p>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                    <a class="block block-transparent text-center bg-gd-pulse" href="{{url('/invoiceb/create_reservation#create_reservation')}}">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-clock fa-4x text-white-op"></i>
                            </p>
                        </div>
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white">Añadir reservacion</p>
                      </div>
                    </a>
                  </div>
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
