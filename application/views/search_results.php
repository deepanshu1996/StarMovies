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
        <div class="col s12">
            <div class="card-panel grey lighten-5 z-depth-1">
              <div class="row valign-wrapper">
                <div class="col s10">
                  <span class="black-text">
                    <h4>
                    You Searched for '<?=$query?>' ...
                    </h4>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <br>
        <div class="row">  
          <?php
            foreach($search_results['results'] as $movie):
          ?>
            <div class="col s12 m4 l3">
              <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="http://image.tmdb.org/t/p/w185<?=$movie['poster_path']?>">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4 truncate"><?php if(isset($movie['title'])){ echo $movie['title'];}else { echo "NA";}?><i class="material-icons right">more_vert</i></span>
                  <p>
                    <div class="row">
                      <div class="col s6"><a href="#!">Rating : <?=$movie['vote_average']?></a></div> 
                      <div class="col s6"><a href="#" class="btn btn-primary btn-small ChangeText" Recommend="true">Recommend</a></div>
                    </div> 
                  </p>
                </div>
                <div class="card-reveal" style="display: none; transform: translateY(0%);">
                  <span class="card-title grey-text text-darken-4">Description :<i class="material-icons right">close</i></span>
                  <p><?=$movie['overview']?></p>
                </div>
              </div>
            </div>
          <?php
            endforeach;
          ?>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click','.ChangeText',function(event){
              event.preventDefault();
              $(this).blur();

              var val = $(this).attr('Recommend');
              if(val == 'true'){
                $(this).html("Unrecommend");
                 $(this).attr('Recommend','false');
              }
              else{
                $(this).html("Recommend");
                $(this).attr('Recommend','true');
              }
              
            });
        });
      </script>
    </body>
  </html>
