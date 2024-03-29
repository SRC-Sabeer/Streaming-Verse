





<?php
session_start();
// Check user authentication
if (!isset($_SESSION['admin'])) {
    // Redirect to the registration page
    header("Location: signin.php");
    exit();
}
include("../utilities/connection.php");
include("./common/nav.php");

function escape_string($value) {
    global $con;
    return mysqli_real_escape_string($con, $value);
}

if (isset($_GET['updateidseries'])) {
    $tvSeriesId = $_GET['updateidseries'];


    // Retrieve the TV series details from the database
    $sql = "SELECT * FROM `tv_series` WHERE `id`='$tvSeriesId'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['description'];
        $release_year = $row['release_year'];
        $rated = $row['rated'];
        $imdb = $row['imdb'];
        $tagline = $row['tagline'];
        $cast = $row['cast'];
        $genre = explode(",", $row['genre']);
    } else {
        // TV series not found
        echo "TV series not found.";
        exit;
    }

    // Retrieve the seasons and episodes for this TV series
    $sql = "SELECT * FROM `seasons` WHERE `tv_series_id`='$tvSeriesId'";
    $seasons_result = $con->query($sql);

    $seasons = [];
    while ($season_row = $seasons_result->fetch_assoc()) {
        $seasonId = $season_row['id'];
        $seasonNumber = $season_row['season_number'];
        $seasonTrailerLink = $season_row['trailer_link'];

        // Retrieve episodes for this season
        $sql = "SELECT * FROM `episodes` WHERE `season_id`='$seasonId'";
        $episodes_result = $con->query($sql);

        $episodes = [];
        while ($episode_row = $episodes_result->fetch_assoc()) {
            $episodeId = $episode_row['id'];
            $episodeNumber = $episode_row['episode_number'];
            $episodeTitle = $episode_row['episode_title'];
            $episodeRuntime = $episode_row['episode_runtime'];
            $episodeDownloadLink = $episode_row['download_link'];
            $episodeWatchLink = $episode_row['watch_link'];
            $episodeAirDate = $episode_row['air_date'];

            $episodes[] = [
                'id' => $episodeId,
                'episode_number' => $episodeNumber,
                'title' => $episodeTitle,
                'runtime' => $episodeRuntime,
                'download_link' => $episodeDownloadLink,
                'watch_link' => $episodeWatchLink,
                'air_date' => $episodeAirDate,
            ];
        }

        $seasons[] = [
            'id' => $seasonId,
            'season_number' => $seasonNumber,
            'trailer_link' => $seasonTrailerLink,
            'episodes' => $episodes,
        ];
    }
} else {
    // No TV series ID provided
    echo "TV series ID not provided.";
    exit;
}

