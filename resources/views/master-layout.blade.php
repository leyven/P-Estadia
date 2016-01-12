<html>
<head>
		
        @section('scripts')
                <!-- add the jQuery script -->
                 <script src="{{ asset('js/jqwidgets-ver3.9.1/scripts/jquery-1.11.1.min.js') }}"></script>
                 <!-- add the jQWidgets framework -->
                  <script src="{{ asset('js/jqwidgets-ver3.9.1/jqwidgets/jqxcore.js') }}"></script>
                   <link rel="stylesheet" href="{{asset ('js/jqwidgets-ver3.9.1/jqwidgets/styles/jqx.base.css') }}">
                   <link rel="stylesheet" href="{{asset ('js/jqwidgets-ver3.9.1/jqwidgets/styles/jqx.summer.css') }}">
                 <script src="{{ asset('js/jqwidgets-ver3.9.1/jqwidgets/jqxvalidator.js') }}"></script>
                <script src="{{ asset('js/jqwidgets-ver3.9.1/jqwidgets/jqxbuttons.js') }}"></script>
                 <script src="{{ asset('js/jqwidgets-ver3.9.1/jqwidgets/jqxscrollbar.js') }}"></script>
                  <script src="{{ asset('js/jqwidgets-ver3.9.1/jqwidgets/jqxtextarea.js') }}"></script>
        @show
        @show

        @yield('embded-script')
        <title>@yield('title')</title>
    </head>
    <body>
    	<div class="barra-navegacion">
    		@yield('barra-navegacion')
    	</div>
       

        <div class="contenido">
            @yield('contenido')
        </div>

        <div class="footer">

        @section('footer')
            This is the master footer.
        @show
		</div>
    </body>
</html>