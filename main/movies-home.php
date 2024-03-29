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

function getMovieDetails($con, $movie_id) {
   $query = "SELECT * FROM movies WHERE id = '$movie_id'";
   $result = mysqli_query($con, $query);
   return mysqli_fetch_assoc($result);
}

function countMoviesByGenre($genre) {
    global $con;
    $query = "SELECT COUNT(*) AS total FROM movies WHERE genre LIKE '%$genre%'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Database query failed."); // Add error handling as needed
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}


include("./common/nav.php");
?>

    <!-- owl-carousel Banner Start -->
    <section class="pt-0 ">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="gen-banner-movies">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1"
                           
                            data-autoplay="true" data-loop="true" data-margin="30">
                            <?php 
                            $query = "SELECT movie_id FROM trending_movies";
     $result = mysqli_query($con, $query);
     while ($row = mysqli_fetch_assoc($result)) {
       $movie_id = $row['movie_id'];
       $movie = getMovieDetails($con, $movie_id);
       echo '  
                            <div class="item" style="background: url(\'../utilities/images/poster/'.$movie['poster_img'].'\');)">
                                <div class="gen-movie-contain h-100">
                                    <div class="container h-100">
                                        <div class="row align-items-center h-100">
                                            <div class="col-xl-6">
                                                <div class="gen-tag-line"><span></span></div>
                                                <div class="gen-movie-info">
                                                    <h3>'.$movie['title'].'</h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        <li class="gen-sen-rating">
                                                            <span>
                                                            '.$movie['rated'].' </span>
                                                        </li>
                                                        <li>'.$movie['runtime'].' mins</li>
                                                        <li> <img src="../utilities/images/fix/imdb.png" alt="imdb">
                                                            <span>
                                                            '.$movie['imdb'].' </span>
                                                        </li>
                                                      
                                                        <li>
                                                            <a><span>'.$movie['release_year'].'</span></a>
                                                        </li>
                                                    </ul>
                                                    <p>'.$movie['description'].'</p>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <div class="gen-btn-container button-1">
                                                        <a href="single-movie.php?movie_id='.$movie_id.'" class="gen-button">
                                                            <span class="text">Play Now</span>
                                                        </a>
                                                    </div>
                                                    <div class="gen-btn-container button-2">
                                                        <a href="https://www.youtube.com/watch?v='.$movie['trailer_link'].'"
                                                            class="gen-button popup-youtube popup-vimeo popup-gmaps gen-button-link">
                                                            <i aria-hidden="true" class="ion ion-play"></i> <span
                                                                class="text">Watch Trailer</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> '; }
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
              <div class="name"><a href="genre.php?type=movies&genre=action"> Action</a></div>
              <div class="total"><?php echo countMoviesByGenre('action'); ?></div>
            </div>
  
            <div class="category-card">
              <img src="../utilities/images/fix/comedy.jpg" alt="" class="card-img">
              <div class="name"><a href="genre.php?type=movies&genre=comedy"> Comedy</a></div>
              <div class="total"><?php echo countMoviesByGenre('comedy'); ?></div>
            </div>
  
            <div class="category-card">
              <img src="../utilities/images/fix/thriller.webp" alt="" class="card-img">
              <div class="name"><a href="genre.php?type=movies&genre=thriller">Thriller</a></div>
              <div class="total"><?php echo countMoviesByGenre('thriller'); ?></div>
            </div>
  
            <div class="category-card">
              <img src="../utilities/images/fix/horror.jpg" alt="" class="card-img">
              <div class="name"><a href="genre.php?type=movies&genre=horror">Horror</a></div>
              <div class="total"><?php echo countMoviesByGenre('horror'); ?></div>
            </div>
  
            <div class="category-card">
              <img src="../utilities/images/fix/adventure.jpg" alt="" class="card-img">
              <div class="name"><a href="genre.php?type=movies&genre=adventure">Adventure</a></div>
              <div class="total"><?php echo countMoviesByGenre('adventure'); ?></div>
            </div>
  
            <div class="category-card">
              <img src="../utilities/images/fix/animated.jpg" alt="" class="card-img">
              <div class="name"><a href="genre.php?type=movies&genre=animation">Animated</a></div>
              <div class="total"><?php echo countMoviesByGenre('animation'); ?></div>
            </div>
  
            <div class="category-card">
              <img src="../utilities/images/fix/crime.jpg" alt="" class="card-img">
              <div class="name"><a href="genre.php?type=movies&genre=crime">Crime</a></div>
              <div class="total"><?php echo countMoviesByGenre('crime'); ?></div>
            </div>
  
            <div class="category-card">
              <img src="../utilities/images/fix/sci-fi.jpg" alt="" class="card-img">
              <div class="name"><a href="genre.php?type=movies&genre=science-fiction">SCI-FI</a></div>
              <div class="total"><?php echo countMoviesByGenre('science-fiction'); ?></div>
            </div>
  
          </div>
  
        </section>
  
  
  
  
  
  
  
 
  
  
  
    </div>

 


    <!-- owl-carousel Videos Section-2 Start -->
    <section class="pt-0 gen-section-padding-2">
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
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">
   
                            <?php
 $query = "SELECT * FROM movies ORDER BY release_year DESC LIMIT 8"; // Change the LIMIT to the number of movies you want to display
 $result = mysqli_query($con, $query);
 while ($row = mysqli_fetch_assoc($result)) {
       echo '  

                            <div class="item">
                                <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="../utilities/images/poster/'.$row['poster_img'].'"
                                                    alt="owl-carousel-video-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                    <li class="share top">
                                                    <input type="text" value="'.$row['id'].'" id="myInput" style="display:none;">
                                                       <i class="fa fa-share-alt" onclick="copy()"></i>
                                                      
                                                      
                                                    </li>
                                                 </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="register.php">Sign in
                                                                        to add this
                                                                        movie to a
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
'; }
?>

                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-2 End -->

    <!-- owl-carousel images Start -->
    <section class="pt-0 pb-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="gen-banner-movies">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false"
                            data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="true" data-loop="true" data-margin="30">
                 
                            <?php 
     $query = "SELECT movie_id FROM foryou_movies";
     $result = mysqli_query($con, $query);
     while ($row = mysqli_fetch_assoc($result)) {
       $movie_id = $row['movie_id'];
       $movie = getMovieDetails($con, $movie_id);
       echo ' 


                            <div class="item" style="background: url(\'../utilities/images/poster/'.$movie['poster_img'].'\');)">
                                <div class="gen-movie-contain h-100">
                                    <div class="container h-100">
                                        <div class="row align-items-center h-100">
                                            <div class="col-xl-6">
                                                <div class="gen-tag-line"><span></span></div>
                                                <div class="gen-movie-info">
                                                    <h3>'.$movie['title'].'</h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        <li class="gen-sen-rating">
                                                            <span>
                                                            '.$movie['rated'].' </span>
                                                        </li>
                                                        <li>'.$movie['runtime'].' mins</li>
                                                        <li> <img src="images/asset-2.png" alt="srcverse-image">
                                                            <span>
                                                            '.$movie['imdb'].' </span>
                                                        </li>
                                                      
                                                        <li>
                                                            <a><span>'.$movie['release_year'].'</span></a>
                                                        </li>
                                                    </ul>
                                                    <p>'.$movie['description'].'</p>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <div class="gen-btn-container button-1">
                                                        <a href="single-movie.php?movie_id='.$movie_id.'" class="gen-button">
                                                            <i aria-hidden="true" class="ion ion-play"></i> <span
                                                                class="text">Play now</span>
                                                        </a>
                                                    </div>
                                                    <div class="gen-btn-container button-2">
                                                        <a href="https://www.youtube.com/watch?v='.$movie['trailer_link'].'"
                                                            class="gen-button popup-youtube popup-vimeo popup-gmaps gen-button-link">
                                                            <span class="text">Watch Trailer</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            '; } ?>
                     
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
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">
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
           <div class="gen-carousel-movies-style-3 movie-grid style-3">
               <div class="gen-movie-contain">
                   <div class="gen-movie-img">
                       <img src="../utilities/images/poster/'.$movie['poster_img'].'"
                           alt="owl-carousel-video-image">
                       <div class="gen-movie-add">
                           <div class="wpulike wpulike-heart">
                               <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                   <button type="button"
                                       class="wp_ulike_btn wp_ulike_put_image"></button>
                               </div>
                           </div>
                           <ul class="menu bottomRight">
                           <li class="share top">
                           <input type="text" value="'.$movie['id'].'" id="myInput" style="display:none;">
                              <i class="fa fa-share-alt" onclick="copy()"></i>
                             
                             
                           </li>
                        </ul>
                               </li>
                           </ul>
                           <div class="movie-actions--link_add-to-playlist dropdown">
                               <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                       class="fa fa-plus"></i></a>
                               <div class="dropdown-menu mCustomScrollbar">
                                   <div class="mCustomScrollBox">
                                       <div class="mCSB_container">
                                           <a class="login-link" href="register.php">Sign in
                                               to add this
                                               movie to a
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
                           <h3><a href="single-movie.php?movie_id='.$movie_id.'">'.$movie['title'].'</a>
                           </h3>
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

  <?php 
include("./common/footer.php");
  ?>