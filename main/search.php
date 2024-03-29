

<?php 
include("./common/nav.php");
include("../utilities/connection.php");
// Pagination
$searchType = $_GET['type']; // 'movies' or 'tv_shows'
$searchQuery = $_GET['query'] ?? '';

// Create a variable for the actor name
$actorName = '';

if ($searchType === 'cast') {
    // Get the actor name from the form
    $actorName = $_POST['actor_name'];

    // Create a query to search for cast members by name
    $query = "SELECT * FROM cast WHERE name LIKE '%$actorName%'";

    // Execute the query
    $result = mysqli_query($con, $query);
} else {
    // Prepare the SQL query based on search type and query
    $table = ($searchType === 'movies') ? 'movies' : 'tv_series';
    $query = "SELECT $table.*, COUNT(seasons.id) AS total_seasons FROM $table 
    LEFT JOIN seasons ON $table.id = seasons.tv_series_id 
    WHERE $table.title LIKE '%$searchQuery%' GROUP BY $table.id";

    // Execute the query
    $result = mysqli_query($con, $query);
}
?>

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1 style="font-size: 42px;">
                                Search Results For:
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                             
                            <?php
                            echo '<li class="breadcrumb-item active" style="font-size:29px;">';
                            if ($searchType === 'cast') {
                                echo htmlspecialchars($actorName);
                            } else {
                                echo htmlspecialchars($searchQuery);
                            }
                            echo '</li>';
                            ?>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Section-1 Start -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                    <?php 
      if ($result) {
         // Display search results
         while ($row = mysqli_fetch_assoc($result)) {
            if ($searchType === 'movies') {
                        echo '
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                <div class="gen-movie-contain">
                                    <div class="gen-movie-img">
                                        <img src="../utilities/images/poster/'.$row['poster_img'].'" alt="srcverse-image">
                                        <div class="gen-movie-add">
                                            <div class="wpulike wpulike-heart">
                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                    <button type="button"
                                                        class="wp_ulike_btn wp_ulike_put_image"></button>
                                                </div>
                                            </div>
                                            <ul class="menu bottomRight">
                                            <li class="share top">
                                            <input type="text" value="http://localhost/Movies%20Booking%20System/avastream/movie-single.php?movie_id='.$row['id'].'" id="myInput" style="display:none;">
                                               <i class="fa fa-share-alt" onclick="copy()"></i>
                                              
                                              
                                            </li>
                                         </ul>
                                            <div class="movie-actions--link_add-to-playlist dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                        class="fa fa-plus"></i></a>
                                                <div class="dropdown-menu mCustomScrollbar">
                                                    <div class="mCustomScrollBox">
                                                        <div class="mCSB_container">
                                                            <a class="login-link" href="#">Sign in to add this
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
                                            <h3><a href="single-movie.php?movie_id='.$row['id'].'">'.$row['title'].'</a></h3>
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

                       ';}
                       
                       
                       elseif ($searchType === 'tv_shows') { 
                        echo '
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                <div class="gen-movie-contain">
                                    <div class="gen-movie-img">
                                        <img src="../utilities/images/poster/'.$row['poster_image'].'" alt="srcverse-image">
                                        <div class="gen-movie-add">
                                            <div class="wpulike wpulike-heart">
                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                    <button type="button"
                                                        class="wp_ulike_btn wp_ulike_put_image"></button>
                                                </div>
                                            </div>
                                            <ul class="menu bottomRight">
                                            <li class="share top">
                                            <input type="text" value="http://localhost/Movies%20Booking%20System/avastream/movie-single.php?series_id='.$row['id'].'" id="myInput" style="display:none;">
                                               <i class="fa fa-share-alt" onclick="copy()"></i>
                                              
                                              
                                            </li>
                                         </ul>
                                            <div class="movie-actions--link_add-to-playlist dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                        class="fa fa-plus"></i></a>
                                                <div class="dropdown-menu mCustomScrollbar">
                                                    <div class="mCustomScrollBox">
                                                        <div class="mCSB_container">
                                                            <a class="login-link" href="#">Sign in to add this
                                                                movie to a
                                                                playlist.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gen-movie-action">
                                            <a href="single-series.php?tv_series_id='.$row['id'].'" class="gen-button">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gen-info-contain">
                                        <div class="gen-movie-info">
                                            <h3><a href="single-series.php?tv_series_id='.$row['id'].'">'.$row['title'].'</a></h3>
                                        </div>
                                        <div class="gen-movie-meta-holder">
                                        <ul>
                                        <li>'.$row['total_seasons'].' Seasons</li>
                                        <li>
                                        <span><i class="fa-solid fa-star red-c"></i> '.$row['imdb'].'</span>
                                      </li>
                                      <li>
                                     <span class="red-c">'.$row['release_year'].'</span>
                                     </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                       ';
                       
                       }
                    }}
                       ?>
                          </div>
                </div>
             
            </div>
        </div>
    </section>
    <!-- Section-1 End -->






      <!-- Section-1 Start -->
      <section class="gen-section-padding-3 " style="margin-top: -11% !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-style-1">
                        <div class="row">
<?php

                       
if ($searchType === 'cast') {
                        // Get the actor name from the form
                        $actorName = $_POST['actor_name'];
                
                        // Create a query to search for cast members by name
                        $query = "SELECT * FROM cast WHERE name LIKE '%$actorName%'";
                
                        // Execute the query
                        $result = mysqli_query($con, $query);
                        
                        if ($result) {
 
                            while ($row = mysqli_fetch_assoc($result)) {
                                $castName = $row['name'];

                                // Query to count movies for the cast member by name
                                $moviesQuery = "SELECT COUNT(*) as movie_count FROM movies WHERE cast LIKE '%$castName%'";
                                $moviesResult = mysqli_query($con, $moviesQuery);
                                $moviesCount = mysqli_fetch_assoc($moviesResult)['movie_count'];
                    
                                // Query to count series for the cast member by name
                                $seriesQuery = "SELECT COUNT(*) as series_count FROM tv_series WHERE cast LIKE '%$castName%'";
                                $seriesResult = mysqli_query($con, $seriesQuery);
                                $seriesCount = mysqli_fetch_assoc($seriesResult)['series_count'];
                    
                                // Display search results here, similar to how you display movies and TV shows.
                                echo '
                                
                                
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                    <div class="gen-movie-contain">
                                        <div class="gen-movie-img">
                                            <img src="../utilities/images/cast/'.$row['image'].'" alt="streamlab-image">
                                            
                                            <div class="gen-movie-action">
                                                <a href="cast-single.php?id='.$row['id'].'" class="gen-button">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="gen-info-contain">
                                            <div class="gen-movie-info">
                                                <h3><a href="cast-single.php?id='.$row['id'].'">'.$row['name'].'</a></h3>
                                            </div>
                                            <div class="gen-movie-meta-holder">
                                                <ul>
                                                  
                                                    <li>
                                                        <a "><span>Movies: '.$moviesCount.'</span></a>
                                                    </li>

                                                    <li>
                                                    <a ><span>Series: '.$seriesCount.'</span></a>
                                                </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
 
                                
                                
                              ';
                            }
                            
                          
                        } else {
                            echo 'Error executing the search query.';
                        }
                    }
                
                
                       
                       
                        ?>

</div>
                    </div>
                </div>
                </div>
        </div>
    </section>

                 




<?php 

include("./common/footer.php");
?>