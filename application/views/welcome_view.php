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
          <div class="col s12">
            <ul class="tabs #c62828">
              <li class="tab col s3"><a href="#test1" class="active red-text text-darken-3"><strong>Trending Movies</strong></a></li>
              <li class="tab col s3"><a class="red-text text-darken-3" href="#test2"><strong>Forthcoming Movies</strong></a></li>
              <li class="tab col s3 disabled"><a href="#test3" class="red-text text-darken-3"><strong>Recommended Movies</strong></a></li>
            </ul>
          </div>
          <div id="test1" class="col s12">
            <div class="row">
              <?php
                foreach($trending_movies['results'] as $movie):
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
          <div id="test2" class="col s12">
            <div class="row">
              <?php
                foreach($upcoming_movies['results'] as $movie):
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
                          <div class="col s6"><a href="#" class="btn btn-primary btn-small ChangeText">Recommend</a></div>
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
          <div id="test3" class="col s12">Test 3</div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').tabs();

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
