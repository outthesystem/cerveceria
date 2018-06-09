@extends('backend.layouts.master')

@section('title')
  <title>{{env('APP_NAME')}} | Registrarse</title>
@endsection

@section('view')
  <div id="page-container" class="main-content-boxed">
             <!-- Main Container -->
             <main id="main-container">
                 <!-- Page Content -->
                 <div class="bg-gd-emerald">
                     <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                         <!-- Header -->
                         <div class="py-30 px-5 text-center">
                             <a class="link-effect font-w700" href="index.html">
                                 <i class="si si-fire"></i>
                                 <span class="font-size-xl text-primary-dark">base</span><span class="font-size-xl">2018</span>
                             </a>
                             <h1 class="h2 font-w700 mt-50 mb-10">Crea tu usuario</h1>
                             <h2 class="h4 font-w400 text-muted mb-0">Por favor rellena los siguientes campos</h2>
                         </div>
                         <!-- END Header -->

                         <!-- Sign Up Form -->
                         <div class="row justify-content-center px-5">
                             <div class="col-sm-8 col-md-6 col-xl-4">
                                 <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.js) -->
                                 <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                 <form class="js-validation-signup" action="{{url('/signup')}}" method="post">
                                   {{csrf_field()}}
                                     <div class="form-group row">
                                         <div class="col-12">
                                             <div class="form-material floating">
                                                 <input type="text" class="form-control" id="signup-username" name="name">
                                                 <label for="signup-username">Nombre</label>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="col-12">
                                             <div class="form-material floating">
                                                 <input type="email" class="form-control" id="signup-email" name="email">
                                                 <label for="signup-email">Email</label>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="col-12">
                                             <div class="form-material floating">
                                                 <input type="password" class="form-control" id="signup-password" name="password">
                                                 <label for="signup-password">Contraseña</label>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="col-12">
                                             <div class="form-material floating">
                                                 <input type="password" class="form-control" id="signup-password-confirm" name="signup-password-confirm">
                                                 <label for="signup-password-confirm">Confirmar contraseña</label>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group row text-center">
                                         <div class="col-12">
                                             <label class="css-control css-control-primary css-checkbox">
                                                 <input type="checkbox" class="css-control-input" id="signup-terms" name="signup-terms">
                                                 <span class="css-control-indicator"></span>
                                                 Acepto los terminos y condiciones
                                             </label>
                                         </div>
                                     </div>
                                     <div class="form-group row gutters-tiny">
                                         <div class="col-12 mb-10">
                                             <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success">
                                                 <i class="si si-user-follow mr-10"></i> Registrarse
                                             </button>
                                         </div>
                                         <div class="col-6">
                                             <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="#" data-toggle="modal" data-target="#modal-terms">
                                                 <i class="si si-book-open text-muted mr-10"></i> Lee nuestro terminos
                                             </a>
                                         </div>
                                         <div class="col-6">
                                             <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="{{url('/login')}}">
                                                 <i class="si si-login text-muted mr-10"></i> Iniciar sesion
                                             </a>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                         <!-- END Sign Up Form -->
                     </div>
                 </div>
                 <!-- END Page Content -->
             </main>
             <!-- END Main Container -->
         </div>
         <!-- END Page Container -->

         <!-- Terms Modal -->
         <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
             <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
                 <div class="modal-content">
                     <div class="block block-themed block-transparent mb-0">
                         <div class="block-header bg-primary-dark">
                             <h3 class="block-title">Terminos y condiciones</h3>
                             <div class="block-options">
                                 <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                     <i class="si si-close"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="block-content">
                             <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                             <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                             <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                             <i class="fa fa-check"></i> Perfect
                         </button>
                     </div>
                 </div>
             </div>
         </div>
         <!-- END Terms Modal -->

@endsection

@section('js')

@endsection
