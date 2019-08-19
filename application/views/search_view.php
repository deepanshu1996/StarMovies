<!DOCTYPE html>
  <html>
    <head>
      
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <div class="container">
         <nav class="#000000 black">
          <div class="nav-wrapper">
            <a href="<?=base_url()?>index.php/Welcome/ShowWelcomeView/<?=$session_id?>/<?=$API_KEY?>/" class="brand-logo" style="margin-left: 16px;"><strong>Star Movies</strong></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="<?=base_url()?>index.php/Welcome/SearchMovies/<?=$session_id?>/<?=$API_KEY?>/">Search</a></li>
            </ul>
          </div>
        </nav>
        <div class="row">
          <form class="col s12" style="margin-top: 50px;" method="GET" action="<?=base_url()?>index.php/Welcome/GetSearchResults/<?=$session_id?>/<?=$API_KEY?>/">
            <div class="row">
              <div class="input-field col s12">
                <label for="query">Search Movies</label>
                <input id="query" name="query" type="text" class="validate">
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </form>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
           
        });
      </script>
    </body>
  </html>
