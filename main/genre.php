<?php
// Include your database connection code here (e.g., using mysqli)
include("../utilities/connection.php");
include("./common/nav.php");

// Check if a genre is selected
if (isset($_GET['genre'])) {
    $selectedGenre = $_GET['genre'];
    
    // Check if it's a movie or TV show genre
    if ($_GET['type'] === 'movies') {
        $tableName = 'movies';
        $title = 'Movies';
        $categoryType = 'Movie';
    } elseif ($_GET['type'] === 'shows') {
        $tableName = 'tv_series';
        $title = 'TV Shows';
        $categoryType = 'TV Show';
    } else {
        // Handle invalid type (you may want to add better error handling)
        echo "Invalid type selected.";
        exit;
    }

    // Query the database to retrieve items of the selected genre
// Modify the SQL query to include the total number of seasons
if ($categoryType === 'TV Show') {
    $query = "SELECT tv_series.*, COUNT(seasons.id) AS total_seasons
              FROM tv_series
              LEFT JOIN seasons ON tv_series.id = seasons.tv_series_id
              WHERE tv_series.genre LIKE '%$selectedGenre%'
              GROUP BY tv_series.id";
} else {
    // For movies, use the original query
    $query = "SELECT * FROM $tableName WHERE genre LIKE '%$selectedGenre%'";
}

    
    // Execute the query and fetch results using mysqli
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Database query failed."); // Add error handling as needed
    }


    echo '
    <div class="gen-breadcrumb" >
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <div class="gen-breadcrumb-title">
                        <h1>
                       '. $selectedGenre .'
                        </h1>
                    </div>
                    <div class="gen-breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php"><i
                                        class="fas fa-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">'.$title.'</li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->
    ';
    echo "<ul>";
    // Loop through the results and display them
  
   

    // Close the database connection
    mysqli_close($con);
    
    // Display additional content based on the category type (Movie or TV Show)
    if ($categoryType === 'Movie') {
        // Additional code for movies
        echo ' <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
           
            echo '   <div class="col-xl-3 col-lg-4 col-md-6">
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
        </div>';
        }
        echo '        </div>
        </div>
        </div>
        </div>
    </section>';
    } elseif ($categoryType === 'TV Show') {
        echo '  <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '  <div class="col-xl-3 col-lg-4 col-md-6">
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
        </div>';
        }

        echo '   </div>
        </div>
        </div>
        </div>
    </section>';
    }
} else {
    // Handle case where no genre is selected
    echo "Please select a genre.";
}

echo "</ul>";
?>