if (isset($_POST['btn'])) {
    // Update TV series details

    // Sanitize and escape the input values (similar to what you did in add-series.php)
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST[$key] = implode(",", array_map('escape_string', $value));
        } else {
            $_POST[$key] = escape_string($value);
        }
    }

    // Retrieve the updated values from the form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $release_year = $_POST['release_year'];
    $rated = $_POST['rated'];
    $imdb = $_POST['imdb'];
    $tagline = $_POST['tagline'];
    $cast = $_POST['cast'];
    $genre = $_POST["genre"] ?? '';

    // Update the TV series details in the database
    $sql = "UPDATE `tv_series` SET 
            `title`='$title', 
            `description`='$description', 
            `release_year`='$release_year', 
            `rated`='$rated', 
            `imdb`='$imdb', 
            `tagline`='$tagline', 
            `cast`='$cast', 
            `genre`='$genre' 
            WHERE `id`='$tvSeriesId'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('TV series updated successfully.');</script>";
    } else {
        echo "Error updating TV series: " . $con->error;
    }

    $oldNumSeasons = count($seasons);

    // Retrieve the new number of seasons from the form
    $newNumSeasons = isset($_POST['num_seasons']) ? intval($_POST['num_seasons']) : 0;

    // Determine the maximum number of seasons to compare (old vs. new)
    $maxNumSeasons = max($oldNumSeasons, $newNumSeasons);

    // Delete old seasons that are no longer in the new data
    for ($seasonNumber = $newNumSeasons + 1; $seasonNumber <= $oldNumSeasons; $seasonNumber++) {
        // Find the season ID of the old season to delete
        $seasonIdToDelete = null;
        foreach ($seasons as $existingSeason) {
            if ($existingSeason['season_number'] == $seasonNumber) {
                $seasonIdToDelete = $existingSeason['id'];
                break;
            }
        }

        if ($seasonIdToDelete !== null) {
            // Delete episodes associated with the season to be deleted
            $sql = "DELETE FROM `episodes` WHERE `season_id`='$seasonIdToDelete'";
            if ($con->query($sql) === TRUE) {
                // Delete the season itself
                $sql = "DELETE FROM `seasons` WHERE `id`='$seasonIdToDelete'";
                if ($con->query($sql) === TRUE) {
                    echo "<script>window.location.href = 'catalog-series.php';</script>";
                } else {
                    echo "Error deleting Season $seasonNumber: " . $con->error . "<br>";
                }
            } else {
                echo "Error deleting episodes of Season $seasonNumber: " . $con->error . "<br>";
            }
        }
    }

    

    // Iterate through seasons and episodes
    for ($seasonNumber = 1; $seasonNumber <= $newNumSeasons; $seasonNumber++) {

        // Retrieve season-specific form data
        $seasonTrailerLink = $_POST["season{$seasonNumber}_trailer_link"];
        $numEpisodes = isset($_POST["season{$seasonNumber}_num_episodes"]) ? intval($_POST["season{$seasonNumber}_num_episodes"]) : 0;

        // Check if the season already exists in the database based on season number
        $seasonId = null;
        foreach ($seasons as $existingSeason) {
            if ($existingSeason['season_number'] == $seasonNumber) {
                $seasonId = $existingSeason['id'];
                break;
            }
        }

        // If the season does not exist, insert a new record
        if (!$seasonId) {
            $sql = "INSERT INTO `seasons` (`tv_series_id`, `season_number`, `trailer_link`, `num_episodes`)
                    VALUES ('$tvSeriesId', '$seasonNumber', '$seasonTrailerLink', '$numEpisodes')";

            if ($con->query($sql) === TRUE) {
                echo "<script>window.location.href = 'catalog-series.php';</script>";
                $seasonId = $con->insert_id; // Get the inserted season ID
            } else {
                echo "Error inserting Season $seasonNumber: " . $con->error;
                continue; // Skip to the next season
            }
        } else {
            // Season exists, update its details
            $sql = "UPDATE `seasons` SET 
                    `trailer_link`='$seasonTrailerLink', 
                    `num_episodes`='$numEpisodes' 
                    WHERE `id`='$seasonId'";

            if ($con->query($sql) === TRUE) {
                echo "<script>window.location.href = 'catalog-series.php';</script>";
            } else {
                echo "Error updating Season $seasonNumber: " . $con->error;
            }
        }

        // Process episodes for this season
        for ($episodeNumber = 1; $episodeNumber <= $numEpisodes; $episodeNumber++) {
            // Retrieve episode-specific form data
            $episodeTitle = $_POST["season{$seasonNumber}_episode{$episodeNumber}_title"];
            $episodeRuntime = $_POST["season{$seasonNumber}_episode{$episodeNumber}_runtime"];
            $episodeDownloadLink = $_POST["season{$seasonNumber}_episode{$episodeNumber}_download_link"];
            $episodeWatchLink = $_POST["season{$seasonNumber}_episode{$episodeNumber}_watch_link"];
            $episodeAirDate = $_POST["season{$seasonNumber}_episode{$episodeNumber}_air_date"];

            // Check if the episode already exists in the database based on season number and episode number
            $episodeId = null;
            foreach ($seasons as $existingSeason) {
                if ($existingSeason['season_number'] == $seasonNumber) {
                    foreach ($existingSeason['episodes'] as $existingEpisode) {
                        if ($existingEpisode['episode_number'] == $episodeNumber) {
                            $episodeId = $existingEpisode['id'];
                            break;
                        }
                    }
                }
                if ($episodeId !== null) {
                    break;
                }
            }

            // If the episode does not exist, insert a new record
            if (!$episodeId) {
                $sql = "INSERT INTO `episodes` (`season_id`, `episode_number`, `episode_title`, `episode_runtime`, `download_link`, `watch_link`, `air_date`)
                        VALUES ('$seasonId', '$episodeNumber', '$episodeTitle', '$episodeRuntime', '$episodeDownloadLink', '$episodeWatchLink', '$episodeAirDate')";

                if ($con->query($sql) === TRUE) {
                    echo "<script>window.location.href = 'catalog-series.php';</script>";
                } else {
                    echo "Error inserting Episode $episodeNumber of Season $seasonNumber: " . $con->error;
                }
            } else {
                // Episode exists, update its details
                $sql = "UPDATE `episodes` SET 
                        `episode_title`='$episodeTitle', 
                        `episode_runtime`='$episodeRuntime', 
                        `download_link`='$episodeDownloadLink', 
                        `watch_link`='$episodeWatchLink', 
                        `air_date`='$episodeAirDate' 
                        WHERE `id`='$episodeId'";

                if ($con->query($sql) === TRUE) {
                    echo "<script>window.location.href = 'catalog-series.php';</script>";
                } else {
                    echo "Error updating Episode $episodeNumber of Season $seasonNumber: " . $con->error;
                }
            }
        }
    }
}

