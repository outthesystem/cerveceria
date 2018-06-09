@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Productos</title>
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
                          <h3 class="block-title">Categorias <small>{{$categories->count()}}</small></h3>
                      </div>
                      <div class="block-content">
                        <form action="{{url('/product/categories')}}" method="GET">
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
                              <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                              @forelse ($categories as $c)
                                <tr>
                                  <td>{{$c->id}}</td>
                                  <td>{{$c->name}}</td>
                                  <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{url('/product/editcategory/'.$c->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Editar">
                                        <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{url('/product/deletecategory/'.$c->id)}}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Eliminar">
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
                                    {!! $categories->links() !!}</center>
                                </div>
                  </div>
                </div>
                  <div class="col-sm-2 col-md-2 col-lg-2 col-lg-2">
                    <a class="block block-transparent text-center bg-gd-lake" href="{{url('/product/categories#add_new_category')}}" data-toggle="modal" data-target="#add_new_category">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-plus fa-4x text-white-op"></i>
                            </p>
                        </div>
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white">Añadir categoria</p>
                      </div>
                    </a>
                  </div>
              </div>
          </div>
          <!-- END Page Content -->

      </main>
      <!-- END Main Container -->
      @include('product::modal.createcategory')

      @include('backend.partials.footer.default')
  </div>
@endsection

@section('js')
  <script type="text/javascript">
  $(document).ready(function() {

  if(window.location.href.indexOf('#add_new_category') != -1) {
    $('#add_new_category').modal('show');
  }
  });
  </script>
@endsection
