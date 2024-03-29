<?php
include("./common/nav.php");
include("../utilities/connection.php");

// Get the episode ID from the URL parameter
$episodeId = $_GET['episode_id']; // You should sanitize and validate user input

// Fetch episode details
$query = "SELECT * FROM episodes WHERE id = $episodeId";
$result = mysqli_query($con, $query);
$episodeData = $result->fetch_assoc();

// Fetch associated season details
$seasonId = $episodeData['season_id'];
$querySeason = "SELECT * FROM seasons WHERE id = $seasonId";
$resultSeason = mysqli_query($con, $querySeason);
$seasonData = $resultSeason->fetch_assoc();

// Fetch associated TV series details
$tvSeriesId = $seasonData['tv_series_id'];
$queryTVSeries = "SELECT * FROM tv_series WHERE id = $tvSeriesId";
$resultTVSeries = mysqli_query($con, $queryTVSeries);
$tvSeriesData = $resultTVSeries->fetch_assoc();

// ... The rest of your HTML and layout code ...
?>




  <!-- Single-tv-Shows -->
  <section class="position-relative gen-section-padding-3">
        <div class="tv-single-background">
            <img src="images/background/asset-15.jpeg" alt="stream-lab-image">
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
                                        <h2 class="gen-title"><?php echo $episodeData['episode_title']; ?></h2>
                                        <div class="gen-single-meta-holder">
                                            <ul>
                                                <li>Season <?php echo $seasonData['season_number']; ?></li>
                                                <li>Episode <?php echo $episodeData['episode_number']; ?></li>
                                                <li><?php echo $episodeData['air_date']; ?></li>
                                                <li><?php echo $episodeData['episode_runtime']; ?>m</li>
                                               
                                            </ul>
                                        </div>
                                        <p><?php echo $tvSeriesData['description']; ?></p>
                                        <div class="gen-socail-share mt-0">
                                        <div class="gen-movie-action">
                        <div class="gen-btn-container">
                            <a  href="https://www.youtube.com/watch?v=<?php echo $seasonData['trailer_link']; ?>" class="gen-button playBut popup-youtube popup-vimeo popup-gmaps">
                                <span class="text">Watch Trailer</span>
                            </a>
                        </div>
                    </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">Enjoy Now</h5>
                            <div class="col-lg-12" style="display: flex ;justify-content: center;align-items: center;margin: 0;">
                            
                    <div class="gen-movie-action">
                        <div class="gen-btn-container">
                            <a href="<?php echo $episodeData['download_link']; ?>" class="gen-button" download>
                                <span class="text">Download Now &nbsp; <i class="fa-solid fa-download fa-bounce"></i></span>
                            </a>
                        </div>
                    </div>
                    
                </div> 

                <h5 style="text-align: center;" class="mt-5 mb-5">OR</h5>



                            <div class="row post-loadmore-wrapper"  style="display: flex ;justify-content: center;align-items: center;margin: 0;">
                            <div class="pm-inner">
                                   
                                   <div class="gen-more-like" id="watch-now"  style=" display: flex ;justify-content: center;align-items: center;margin: 0;">
                                   <iframe width="640" height="360" style="max-width:100%;max-height:100%; " frameborder="0" src="<?php echo $episodeData['watch_link']; ?>" allowfullscreen></iframe>
                                   </div>
                                </div>
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
