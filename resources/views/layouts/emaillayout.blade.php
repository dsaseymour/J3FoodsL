<!DOCTYPE html>
<html lang="en">
      <head>
              <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
              <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'/>
              <meta http-equiv='x-ua-compatible' content='ie=edge'/>
              <title>@yield('title')</title>
<!-- CSS -->
              <link rel='stylesheet' type='text/css' href="{{ URL::to('css/reset.css') }}" />
              <link rel='stylesheet' type='text/css' href="{{ URL::to('css/jquery-ui.min.css') }}" />
              <link rel='stylesheet' type='text/css' href="{{ URL::to('css/jquery-ui.structure.min.css') }}" />
              <link rel='stylesheet' type='text/css' href="{{ URL::to('css/jquery-ui.theme.min.css') }}" />
              <link rel='stylesheet' type='text/css' href="{{ URL::to('css/bootstrap.min.css') }}" />
              <link rel='stylesheet' type='text/css' href="{{ URL::to('css/bootstrap-theme.min.css') }}" />
              <link rel='stylesheet' type='text/css' href="{{ URL::to('css/font-awesome.min.css') }}" />
              <link rel='stylesheet' type='text/css' href="{{ URL::to('css/style.css') }}" />
<!-- javascript -->
            <script src="{{ URL::to('js/jquery-1.12.0.min.js') }}"></script>
            <script src="{{ URL::to('js/jquery-ui.min.js') }}"></script>
            <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
            <script src="{{ URL::to('js/highcharts.js') }}"></script>
            <script src="{{ URL::to('js/jqueryhighchartTable-min.js') }}"></script>
            <script src="https://code.highcharts.com"></script>
      @yield('styles')
      </head>

      <body>
                  <header>
                        @yield('navigation')
                  </header>
                  <main>
                        @yield('content')
                  </main>

      </body>
</html>
