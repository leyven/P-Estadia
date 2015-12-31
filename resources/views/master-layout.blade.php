<html>
<head>
		
        @section('scripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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