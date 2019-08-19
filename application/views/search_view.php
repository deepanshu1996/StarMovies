<!DOCTYPE html>
  <html>
    <head>
      
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <div class="container">
        <nav>
          <div class="nav-wrapper">
            <a href="#" class="brand-logo">StarMovies</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="<?=base_url().index.php/Welcome/SearchMovies/$API_KEY?>">Search</a></li>
              <li><a href="<?=base_url().index.php/Welcome/Recommendations/ ?>">Recommendations</a></li>
            </ul>
          </div>
        </nav>
        <div class="row">
          <div class="col s12">
              
          </div>
        </div>
      </div>
      
    </body>
  </html>