@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Ingresar</title>
@endsection

@section('view')
  <div id="page-container" class="main-content-boxed">
           <!-- Main Container -->
           <main id="main-container">
               <!-- Page Content -->
               <div class="bg-image" style="background-image: url('{{asset('backend/img/photos/photo34@2x.jpg')}}');">
                   <div class="row mx-0 bg-black-op">
                       <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                           <div class="p-30 invisible" data-toggle="appear">
                               <p class="font-size-h3 font-w600 text-white">
                                   Get Inspired and Create.
                               </p>
                               <p class="font-italic text-white-op">
                                   Copyright &copy; <span class="js-year-copy">2017</span>
                               </p>
                           </div>
                       </div>
                       <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                           <div class="content content-full">
                               <!-- Header -->
                               <div class="px-30 py-10">
                                   <a class="link-effect font-w700" href="{{url('/')}}">
                                       <i class="si si-fire"></i>
                                       <span class="font-size-xl text-primary-dark">base</span><span class="font-size-xl">2018</span>
                                   </a>
                                   <h1 class="h3 font-w700 mt-30 mb-10">bienvenido</h1>
                                   <h2 class="h5 font-w400 text-muted mb-0">por favor ingresa tus credenciales</h2>
                               </div>
                               <!-- END Header -->

                               <!-- Sign In Form -->
                               <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
                               <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                               <form class="js-validation-signin px-30" action="{{url('authenticate')}}" method="post">
                                 {{csrf_field()}}
                                   <div class="form-group row">
                                       <div class="col-12">
                                           <div class="form-material floating">
                                               <input type="text" class="form-control" id="login-username" name="email">
                                               <label for="login-username">Email</label>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="form-group row">
                                       <div class="col-12">
                                           <div class="form-material floating">
                                               <input type="password" class="form-control" id="login-password" name="password">
                                               <label for="login-password">Contraseña</label>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="form-group row">
                                       <div class="col-12">
                                           <div class="custom-control custom-checkbox">
                                               <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                               <label class="custom-control-label" for="login-remember-me">Recuerdame</label>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                           <i class="si si-login mr-10"></i> Ingresar
                                       </button>
                                       <div class="mt-30">
                                           <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{url('/register')}}">
                                               <i class="fa fa-plus mr-5"></i> Crear cuenta
                                           </a>
                                           <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="op_auth_reminder2.html">
                                               <i class="fa fa-warning mr-5"></i> Olvidé mi contraseña
                                           </a>

                                       </div>
                                   </div>
                               </form>
                               <!-- END Sign In Form -->
                           </div>
                       </div>
                   </div>
               </div>
               <!-- END Page Content -->
           </main>
           <!-- END Main Container -->
       </div>

@endsection

@section('js')

@endsection
