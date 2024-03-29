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

// Assume $tvSeriesId is the ID of the selected TV series
$tvSeriesId = $_GET['tv_series_id']; // You should sanitize and validate user input

// Fetch TV series details
$query = "SELECT * FROM tv_series WHERE id = $tvSeriesId";
$result = mysqli_query($con, $query);
$tvSeriesData = $result->fetch_assoc();

// Fetch seasons and episodes
$query = "SELECT * FROM seasons WHERE tv_series_id = $tvSeriesId";
$result = mysqli_query($con, $query);
$seasonsData = [];
while ($row = $result->fetch_assoc()) {
    $seasonId = $row['id'];
    $queryEpisodes = "SELECT * FROM episodes WHERE season_id = $seasonId";
    $resultEpisodes = mysqli_query($con, $queryEpisodes);
    $episodesData = [];
    while ($episodeRow = $resultEpisodes->fetch_assoc()) {
        $episodesData[] = $episodeRow;
    }
    $row['episodes'] = $episodesData;
    $seasonsData[] = $row;
}

// Function to check if the TV series is in the user's watchlist
function isSeriesInWatchlist($con, $user_id, $series_id) {
    $query = "SELECT * FROM watchlist WHERE user_id = $user_id AND series_id = $series_id";
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result) > 0;
}

// Check if the TV series is in the user's watchlist
if (isset($_SESSION['user'])) {
    // Retrieve the user's ID from the database based on their username or email
    $username = $_SESSION['user']; // Assuming the session variable holds the username or email
    $query = "SELECT id FROM users WHERE username = '$username' OR email = '$username'";
    $result = mysqli_query($con, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $user_id = $row['id'];
        $isInWatchlist = isSeriesInWatchlist($con, $user_id, $tvSeriesId);
    }
}
?>



<!-- Single-tv-Shows -->
<section class="position-relative gen-section-padding-3">
    <div class="tv-single-background">
        <img src="../utilities/images/poster/<?php echo $tvSeriesData['poster_image']; ?>" alt="stream-lab-image">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="gen-tv-show-wrapper style-1">
                    <div class="gen-tv-show-top">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="gentech-tv-show-img-holder">
                                    <img src="../utilities/images/poster/<?php echo $tvSeriesData['poster_image']; ?>" alt="stream-lab-image">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="gen-single-tv-show-info">
                                    <h2 class="gen-title"><?php echo $tvSeriesData['title']; ?></h2>
                                    <div class="gen-single-meta-holder">
                                        <ul>
                                            <li><?php echo count($seasonsData); ?> Seasons</li>
                                            <li><?php
                                                $totalEpisodes = 0;
                                                foreach ($seasonsData as $season) {
                                                    $totalEpisodes += count($season['episodes']);
                                                }
                                                echo $totalEpisodes; ?> Episodes</li>
                                            <li><?php echo $tvSeriesData['release_year']; ?></li>
                                            <!-- Add genres and views data here -->
                                        </ul>
                                    </div>
                                    <p><?php echo $tvSeriesData['description']; ?></p>
                                    <div class="gen-socail-share mt-0">
                                    <?php
    if (isset($_SESSION['user'])) {
        if ($isInWatchlist) {
            echo '
            
            <div class="gen-btn-container">
            <a  href="common/removeFromWatchlist.php?type=series&id=' . $tvSeriesId . '" class="gen-button">
                <span class="text">Remove From Watchlist</span>
            </a>
        </div>
            
           ';
        } else {
            echo '
            
            <div class="gen-btn-container">
            <a href="common/addToWatchlist.php?type=series&id=' . $tvSeriesId . '" class="gen-button">
                <span class="text">Add To Watchlist</span>
            </a>
        </div>
            
         ';
        }
    }
    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gen-season-holder">
                        <ul class="nav">
                        <?php foreach ($seasonsData as $index => $season) { ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($index === 0) echo 'active show'; ?>" 
                                       data-toggle="tab" 
                                       href="#season_<?php echo $season['id']; ?>">
                                       Season <?php echo $index + 1; ?> Eps <?php echo count($season['episodes']); ?>
                                    </a>
                                  
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content">
                        <?php foreach ($seasonsData as $index => $season) { ?>
    <div id="season_<?php echo $season['id']; ?>" 
         class="tab-pane <?php if ($index === 0) echo 'active show'; ?>">
        <div class="owl-carousel owl-loaded owl-drag" 
             data-dots="false" data-nav="true"
             data-desk_num="4" data-lap_num="3" 
             data-tab_num="2" data-mob_num="1"
             data-mob_sm="1" data-autoplay="false" 
             data-loop="false" data-margin="30">
            <?php foreach ($season['episodes'] as $episodeIndex => $episode) { ?>
                <div class="item">
                    <div class="gen-episode-contain">
                        <div class="gen-episode-img">
                            <img src="../utilities/images/poster/<?php echo $tvSeriesData['poster_image']; ?>" alt="stream-lab-image">
                            <div class="gen-movie-action">
    <a href="episode-details.php?episode_id=<?php echo $episode['id']; ?>" class="gen-button">
        <i class="fa fa-play"></i>
    </a>
</div>
                        </div>
                        <div class="gen-info-contain">
                            <div class="gen-episode-info">
                                <h3>S<?php echo $index + 1; ?>E<?php echo $episodeIndex + 1; ?>
                                    <span>- </span>
                                    <a href="#">
                                       
                                    </a>
                                </h3>
                            </div>
                            <div class="gen-single-meta-holder">
                                <ul>
                                    <li class="release-date"><?php echo $episode['air_date']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Single-tv-Shows -->

<?php 
include("./common/footer.php");
?>


