   <?php 
   
   $currentFilePath = $_SERVER['PHP_SELF'];
   $isNavFile = basename($currentFilePath) === 'nav.php';
   $includePath = $isNavFile ? "../../utilities/connection.php" : "../utilities/connection.php";
   include($includePath);

   function getMovieDetails($con, $movie_id) {
      $query = "SELECT * FROM movies WHERE id = '$movie_id'";
      $result = mysqli_query($con, $query);
      return mysqli_fetch_assoc($result);
   }
   function getSeriesDetails($con, $series_id) {
      $query = "SELECT * FROM tv_series WHERE id = '$series_id'";
      $result = mysqli_query($con, $query);
      $series = mysqli_fetch_assoc($result);

      // Fetch season and episode counts for the current series
      $season_query = "SELECT COUNT(DISTINCT season_id) AS season_count FROM episodes WHERE season_id IN (SELECT id FROM seasons WHERE tv_series_id = '$series_id')";
      $episode_query = "SELECT COUNT(*) AS episode_count FROM episodes WHERE season_id IN (SELECT id FROM seasons WHERE tv_series_id = '$series_id')";

      $season_result = mysqli_query($con, $season_query);
      $episode_result = mysqli_query($con, $episode_query);

      $season_count = mysqli_fetch_assoc($season_result)['season_count'];
      $episode_count = mysqli_fetch_assoc($episode_result)['episode_count'];

      // Add season and episode counts to the series data
      $series['season_count'] = $season_count;
      $series['episode_count'] = $episode_count;

      return $series;
   }

   ?>


   <?php 
   include("./common/nav.php");
   ?>
 <!--=========== Loader =============-->
    <!-- <div id="gen-loading">
      <div id="gen-loading-center">
         <img src="../utilities/images/fix/logo.png" alt="loading">
         <h3>SRC Verse TV</h3>
      </div>
   </div>  -->
   <!--=========== Loader =============-->

   


      <!-- owl-carousel Banner Start -->
      <section class="pt-0 pb-0">
         <div class="container-fluid px-0">
            <div class="row no-gutters">
               <div class="col-12">
                  <div class="gen-banner-movies banner-style-2">
                     <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1"
                        data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                        data-loop="true" data-margin="0">

                        <?php
      
      $query = "SELECT movie_id FROM trending_movies";
      $result = mysqli_query($con, $query);
      while ($row = mysqli_fetch_assoc($result)) {
         $movie_id = $row['movie_id'];
         $movie = getMovieDetails($con, $movie_id);
         echo '  

                        <div class="item" style="background-image: url(\'../utilities/images/poster/'.$movie['poster_img'].'\');">
                           <div class="gen-movie-contain-style-2 h-100">
                              <div class="container h-100">
                                 <div class="row flex-row-reverse align-items-center h-100">
                                    <div class="col-xl-6">
                                       <div class="gen-front-image">
                                          <img src="../utilities/images/poster/'.$movie['poster_img'].'" alt="owl-carousel-banner-image">
                                          <a href="https://www.youtube.com/watch?v='.$movie['trailer_link'].'" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                             <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                             <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                                height="213.7px" viewBox="0 0 213.7 213.7"
                                                enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                                <polygon class="triangle" id="XMLID_17_" fill="none" stroke-width="7"
                                                   stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                   points="
                                                               73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                <circle class="circle" id="XMLID_18_" fill="none" stroke-width="7"
                                                   stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                   cx="106.8" cy="106.8" r="103.3">
                                                </circle>
                                             </svg>
                                             <span>Watch Trailer</span>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="col-xl-6">
                                       
                                       <div class="gen-movie-info">
                                          <h3>'.$movie['title'].'</h3>
                                       </div>
                                       <div class="gen-movie-meta-holder">
                                          <ul class="gen-meta-after-title">
                                             <li class="gen-sen-rating">
                                                <span>
                                                '.$movie['rated'].'</span>
                                             </li>
                                             <li> <img src="../utilities/images/fix/imdb.png" alt="rating-image">
                                                <span>
                                                '.$movie['imdb'].' </span>
                                             </li>
                                          </ul>
                                          <p>'.$movie['description'].'
                                          </p>
                                          <div class="gen-meta-info">
                                             <ul class="gen-meta-after-excerpt">
                                                <li>
                                                   <strong>Cast :</strong>
                                                   '.$movie['cast'].'
                                                </li>
                                                <li>
                                                   <strong>Genre :</strong>
                                                   <span>
                                                   
                                                      '.$movie['genre'].'
                                                
                                                   </span>
                                                </li>
                                                <li>
                                                   <strong>Tagline :</strong>
                                                   <span>
                                                   '.$movie['tagline'].'
                                                   </span>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="gen-movie-action">
                                          <div class="gen-btn-container">
                                             <a href="single-movie.php?movie_id='.$movie_id.'" class="gen-button .gen-button-dark">
                                                <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                                   Now</span>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        '; }
                        ?>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- owl-carousel Banner End -->

      <!-- owl-carousel Videos Section-1 Start -->
      <section class="gen-section-padding-2">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6">
                  <h4 class="gen-heading-title">Latest Movies</h4>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 d-md-inline-block more">
                  <div class="gen-movie-action">
                     <div class="gen-btn-container text-right">
                        <a href="./movies.php" class="gen-button gen-button-flat">
                           <span class="text">More Movies</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-12">
                  <div class="gen-style-2">
                     <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                        data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                        data-loop="false" data-margin="30">
            
                        <?php
      
  
      $query = "SELECT * FROM movies ORDER BY release_year DESC LIMIT 8"; // Change the LIMIT to the number of movies you want to display
      $result = mysqli_query($con, $query);
      while ($row = mysqli_fetch_assoc($result)) {
            echo '
                        <div class="item">
                           <div
                              class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                              <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                 <div class="gen-movie-contain">
                                    <div class="gen-movie-img">
                                       <img src="../utilities/images/poster/'.$row['poster_img'].'" alt="owl-carousel-video-image">
                                       <div class="gen-movie-add">
                                          <div class="wpulike wpulike-heart">
                                             <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                   type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                          </div>
                                          <ul class="menu bottomRight">
                                             <li class="share top">
                                             <input type="text" value="'.$row['id'].'" id="myInput" style="display:none;">
                                                <i class="fa fa-share-alt" onclick="copy()"></i>
                                             
                                             
                                             </li>
                                          </ul>
                                          <div class="movie-actions--link_add-to-playlist dropdown">
                                             <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                   class="fa fa-plus"></i></a>
                                             <div class="dropdown-menu mCustomScrollbar">
                                                <div class="mCustomScrollBox">
                                                   <div class="mCSB_container">
                                                      <a class="login-link" href="register.php">Sign in to add this movie
                                                         to a
                                                         playlist.</a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="gen-movie-action">
                                          <a href="single-movie.php?movie_id='.$row['id'].'" class="gen-button">
                                             <i class="fa fa-play"></i>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="gen-info-contain">
                                       <div class="gen-movie-info">
                                          <h3><a href="single-movie.php?movie_id='.$row['id'].'">'.$row['title'].'</a>
                                          </h3>
                                       </div>
                                       <div class="gen-movie-meta-holder">
                                          <ul>
                                             <li><i class="fa-regular fa-clock red-c"></i>  '.$row['runtime'].' m</li>
                                             <li>
                                             <span><i class="fa-solid fa-star red-c"></i> '.$row['imdb'].'</span>
                                             </li>
                                             <li>
                                          <span class="red-c">'.$row['release_year'].'</span>
                                          </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- #post-## -->
                        </div>
                        ';
      }
      ?>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- owl-carousel Videos Section-1 End -->

      <!-- owl-carousel Videos Section-2 Start -->
      <section class="pt-0 gen-section-padding-2">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6">
                  <h4 class="gen-heading-title">Popular Shows</h4>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 d-md-inline-block more">
                  <div class="gen-movie-action">
                     <div class="gen-btn-container text-right">
                        <a href="./series.php" class="gen-button gen-button-flat">
                           <span class="text">More Shows</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-12">
                  <div class="gen-style-2">
                     <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                        data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                        data-loop="false" data-margin="30">
                     
                        <?php
   $query = "SELECT series_id FROM popular_series";
   $result = mysqli_query($con, $query);

   if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         $series_id = $row['series_id'];
         $series = getSeriesDetails($con, $series_id);
         echo'

                        <div class="item">
                           <div
                              class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-comedy movie_tag-4k-ultra movie_tag-brother movie_tag-premieres movie_tag-viking">
                              <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                 <div class="gen-movie-contain">
                                    <div class="gen-movie-img">
                                       <img src="../utilities/images/poster/'.$series['poster_image'].'" alt="owl-carousel-video-image">
                                       <div class="gen-movie-add">
                                          <div class="wpulike wpulike-heart">
                                             <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                   type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                          </div>
                                          <ul class="menu bottomRight">
                                          <li class="share top">
                                          <input type="text" value="http://localhost/Movies%20Booking%20System/avastream/movie-single.php?series_id='.$series['id'].'" id="myInput" style="display:none;">
                                             <i class="fa fa-share-alt" onclick="copy()"></i>
                                          
                                          
                                          </li>
                                       </ul>
                                          <div class="movie-actions--link_add-to-playlist dropdown">
                                             <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                   class="fa fa-plus"></i></a>
                                             <div class="dropdown-menu mCustomScrollbar">
                                                <div class="mCustomScrollBox">
                                                   <div class="mCSB_container">
                                                      <a class="login-link" href="register.php">Sign in to add this movie
                                                         to a
                                                         playlist.</a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="gen-movie-action">
                                          <a href="single-series.php?tv_series_id='.$series_id.'" class="gen-button">
                                             <i class="fa fa-play"></i>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="gen-info-contain">
                                       <div class="gen-movie-info">
                                          <h3><a href="single-series.php?tv_series_id='.$series_id.'">'. $series['title'] . '</a>
                                          </h3>
                                       </div>
                                       <div class="gen-movie-meta-holder">
                                          <ul>
                                             <li>'. $series['season_count'] . ' Seasons</li>
                                             <li>
                                             <span><i class="fa-solid fa-star red-c"></i> '.$series['imdb'].'</span>
                                          </li>
                                          <li>
                                          <span class="red-c">'.$series['release_year'].'</span>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- #post-## -->
                        </div>

                        ';    }
                     } else {
                        echo "No results found.";
                     }

   ?>
               
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- owl-carousel Videos Section-2 End -->



   <!-- Slick Slider start -->
   <section class="gen-section-padding-2 pt-0 pb-0">
      <div class="container">
         <div class="home-singal-silder">
            <div class="gen-nav-movies gen-banner-movies">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="slider slider-for">

