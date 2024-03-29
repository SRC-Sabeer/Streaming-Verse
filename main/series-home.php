<?php
session_start();
// Check user authentication
if (!isset($_SESSION['user'])) {
    // Redirect to the registration page
    header("Location: register.php");
    exit();
}


// Rest of the page content
// ...
?>

<?php 
include("../utilities/connection.php");


function countShowsByGenre($genre) {
   global $con;
   $query = "SELECT COUNT(*) AS total FROM tv_series WHERE genre LIKE '%$genre%'";
   $result = mysqli_query($con, $query);
   if (!$result) {
       die("Database query failed."); // Add error handling as needed
   }
   $row = mysqli_fetch_assoc($result);
   return $row['total'];
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
 
include("./common/nav.php");
?>

    <!-- owl-carousel Banner Start -->
    <section class="pt-0 ">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="gen-banner-movies banner-style-3">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="true" data-loop="true" data-margin="0">
                            <?php
$query = "SELECT series_id FROM top_streaming_series";
$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $series_id = $row['series_id'];
        $series = getSeriesDetails($con, $series_id);
      echo'

                            <div class="item" style="background: url(\'../utilities/images/poster/'.$series['poster_image'].'\');)">
                                <div class="gen-movie-contain-style-3 h-100">
                                    <div class="container h-100">
                                        <div class="row justify-content-center h-100">
                                            <div class="col-xl-6">
                                                <a href="single-series.php?tv_series_id='.$series_id.'" class="playBut ">
                                                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        width="213.7px" height="213.7px" viewBox="0 0 213.7 213.7"
                                                        enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                                        <polygon class="triangle" id="XMLID_22_" fill="none"
                                                            stroke-width="7" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10" points="
                                                     73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                        <circle class="circle" id="XMLID_21_" fill="none"
                                                            stroke-width="7" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10" cx="106.8"
                                                            cy="106.8" r="103.3"></circle>
                                                    </svg>
                                                    <span>Watch Now</span>
                                                </a>
                                                <div class="gen-movie-info">
                                                    <h3>'.$series['title'].'</h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul class="gen-meta-after-title">
                                                    <li> <img src="../utilities/images/fix/imdb.png" alt="imdb">
                                                    <span>
                                                    '.$series['imdb'].' </span>
                                                </li>
                                                        <li>
                                                            <a ><span>'.$series['release_year'].'</span></a>
                                                        </li>
                                                        <li>
                                                        <a ><span>Seasons: '.$series['season_count'].'</span></a>
                                                    </li>
                                                    </ul>
                                                    <p>'.$series['description'].'</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            '; } }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Banner End -->

    <div class="container">

    

<div class="col-xl-6 col-lg-6 col-md-6">
                <h4 class="gen-heading-title">Genre</h4>
            </div>


    <!--
      - #CATEGORY SECTION
    -->
    <section class="category" id="category">

     

      <div class="category-grid">

        <div class="category-card">
          <img src="../utilities/images/fix/action.jpg" alt="" class="card-img">
          <div class="name"><a href="genre.php?type=shows&genre=action"> Action</a></div>
          <div class="total"><?php echo countShowsByGenre('action');?></div>
        </div>

        <div class="category-card">
          <img src="../utilities/images/fix/comedy.jpg" alt="" class="card-img">
          <div class="name"><a href="genre.php?type=shows&genre=comedy">Comedy</a></div>
          <div class="total"><?php echo countShowsByGenre('comedy');?></div>
        </div>

        <div class="category-card">
          <img src="../utilities/images/fix/thriller.webp" alt="" class="card-img">
          <div class="name"><a href="genre.php?type=shows&genre=thriller">Thriller</a></div>
          <div class="total"><?php echo countShowsByGenre('thriller');?></div>
        </div>

        <div class="category-card">
          <img src="../utilities/images/fix/horror.jpg" alt="" class="card-img">
          <div class="name"><a href="genre.php?type=shows&genre=horror">Horror</a></div>
          <div class="total"><?php echo countShowsByGenre('horror');?></div>
        </div>

        <div class="category-card">
          <img src="../utilities/images/fix/adventure.jpg" alt="" class="card-img">
          <div class="name"><a href="genre.php?type=shows&genre=adventure">Adventure</a></div>
          <div class="total"><?php echo countShowsByGenre('adventure');?></div>
        </div>

        <div class="category-card">
          <img src="../utilities/images/fix/animated.jpg" alt="" class="card-img">
          <div class="name"><a href="genre.php?type=shows&genre=animation">Animated</a></div>
          <div class="total"><?php echo countShowsByGenre('animation');?></div>
        </div>

        <div class="category-card">
          <img src="../utilities/images/fix/crime.jpg" alt="" class="card-img">
          <div class="name"><a href="genre.php?type=shows&genre=crime">Crime</a></div>
          <div class="total"><?php echo countShowsByGenre('crime');?></div>
        </div>

        <div class="category-card">
          <img src="../utilities/images/fix/sci-fi.jpg" alt="" class="card-img">
          <div class="name"><a href="genre.php?type=shows&genre=science-fiction">SCI-FI</a></div>
          <div class="total"><?php echo countShowsByGenre('science-fiction');?></div>
        </div>

      </div>

    </section>











</div>


    <!-- owl-carousel Videos Section-1 Start -->
    <section class="gen-section-padding-2">
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
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">
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
    <!-- owl-carousel Videos Section-1 End -->



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
                                 <div class="col-xl-6">
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

    <!-- owl-carousel Videos Section-3 Start -->
    <section class="gen-section-padding-2">
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
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">

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
    <!-- owl-carousel Videos Section-3 End -->

   <?php 
include("./common/footer.php");
   ?>