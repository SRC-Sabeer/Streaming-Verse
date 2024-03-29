<?php

session_start();
// Check user authentication
if (!isset($_SESSION['user'])) {
    // Redirect to the registration page
    header("Location: register.php");
    exit();
}


include("./common/nav.php");
include("../utilities/connection.php");



// Get the actor's ID from the URL
$actorId = $_GET['id'];

// Query to retrieve actor details
$actorQuery = "SELECT * FROM cast WHERE id = $actorId";
$actorResult = mysqli_query($con, $actorQuery);

// Check if actor exists
if ($actorResult && $actorRow = mysqli_fetch_assoc($actorResult)) {
    $actorName = $actorRow['name'];
    $actorAwards = $actorRow['awards'];
    $actorDOB = $actorRow['date_of_birth'];
    $actorDescription = $actorRow['film_industry'];
} else {
    // Handle the case where the actor is not found
    echo "Actor not found.";
    exit();
}

// Query to retrieve movies associated with the actor
$moviesQuery = "SELECT movies.* FROM movies
                WHERE movies.cast LIKE '%$actorName%'";

$moviesResult = mysqli_query($con, $moviesQuery);

// Query to retrieve series associated with the actor
$seriesQuery = "SELECT tv_series.*, COUNT(DISTINCT seasons.id) AS total_seasons
                FROM tv_series
                LEFT JOIN seasons ON tv_series.id = seasons.tv_series_id
                WHERE tv_series.cast LIKE '%$actorName%'
                GROUP BY tv_series.id";

$seriesResult = mysqli_query($con, $seriesQuery);

?>

<section class="gen-section-padding-3 gen-single-movie">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="gen-single-movie-wrapper style-1">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="gen-video-holder">
                                <img src="../utilities/images/cast/<?php echo $actorRow['image']; ?>" alt="">
                            </div>
                            <div class="gen-single-movie-info">
                                <h2 class="gen-title d-flex justify-content-center"><?php echo $actorName; ?></h2>
                                <div class="gen-single-meta-holder d-flex justify-content-center">
                                    <ul>
                                        <li class="gen-sen-rating ">Awards: <?php echo $actorAwards; ?></li>
                                        <li>
                                            <span>DOB: <?php echo $actorDOB; ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                                $gender = $actorRow['gender'];
                                $genderLabel = ($gender === 'male') ? 'Actor' : 'Actress';
                                ?>
                                <p class="d-flex justify-content-center">
                                    <span ><?php echo $actorDescription; ?> <?php echo $genderLabel; ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="pm-inner">
                                <?php
                                $hasMovies = mysqli_num_rows($moviesResult) > 0;
                                $hasSeries = mysqli_num_rows($seriesResult) > 0;
                                ?>

                                <?php if ($hasMovies): ?>
                                    <div class="gen-more-like">
                                        <h5 class="gen-more-title">Movies</h5>
                                        <div class="row">
                                            <!-- Display associated movies here -->
                                            <?php
                                            while ($movieRow = mysqli_fetch_assoc($moviesResult)) {
                                                echo '<div class="col-xl-3 col-lg-4 col-md-6">
                                                        <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                                            <div class="gen-movie-contain">
                                                                <div class="gen-movie-img">
                                                                    <img src="../utilities/images/poster/' . $movieRow['poster_img'] . '" alt="streamlab-image">
                                                                    <div class="gen-movie-add">
                                                                        <!-- Add your movie actions here -->
                                                                    </div>
                                                                    <div class="gen-movie-action">
                                                                        <a href="single-movie.php?movie_id='.$movieRow['id'].'" class="gen-button">
                                                                            <i class="fa fa-play"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="gen-info-contain">
                                                                    <div class="gen-movie-info">
                                                                        <h3><a href="single-movie.php?movie_id='.$movieRow['id'].'">' . $movieRow['title'] . '</a></h3>
                                                                    </div>
                                                                    <div class="gen-movie-meta-holder">
                                                                    <ul>
                                                                    <li><i class="fa-regular fa-clock red-c"></i>  '.$movieRow['runtime'].' m</li>
                                                                    <li>
                                                                      <span><i class="fa-solid fa-star red-c"></i> '.$movieRow['imdb'].'</span>
                                                                    </li>
                                                                    <li>
                                                                   <span class="red-c">'.$movieRow['release_year'].'</span>
                                                                 </li>
                                                                 </ul>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($hasSeries): ?>
                                    <div class="gen-more-like">
                                        <h5 class="gen-more-title">Series</h5>
                                        <div class="row">
                                            <!-- Display associated series here -->
                                            <?php
                                            while ($seriesRow = mysqli_fetch_assoc($seriesResult)) {
                                                echo '<div class="col-xl-3 col-lg-4 col-md-6">
                                                        <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                                            <div class="gen-movie-contain">
                                                                <div class="gen-movie-img">
                                                                    <img src="../utilities/images/poster/' . $seriesRow['poster_image'] . '" alt="streamlab-image">
                                                                    <div class="gen-movie-add">
                                                                        <!-- Add your series actions here -->
                                                                    </div>
                                                                    <div class="gen-movie-action">
                                                                        <a href="single-series.php?tv_series_id='.$seriesRow['id'].'" class="gen-button">
                                                                            <i class="fa fa-play"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="gen-info-contain">
                                                                    <div class="gen-movie-info">
                                                                        <h3><a href="single-series.php?tv_series_id='.$seriesRow['id'].'">' . $seriesRow['title'] . '</a></h3>
                                                                    </div>
                                                                    <div class="gen-movie-meta-holder">
                                                                    

                                                                        <ul>
                                                                        <li>'.  $seriesRow['total_seasons']  . ' Seasons</li>
                                                                        <li>
                                                                        <span><i class="fa-solid fa-star red-c"></i> '.$seriesRow['imdb'].'</span>
                                                                      </li>
                                                                      <li>
                                                                     <span class="red-c">'.$seriesRow['release_year'].'</span>
                                                                     </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (!$hasMovies && !$hasSeries): ?>
                                    <p>No movies or series found for this actor.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("./common/footer.php");
?>
