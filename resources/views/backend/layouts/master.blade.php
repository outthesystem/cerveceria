<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        @yield('title')

        <meta name="description" content="{{env('HD_DESCRIPTION')}}">
        <meta name="author" content="{{env('HD_AUTHOR')}}">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="{{env('OG_TITLE')}}">
        <meta property="og:site_name" content="{{env('OG_SITE_NAME')}}">
        <meta property="og:description" content="{{env('OG_DESCRIPTION')}}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{url('/')}}">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('backend/img/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('backend/img/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/img/favicons/apple-touch-icon-180x180.png')}}">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="{{asset('backend/css/codebase.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/js/plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/js/plugins/select2/select2-bootstrap.min.css')}}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="backend/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Codebase() -> uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        @yield('view')
        <!-- END Page Container -->

        <!-- Codebase Core JS -->

        <script src="{{asset('backend/js/core/jquery.min.js')}}"></script>
        <script src="{{asset('backend/js/core/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/js/core/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('backend/js/core/jquery.scrollLock.min.js')}}"></script>
        <script src="{{asset('backend/js/core/jquery.appear.min.js')}}"></script>
        <script src="{{asset('backend/js/core/jquery.countTo.min.js')}}"></script>
        <script src="{{asset('backend/js/core/js.cookie.min.js')}}"></script>
        <script src="{{asset('backend/js/codebase.js')}}"></script>
        <script src="{{asset('backend/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
        <script src="{{asset('backend/js/plugins/select2/select2.full.min.js')}}"></script>

        <script type="text/javascript">
        @if (Session::has('error'))

            $.notify({
            // options
              message: '{{ Session::get('error') }}'
            },{
              // settings
              type: 'danger',
              placement: {
                from: "top",
                align: "center"
              }
            });

        @endif

        @if (Session::has('success'))

            $.notify({
            // options
              message: '{{ Session::get('success') }}'
            },{
              // settings
              type: 'info',
              placement: {
                from: "top",
                align: "center"
              }
            });

        @endif
        $('form').submit(function(){
          $(this).find('button[type=submit]').prop('disabled', true);
        });
        $(document).on('shown.bs.modal', '.modal', function() {
          $(this).find('[autofocus]').focus();
        });

        </script>

        <script>jQuery(function(){Codebase.helpers(['select2']);});</script>

        @yield('js')
    </body>
</html>