$seasonData = json_encode($seasons);

?>
	<!-- main content -->
	<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Edit TV Series</h2>
                </div>
            </div>
            <!-- end main title -->


			  <!-- form -->
              <div class="col-12">
                <form action="#" class="sign__form sign__form--add" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-xl-7">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sign__group">
                                        <input type="text" class="sign__input" placeholder="Title" name="title"
                                            value="<?php echo htmlspecialchars($title); ?>">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="sign__group">
                                        <textarea id="text" class="sign__textarea" placeholder="Description"
                                            name="description"><?php echo htmlspecialchars($description); ?></textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-6">
                                    <div class="sign__group">
                                        <div class="sign__gallery">
                                            <label id="gallery1" for="sign__gallery-upload">Upload Poster
                                                (240x340)</label>
                                            <input data-name="#gallery1" id="sign__gallery-upload" name="poster_img"
                                                class="sign__gallery-upload" type="file" accept=".png, .jpg, .jpeg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


								
                        <div class="col-12 col-xl-5">
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="sign__group">
                                        <input type="text" class="sign__input" placeholder="Release Year"
                                            name="release_year" value="<?php echo htmlspecialchars($release_year); ?>">
                                    </div>
                                </div>


                             

                                <div class="col-12">
                                    <div class="sign__group">
                                        <select class="sign__selectjs" id="sign__genre" multiple name="genre[]">
                                            <?php
                                            $allGenres = ["Action", "Animation", "Adventure", "Comedy", "Crime",
                                                "Drama", "Fantasy", "Historical", "Horror", "Romance", "Science-fiction",
                                                "Thriller", "Western", "Other"
                                            ];

                                            foreach ($allGenres as $genreOption) {
                                                $isSelected = in_array($genreOption, $genre) ? 'selected' : ''; // Check if the genre is selected based on your fetched data
                                                echo '<option value="' . $genreOption . '" ' . $isSelected . '>' . $genreOption . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 col-xl-6">
                                    <div class="sign__group">
                                        <input type="text" class="sign__input" placeholder="Rated"
                                            name="rated" value="<?php echo htmlspecialchars($rated); ?>">
                                    </div>
                                </div>

                                <div class="col-12 col-xl-6">
                                    <div class="sign__group">
                                        <input type="text" class="sign__input" placeholder="IMDb"
                                            name="imdb" value="<?php echo htmlspecialchars($imdb); ?>">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="sign__group">
                                        <input type="text" class="sign__input" placeholder="Tagline"
                                            name="tagline" value="<?php echo htmlspecialchars($tagline); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-xl-12">
                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Cast" name="cast"
                                    value="<?php echo htmlspecialchars($cast); ?>">
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="sign__group">
                                <span class="sign__episode-title" style="font-size: 23px;">Enter Season Details</span>
                                <input type="text" class="sign__input" placeholder="Number of Seasons" name="num_seasons" id="num_seasons" oninput="generateSeasonFields()">
                            </div>
                        </div>
						
                        <div id="seasonFields"></div>
                    </div>


                    <div class="col-12">
                        <button type="submit" name="btn" class="sign__btn sign__btn--small"><span>Update</span></button>
                    </div>



					</form>
				</div>
				<!-- end form -->
				<!-- end form -->
			</div>
		</div>
	</main>
	<!-- end main content -->


    <script>
    function generateSeasonFields() {
        var numSeasons = parseInt(document.getElementById('num_seasons').value);
        var seasonFieldsDiv = document.getElementById('seasonFields');
        seasonFieldsDiv.innerHTML = '';

        for (var season = 1; season <= numSeasons; season++) {
            var seasonDiv = document.createElement('div');
            seasonDiv.innerHTML = '<span class="sign__episode-title" style="font-size:23px;">Season ' + season + '</span>' +
                '<input type="text" class="sign__input mt-3" placeholder="Trailer Link of Season ' + season + '" name="season' + season + '_trailer_link">' +
                '<input type="text" class="sign__input mt-3" placeholder="Total Episodes of Season ' + season + '" name="season' + season + '_num_episodes" oninput="generateEpisodeFields(' + season + ')">' +
                '<div id="season' + season + '_episodeFields"></div><br><br>';

            seasonFieldsDiv.appendChild(seasonDiv);
        }
    }

    function generateEpisodeFields(season) {
        var numEpisodes = parseInt(document.getElementsByName('season' + season + '_num_episodes')[0].value);
        var episodeFieldsDiv = document.getElementById('season' + season + '_episodeFields');
        episodeFieldsDiv.innerHTML = '';

        for (var episode = 1; episode <= numEpisodes; episode++) {
            var episodeDiv = document.createElement('div');
            episodeDiv.innerHTML = '<span class="sign__episode-title mt-4">Episode ' + episode + '</span>' +
                '<input type="text" class="sign__input mt-3" placeholder="Episode ' + episode + ' Title" name="season' + season + '_episode' + episode + '_title">' +
                '<input type="text" class="sign__input mt-3" placeholder="Episode ' + episode + ' Runtime" name="season' + season + '_episode' + episode + '_runtime">' +
                '<input type="text" class="sign__input mt-3" placeholder="Download Link of Episode ' + episode + '" name="season' + season + '_episode' + episode + '_download_link">' +
                '<input type="text" class="sign__input mt-3" placeholder="Watch Link of Episode ' + episode + '" name="season' + season + '_episode' + episode + '_watch_link">' +
                '<span class="sign__episode-title mt-4" style="font-size:15px; color:#c7c7c7;">Choose Air Date of Episode ' + episode + '</span>' +
                '<input type="date" class="sign__input " placeholder="Air Date of Episode ' + episode + '" name="season' + season + '_episode' + episode + '_air_date">';

            episodeFieldsDiv.appendChild(episodeDiv);
        }
    }


    var oldSeasons = <?php echo $seasonData; ?>;

// Function to populate the form fields with old season and episode data
function populateFormFields() {
    var numSeasons = oldSeasons.length;

    // Set the number of seasons
    document.getElementById('num_seasons').value = numSeasons;

    // Generate the season fields based on the number of seasons
    generateSeasonFields();

    // Populate the form fields with old season and episode data
    for (var i = 0; i < numSeasons; i++) {
        var season = oldSeasons[i];
        var seasonNumber = season.season_number;
        var trailerLink = season.trailer_link;
        var numEpisodes = season.episodes.length;

        // Set the trailer link for the season
        document.getElementsByName('season' + seasonNumber + '_trailer_link')[0].value = trailerLink;

        // Set the number of episodes for the season
        document.getElementsByName('season' + seasonNumber + '_num_episodes')[0].value = numEpisodes;

        // Generate the episode fields for the season
        generateEpisodeFields(seasonNumber);

        // Populate the episode fields with old episode data
        for (var j = 0; j < numEpisodes; j++) {
            var episode = season.episodes[j];
            var episodeNumber = episode.episode_number;
            var episodeTitle = episode.title;
            var episodeRuntime = episode.runtime;
            var downloadLink = episode.download_link;
            var watchLink = episode.watch_link;
            var airDate = episode.air_date;

            // Set the episode title
            document.getElementsByName('season' + seasonNumber + '_episode' + episodeNumber + '_title')[0].value = episodeTitle;

            // Set the episode runtime
            document.getElementsByName('season' + seasonNumber + '_episode' + episodeNumber + '_runtime')[0].value = episodeRuntime;

            // Set the download link for the episode
            document.getElementsByName('season' + seasonNumber + '_episode' + episodeNumber + '_download_link')[0].value = downloadLink;

            // Set the watch link for the episode
            document.getElementsByName('season' + seasonNumber + '_episode' + episodeNumber + '_watch_link')[0].value = watchLink;

            // Set the air date for the episode
            document.getElementsByName('season' + seasonNumber + '_episode' + episodeNumber + '_air_date')[0].value = airDate;
        }
    }
}

// Call the populateFormFields function to populate the form with old data
populateFormFields();

   </script>

<?php 
include("./common/footer.php");
?>

</body>
</html>