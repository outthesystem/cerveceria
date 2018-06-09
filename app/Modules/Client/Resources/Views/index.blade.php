@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Clientes</title>
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
                <div class="col-sm-12 col-md-10 col-xl-10">
                  <div class="block">
                      <div class="block-header block-header-default">
                          <h3 class="block-title">Clientes <small>{{$clients->count()}}</small></h3>
                      </div>
                      <div class="block-content">
                        <form action="{{url('/client/index')}}" method="GET">
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
                              <th>Nombre</th>
                              <th>Telefono</th>
                              <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                              @forelse ($clients as $c)
                                <tr>
                                  <td>{{$c->id}}</td>
                                  <td>{{$c->name}}</td>
                                  <td>{{$c->phone}}</td>
                                  <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{url('/client/edit/'.$c->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Editar">
                                        <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{url('/client/delete/'.$c->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Eliminar">
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
                                    {!! $clients->links() !!}</center>
                                </div>
                  </div>
                </div>
                  <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                    <a class="block block-transparent text-center bg-gd-lake" href="{{url('/client/index#add_new_client')}}" data-toggle="modal" data-target="#add_new_client">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-plus fa-4x text-white-op"></i>
                            </p>
                        </div>
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white">Añadir cliente</p>
                      </div>
                    </a>
                  </div>
              </div>
          </div>
          <!-- END Page Content -->

      </main>
      <!-- END Main Container -->
      @include('client::modal.create')

      @include('backend.partials.footer.default')
  </div>
@endsection

@section('js')
  <script type="text/javascript">
  $(document).ready(function() {

  if(window.location.href.indexOf('#add_new_client') != -1) {
    $('#add_new_client').modal('show');
  }
  });
  </script>
@endsection
