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
?>


	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Add New Series</h2>
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
											<input type="text" class="sign__input" placeholder="Title" name="title">
										</div>
									</div>

									<div class="col-12">
										<div class="sign__group">
											<textarea id="text" class="sign__textarea" placeholder="Description" name="description"></textarea>
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
                                                name="release_year">
                                        </div>
                                    </div>

                             

									<div class="col-12">
                                        <div class="sign__group">
                                            <select class="sign__selectjs" id="sign__genre" multiple name="genre[]">
                                                <option value="Action">Action</option>
                                                <option value="Animation">Animation</option>
                                                <option value="Adventure">Adventure</option>
                                                <option value="Comedy">Comedy</option>
                                                <option value="Crime">Crime</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Fantasy">Fantasy</option>
                                                <option value="Historical">Historical</option>
                                                <option value="Horror">Horror</option>
                                                <option value="Romance">Romance</option>
                                                <option value="Science-fiction">Science-fiction</option>
                                                <option value="Thriller">Thriller</option>
                                                <option value="Western">Western</option>
                                                <option value="Otheer">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-xl-6">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Rated" name="rated">
                                        </div>
                                    </div>

                                    <div class="col-12 col-xl-6">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="IMDb" name="imdb">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Tagline" name="tagline">
                                        </div>
                                    </div>
								</div>
							</div>

							<div class="col-12 col-xl-12">
                                <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Cast" name="cast">
                                </div>
                            </div>

							
							


                            <div id="tvSeriesFields" >

		<div class="col-12 mt-3">
			<div class="sign__group">
            <span class="sign__episode-title" style="font-size:23px;">Enter Season Details</span>
				<input type="text" class="sign__input" placeholder="Number of Seasons" name="num_seasons" id="num_seasons" oninput="generateSeasonFields()">
			</div>
		</div>


        <div id="seasonFields"></div>
    </div>


    
</div>






							<div class="col-12">
								<button type="submit" name="btn" class="sign__btn sign__btn--small"><span>Publish</span></button>
							</div>
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
				seasonDiv.innerHTML = '<span class="sign__episode-title" style="font-size:23px;">Season '+season+'</span>' +
					

					'<input type="text" class="sign__input mt-3" placeholder="Trailer Link of Season ' +season +'" name="season' + season + '_trailer_link">'+
					
					'<input type="text" class="sign__input mt-3" placeholder="Total Episodes of Season ' +season +'" name="season' + season + '_num_episodes" oninput="generateEpisodeFields(' + season + ')">'+
					
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
				episodeDiv.innerHTML = '<span class="sign__episode-title mt-4">Episode '+episode+'</span>' +

                '<input type="text" class="sign__input mt-3" placeholder="Episode '+episode+' Title" name="season' + season + '_episode' + episode + '_title">' +				
                '<input type="text" class="sign__input mt-3" placeholder="Episode '+episode+' Runtime" name="season' + season + '_episode' + episode + '_runtime">' +				
'<input type="text" class="sign__input mt-3" placeholder="Download Link of Episode '+episode+'" name="season' + season + '_episode' + episode + '_download_link">' +

'<input type="text" class="sign__input mt-3" placeholder="Watch Link of Episode '+episode+'" name="season' + season + '_episode' + episode + '_watch_link">' +

'<span class="sign__episode-title mt-4" style="font-size:15px; color:#c7c7c7;">Choose Air Date of Episode '+episode+'</span>'+
'<input type="date" class="sign__input " placeholder="Air Date of Episode '+episode+'" name="season' + season + '_episode' + episode + '_air_date">' +
					
					
				
				episodeFieldsDiv.appendChild(episodeDiv);
			}
		}
		
</script>

<?php


function escape_string($value) {
    global $con;
    return mysqli_real_escape_string($con, $value);
}

if (isset($_POST['btn'])) {
    $posterFilename = $_FILES['poster_img']['name'];
    $coverFilename = "";



    // Escape and sanitize all input values
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST[$key] = implode(",", array_map('escape_string', $value));
        } else {
            $_POST[$key] = escape_string($value);
        }
    }

    // Sanitized input values
    $title = $_POST['title'];
    $description = $_POST['description'];
    $release_year = $_POST['release_year'];
    // $runtime = $_POST['runtime'];
    
    $rated = $_POST['rated'];
    $imdb = $_POST['imdb'];
    $tagline = $_POST['tagline'];
    $cast = $_POST['cast'];

	$genre = $_POST["genre"] ?? '';
	
    
    $numSeasons = intval($_POST['num_seasons']);

    // Move the uploaded poster image
    $posterTemp = $_FILES['poster_img']['tmp_name'];
    $posterPath = "../utilities/images/poster/$posterFilename";
    move_uploaded_file($posterTemp, $posterPath);

    // Verify the uploaded poster image type
    $posterType = strtolower($_FILES['poster_img']['type']);
    $allowedPosterTypes = ["image/jpg", "image/jpeg", "image/png"];
    if (!in_array($posterType, $allowedPosterTypes)) {
        echo "Error: Invalid poster image type.";
        exit;
    }

    // Insert TV series data into the 'tv_series' table
    $sql = "INSERT INTO `tv_series`(`title`, `description`, `poster_image`, `release_year`, `rated`, `imdb`, `tagline`, `genre`, `cast`)
            VALUES ('$title','$description','$posterFilename','$release_year','$rated','$imdb','$tagline','$genre','$cast')";

    if ($con->query($sql) === TRUE) {
        $tvSeriesId = $con->insert_id;

        // Loop through each season and its episodes
        for ($season = 1; $season <= $numSeasons; $season++) {
            // Extract season details
            $seasonTrailerLink = $_POST["season{$season}_trailer_link"];

            $numEpisodes = intval($_POST["season{$season}_num_episodes"]);

            // Insert season data into the 'seasons' table
            $sql = "INSERT INTO seasons (`tv_series_id`, `season_number`, `trailer_link`, `num_episodes`)
                    VALUES ('$tvSeriesId', '$season', '$seasonTrailerLink', '$numEpisodes')";

            if ($con->query($sql) === TRUE) {
                $seasonId = $con->insert_id;

                // Loop through each episode in the season
                for ($episode = 1; $episode <= $numEpisodes; $episode++) {
                    // Extract episode details
                    $episodeDownloadLink = $_POST["season{$season}_episode{$episode}_download_link"];
                    $episodeWatchLink = $_POST["season{$season}_episode{$episode}_watch_link"];
                    $episodeAirDate = $_POST["season{$season}_episode{$episode}_air_date"];
                    $episodeTitle = $_POST["season{$season}_episode{$episode}_title"];
                    $episodeRuntime = $_POST["season{$season}_episode{$episode}_runtime"];

                    // Insert episode data into the 'episodes' table
                    $sql = "INSERT INTO episodes (`season_id`, `episode_number`, `episode_title`, `episode_runtime`, `download_link`, `watch_link`, `air_date`)
                            VALUES ('$seasonId', '$episode', '$episodeTitle', '$episodeRuntime', '$episodeDownloadLink', '$episodeWatchLink', '$episodeAirDate')";

                    if ($con->query($sql) !== TRUE) {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                }
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

        echo "<script>window.location.href = 'catalog-series.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close the database connection
    $con->close();
}
?>


<?php 
include("./common/footer.php");
?>

</body>
</html>