@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Dashboard</title>
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
              <div class="block">
                  <div class="block-header block-header-default">
                      <h3 class="block-title">Dashboard <small>yeah</small></h3>
                  </div>
                  <div class="block-content">
                  </div>
              </div>
          </div>
          <!-- END Page Content -->

      </main>
      <!-- END Main Container -->

      @include('backend.partials.footer.default')
  </div>
@endsection
