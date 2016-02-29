<!DOCTYPE html>
<html lang="en">
      <head>
              <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
              <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'/>
              <meta http-equiv='x-ua-compatible' content='ie=edge'/>
<!--Title
Define the title for each page by creating a pageTitle variable before each inclusion of head.php
that value is echoed here
-->
              <title>
                <?php
                echo $pageTitle;
                ?>
              </title>

<!-- CSS -->
              <link rel='stylesheet' type='text/css' href="/css/reset.css" />
              <link rel="stylesheet" type='text/css' href="/css/jquery-ui.min.css">
              <link rel="stylesheet" type='text/css' href="/css/jquery-ui.structure.min.css">
              <link rel="stylesheet" type='text/css' href="/css/jquery-ui.theme.min.css">
              <link rel="stylesheet" type='text/css' href="/css/bootstrap.min.css">
              <link rel="stylesheet" type='text/css' href="/css/bootstrap-theme.min.css">
              <link rel="stylesheet" type='text/css' href="/css/font-awesome.min.css">
              <link rel="stylesheet" type='text/css' href="/css/style.css"/>
<!-- javascript -->
            <script src="/js/jquery-1.12.0.min.js"></script>
            <script src="/js/jquery-ui.min.js"></script>
            <script src="/js/bootstrap.min.js"></script>
            <script src="/js/highcharts.js"></script>
            <script src="/js/jqueryhighchartTable-min.js"></script>
            <script src="https://code.highcharts.com"></script>

      </head>
<body>
@yield('content')



</body>
      <footer >
        <div class="container-fluid" id="footer">
          <div class="row">
           <div class="f-content">
          <div class="f-copy">Copyright &copy; 2016 - <?php echo date("Y"); ?> <a href="http://www.j3foods.com">j3foods.com</a></div>
          <ul class="f-subnav">
            <li><a href="./about.php">About us</a></li>
            <li><a href="./privacy.php">Privacy Policy</a></li>
            <li><a href="./terms.php">Terms &amp; Conditions</a></li>
            <li><a href="./help/index.html">Help</a></li>
          </ul>
          </div>
         </div>
        </div>
      </footer>
</html>
