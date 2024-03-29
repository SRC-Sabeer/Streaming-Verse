<?php
session_start();
// Check user authentication
if (!isset($_SESSION['user'])) {
    // Redirect to the registration page
    header("Location: register.php");
    exit();
}

// Include the connection file
include("../utilities/connection.php");
include("./common/nav.php");

// Retrieve the user's ID from the database based on their username or email
$username = $_SESSION['user']; // Assuming the session variable holds the username or email
$query = "SELECT id, firstname FROM users WHERE username = '$username' OR email = '$username'";
$result = mysqli_query($con, $query);

if ($result && $row = mysqli_fetch_assoc($result)) {
    $user_id = $row['id'];
    $user_firstname = $row['firstname'];
    $breadcrumb_text = "$user_firstname's Watchlist";
    // Fetch movie IDs and series IDs from the watchlist
    $query = "SELECT movie_id, series_id FROM watchlist WHERE user_id = $user_id";
    $result = mysqli_query($con, $query);

    // Create arrays to store movie IDs and series IDs
    $movieIDs = [];
    $seriesIDs = [];

    while ($row = mysqli_fetch_assoc($result)) {
        if (!empty($row['movie_id'])) {
            $movieIDs[] = $row['movie_id'];
        }
        if (!empty($row['series_id'])) {
            $seriesIDs[] = $row['series_id'];
        }
    }

    // Query the movies table to fetch movie details
    if (!empty($movieIDs)) {
        $movieIDString = implode(",", $movieIDs);
        $movieQuery = "SELECT * FROM movies WHERE id IN ($movieIDString)";
        $movieResult = mysqli_query($con, $movieQuery);
        $movies = [];

        while ($movieRow = mysqli_fetch_assoc($movieResult)) {
            $movies[] = $movieRow;
        }
    }

    // Query the tv_series table to fetch series details
    if (!empty($seriesIDs)) {
        $seriesIDString = implode(",", $seriesIDs);
        $seriesQuery = "SELECT tv_series.*, COUNT(seasons.id) AS total_seasons
                        FROM tv_series
                        LEFT JOIN seasons ON tv_series.id = seasons.tv_series_id
                        WHERE tv_series.id IN ($seriesIDString)
                        GROUP BY tv_series.id";
        $seriesResult = mysqli_query($con, $seriesQuery);
        $series = [];

        while ($seriesRow = mysqli_fetch_assoc($seriesResult)) {
            $series[] = $seriesRow;
        }
    }
}
?>


<!-- breadcrumb -->
<div class="gen-breadcrumb" style="background-image: url('../utilities/images/fix/breadcrumb-bg.jpeg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <div class="gen-breadcrumb-title">
                        <h1>
                        <?php echo $breadcrumb_text; ?> 
                        </h1>
                    </div>
                    <div class="gen-breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php"><i class="fas fa-home mr-2"></i>Home</a>
                            </li>
                            <li class="breadcrumb-item active">Watchlist</li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->


<!-- Sort -->
<div class="container mt-4 mb-0 d-flex">
    <div class="col-2">
        <select class="form-select" id="watchlistFilter" aria-label="Default select example">
            <option value="all">All</option>
            <option value="movies">Movies</option>
            <option value="series">TV Shows</option>
        </select>
    </div>
</div>
<!-- Sort -->





<section class="gen-section-padding-3 mb-0 pb-0" id="moviesSection">
    <div class="container">
        <h2>Movies</h2>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                if (!empty($movies)) {
                    foreach ($movies as $movie) {
                        echo '
                        <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gen-carousel-movies-style-3 movie-grid style-3">
                            <div class="gen-movie-contain">
                                <div class="gen-movie-img">
                                    <img src="../utilities/images/poster/'.$movie['poster_img'].'" alt="srcverse-image">
                                    <div class="gen-movie-add">
                                        
                                        <div class="movie-actions--link_add-to-playlist dropdown">
                                            <a class="dropdown-toggle" href="common/removeFromWatchlist.php?type=movie&id='.$movie['id'].'" ><i class="fa-solid fa-xmark fa-flip" style="color: #ff0000; font-weight:bold;"></i></a>
                                          
                                        </div>
                                    </div>
                                    <div class="gen-movie-action">
                                        <a href="single-movie.php?movie_id='.$movie['id'].'" class="gen-button">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                        <h3><a href="single-movie.php?movie_id='.$movie['id'].'">'.$movie['title'].'</a></h3>
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
                        ';
                    }
                } else {
                    echo '<li>No movies in your watchlist.</li>';
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="gen-section-padding-3 mt-0 " id="seriesSection">
    <div class="container">
        <h2>TV Shows</h2>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                if (!empty($series)) {
                    foreach ($series as $tvSeries) {
                        echo '
                        <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gen-carousel-movies-style-3 movie-grid style-3">
                            <div class="gen-movie-contain">
                                <div class="gen-movie-img">
                                    <img src="../utilities/images/poster/'.$tvSeries['poster_image'].'" alt="srcverse-image">
                                    <div class="gen-movie-add">
                                        
                                        <div class="movie-actions--link_add-to-playlist dropdown">
                                            <a class="dropdown-toggle" href="common/removeFromWatchlist.php?type=series&id='.$tvSeries['id'].'" ><i class="fa-solid fa-xmark fa-flip" style="color: #ff0000; font-weight:bold;"></i></a>
                                          
                                        </div>
                                    </div>
                                    <div class="gen-movie-action">
                                        <a href="single-series.php?tv_series_id='.$tvSeries['id'].'" class="gen-button">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                        <h3><a href="single-series.php?tv_series_id='.$tvSeries['id'].'">'.$tvSeries['title'].'</a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                    <ul>
                                    <li>'.$tvSeries['total_seasons'].' Seasons</li>
                                    <li>
                                    <span><i class="fa-solid fa-star red-c"></i> '.$tvSeries['imdb'].'</span>
                                  </li>
                                  <li>
                                 <span class="red-c">'.$tvSeries['release_year'].'</span>
                                 </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        ';
                    }
                } else {
                    echo '<li>No TV series in your watchlist.</li>';
                }
                ?>
                </div>
            </div>

        </div>
    </div>
</section>






<!-- Rest of your HTML code here -->




<script>
// Function to filter movies and TV shows based on the selected option
function filterWatchlist() {
    var selectedOption = document.getElementById('watchlistFilter').value;
    var movieSection = document.getElementById('moviesSection');
    var seriesSection = document.getElementById('seriesSection');

    // Hide both sections initially
    movieSection.style.display = 'none';
    seriesSection.style.display = 'none';

    if (selectedOption === 'all') {
        // Show both sections when 'All' is selected
        movieSection.style.display = 'block';
        seriesSection.style.display = 'block';
    } else if (selectedOption === 'movies') {
        // Show only the movies section when 'Movies' is selected
        movieSection.style.display = 'block';
    } else if (selectedOption === 'series') {
        // Show only the TV shows section when 'TV Shows' is selected
        seriesSection.style.display = 'block';
    }
}

// Add an event listener to the select menu to trigger the filter
document.getElementById('watchlistFilter').addEventListener('change', filterWatchlist);

// Initial filter to match the selected option when the page loads
filterWatchlist();
</script>




<?php
include("./common/footer.php");
?>