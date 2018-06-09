@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Editando cliente {{$client->name}}</title>
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
              <div class="col-sm-12 col-md-6 col-lg-6 col-lg-6 ">
                  <form action="{{url('/client/update/'.$client->id)}}" method="post">
                  <div class="block">
                      <div class="block-header block-header-default">
                          <h3 class="block-title">Editando a <b>{{$client->name}}</b></h3>
                          <div class="block-options">
                            <a href="{{url('/client/index')}}" class="btn-block-option">
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
                                <label class="col-12" for="example-text-input">Nombre</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$client->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Telefono</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$client->phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Observaciones</label>
                                <div class="col-md-12">
                                  <textarea name="observaciones" class="form-control" rows="8" cols="80">{{$client->observaciones}}</textarea>
                                </div>
                            </div>
                      </div>
                      <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <div class="block-options text-right">
                          <a href="{{url('/client/index')}}" class="btn-block-option">
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
                <a class="block block-transparent text-center bg-gd-sun" href="{{url('/client/index#add_new_client')}}">
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
          <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      @include('backend.partials.footer.default')
  </div>
@endsection

@section('js')

@endsection