<?php 
     $query = "SELECT movie_id FROM foryou_movies";
     $result = mysqli_query($con, $query);
     while ($row = mysqli_fetch_assoc($result)) {
       $movie_id = $row['movie_id'];
       $movie = getMovieDetails($con, $movie_id);
       echo ' 
                      
                        <div class="slider-item" style="background-image: url(\'../utilities/images/poster/'.$movie['poster_img'].'\');">
                           <div class="gen-slick-slider h-100">
                              <div class="gen-movie-contain h-100">
                                 <div class="container h-100">
                                    <div class="row align-items-center h-100">
                                       <div class="col-lg-6">
                                          <div class="gen-movie-info">
                                             <h3>'.$movie['title'].'</h3>
                                             <p>'.$movie['description'].'
                                             </p>

                                          </div>
                                          <div class="gen-movie-action">
                                             <div class="gen-btn-container button-1">
                                                <a class="gen-button" href="single-movie.php?movie_id='.$movie_id.'" tabindex="0">
                                                   <i aria-hidden="true" class="ion ion-play"></i>
                                                   <span class="text">Play Now</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> '; 
     }?>             
                     </div>
                     
                     <div class="slider slider-nav">
                     <?php
                         $query = "SELECT movie_id FROM foryou_movies";
                         $result = mysqli_query($con, $query);
                         while ($row = mysqli_fetch_assoc($result)) {
                           $movie_id = $row['movie_id'];
                           $movie = getMovieDetails($con, $movie_id);
                           echo ' 


                        <div class="slider-nav-contain">
                           <div class="gen-nav-img">
                              <img src="../utilities/images/poster/'.$movie['poster_img'].'" alt="steamlab-image">
                           </div>
                           <div class="movie-info">
                              <h3>'.$movie['title'].'</h3>
                              <div class="gen-movie-meta-holder">
                                 <ul>
                                    <li>'.$movie['runtime'].' mins</li>
                                    <li>
                                            <span><i class="fa-solid fa-star red-c"></i> '.$movie['imdb'].'</span>
                                          </li>
                                          <li>
                                         <span class="red-c">'.$movie['release_year'].'</span>
                                 </ul>
                              </div>
                           </div>
                        </div> '; } 
                        ?>
                    

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Slick Slider End -->






   <!-- owl-carousel Videos Section-3 Start -->
   <section class="gen-section-padding-2">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
               <h4 class="gen-heading-title">Trending Movies</h4>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 d-md-inline-block more">
               <div class="gen-movie-action">
                  <div class="gen-btn-container text-right">
                     <a href="./movies.php" class="gen-button gen-button-flat">
                        <span class="text">More Movies</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="gen-style-2">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                     data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                     data-loop="false" data-margin="30">

                     <?php
     
     $query = "SELECT movie_id FROM trending_movies";
     $result = mysqli_query($con, $query);
     while ($row = mysqli_fetch_assoc($result)) {
       $movie_id = $row['movie_id'];
       $movie = getMovieDetails($con, $movie_id);
       echo '  

                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                 <img src="../utilities/images/poster/'.$movie['poster_img'].'" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                       <li class="share top">
                                       <input type="text" value="http://localhost/Movies%20Booking%20System/avastream/movie-single.php?movie_id='.$movie['id'].'" id="myInput" style="display:none;">
                                          <i class="fa fa-share-alt" onclick="copy()"></i>
                                         
                                         
                                       </li>
                                    </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.php">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.php?movie_id='.$movie_id.'" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.php?movie_id='.$movie_id.'">'.$movie['title'].'</a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                    <ul>
                                          <li><i class="fa-regular fa-clock red-c"></i>  '.$movie['runtime'].' m</li>
                                          <li>
                                            <span><i class="fa-solid fa-star red-c"></i> '.$movie['imdb'].'</span>
                                          </li>
                                          <li>
                                         <span class="red-c">'.$movie['release_year'].'</span>
                                       </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>

';} 
?>
            

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel Videos Section-3 End -->

   <!-- owl-carousel images Start -->
   <section class="pt-0 gen-section-padding-2 home-singal-silder">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="gen-banner-movies">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false" data-desk_num="1"
                     data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                     data-loop="true" data-margin="30">
                   
                     <?php
$query = "SELECT series_id FROM top_picks_tv_series";
$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $series_id = $row['series_id'];
        $series = getSeriesDetails($con, $series_id);
      echo'
                     <div class="item" style="background-image: url(\'../utilities/images/poster/'.$series['poster_image'].'\');">
                        <div class="gen-movie-contain h-100">
                           <div class="container  h-100">
                              <div class="row align-items-center h-100">
                                 <div class="col-xl-6" style="margin-left:4%;">
                                    <div class="gen-movie-info">
                                       <h3>'.$series['title'].'</h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>'. $series['season_count'] . ' Season</li>
                                          <li>'. $series['episode_count'] . ' Episode</li>
                                          <li>'.$series['release_year'].'</li>
                                          <li>
                                             <a href="#"><span>'. $series['rated'] . '</span></a>
                                          </li>
                                       </ul>
                                       <p>'. $series['description'] . '</p>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container button-1">
                                          <a href="single-series.php?tv_series_id='.$series_id.'" class="gen-button gen-button-dark">
                                             <span class="text">Play now</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     ';  }
                  } else {
                      echo "No results found.";
                  } 
                  ?>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel images End -->

   <!-- owl-carousel Videos Section-4 Start -->
   <section class="pt-0 gen-section-padding-2">
   <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
               <h4 class="gen-heading-title">Top Streaming Shows</h4>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 d-md-inline-block more">
               <div class="gen-movie-action">
                  <div class="gen-btn-container text-right">
                     <a href="./series.php" class="gen-button gen-button-flat">
                        <span class="text">More Shows</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="gen-style-2">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                     data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                     data-loop="false" data-margin="30">
                    
                     <?php
$query = "SELECT series_id FROM top_streaming_series";
$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $series_id = $row['series_id'];
        $series = getSeriesDetails($con, $series_id);
      echo'

                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-comedy movie_tag-4k-ultra movie_tag-brother movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="../utilities/images/poster/'.$series['poster_image'].'" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                       <li class="share top">
                                       <input type="text" value="http://localhost/Movies%20Booking%20System/avastream/movie-single.php?series_id='.$series['id'].'" id="myInput" style="display:none;">
                                          <i class="fa fa-share-alt" onclick="copy()"></i>
                                         
                                         
                                       </li>
                                    </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.php">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-series.php?tv_series_id='.$series_id.'" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-series.php?tv_series_id='.$series_id.'">'. $series['title'] . '</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>'. $series['season_count'] . ' Seasons</li>
                                          <li>
                                          <span><i class="fa-solid fa-star red-c"></i> '.$series['imdb'].'</span>
                                        </li>
                                        <li>
                                       <span class="red-c">'.$series['release_year'].'</span>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>

                     ';    }
                  } else {
                      echo "No results found.";
                  }

?>
             
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel Videos Section-4 End -->

   <?php 
include("./common/footer.php");
   ?>

<script>
function copy() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
}
</script>