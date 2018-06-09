@extends('frontend.layouts.master')

@section('title')
  <title> {{ env('APP_NAME') }} | asd</title>
@endsection

@section('view')
  <body class="index-page">

  <!-- Navbar will come here -->

  @include('frontend.partials.navbar.transparent')

  <!-- end navbar -->

  <div class="wrapper">
  	<div class="header">

  	</div>
  	<!-- you can use the class main-raised if you want the main area to be as a page with shadows -->

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">

        @include('frontend.views.home.content')

  		</div>
  	</div>
  </div>

  @include('frontend.partials.footer.simple-gray')

  </body>
@endsection

@section('js')

@endsection
