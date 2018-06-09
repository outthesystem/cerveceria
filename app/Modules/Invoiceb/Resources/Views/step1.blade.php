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

                </div>
              </div>
          </div>
          <!-- END Page Content -->

      </main>
      <!-- END Main Container -->

      @include('invoiceb::modal.step1')
      

      @include('backend.partials.footer.default')
  </div>
@endsection

@section('js')
  <script type="text/javascript">
  $(document).ready(function() {

  if(window.location.href.indexOf('#step1') != -1) {
    $('#step1').modal('show');
  }
  });
  </script>
@endsection
