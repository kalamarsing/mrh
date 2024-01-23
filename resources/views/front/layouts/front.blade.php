<!doctype html>
<html lang="ca">
    @include('front.partials.head')
    
    <body>
        @include('front.partials.header')

    @php

    @endphp

    <div id="mws-wrapper">

        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>

        @include('front.partials.sidebar')


        <div id="mws-container" class="clearfix">

            @yield('content')


            @include('front.partials.footer')

        </div>

    </div>


         <!-- JavaScript Plugins -->
        <script src="{{asset('js/libs/jquery-1.8.3.min.js')}}"></script>
        <script src="{{asset('js/libs/jquery.mousewheel.min.js')}}"></script>
        <script src="{{asset('js/libs/jquery.placeholder.min.js')}}"></script>
        <script src="{{asset('custom-plugins/fileinput.js')}}"></script>

        <!-- jQuery-UI Dependent Scripts -->
        <script src="{{asset('jui/js/jquery-ui-1.9.2.min.js')}}"></script>
        <script src="{{asset('jui/jquery-ui.custom.min.js')}}"></script>
        <script src="{{asset('jui/js/jquery.ui.touch-punch.js')}}"></script>

        <!-- Plugin Scripts -->
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <!--[if lt IE 9]>
        <script src="js/libs/excanvas.min.js"></script>
        <![endif]-->
        <script src="{{asset('plugins/flot/jquery.flot.min.js')}}"></script>
        <script src="{{asset('plugins/flot/plugins/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('plugins/flot/plugins/jquery.flot.pie.min.js')}}"></script>
        <script src="{{asset('plugins/flot/plugins/jquery.flot.stack.min.js')}}"></script>
        <script src="{{asset('plugins/flot/plugins/jquery.flot.resize.min.js')}}"></script>
        <script src="{{asset('plugins/colorpicker/colorpicker-min.js')}}"></script>
        <script src="{{asset('plugins/validate/jquery.validate-min.js')}}"></script>
        <script src="{{asset('custom-plugins/wizard/wizard.min.js')}}"></script>

        <!-- Core Script -->
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/core/mws.js')}}"></script>



        @stack('javascripts-libs')

        @stack('javascripts')
        
        


    </body>


</html>
