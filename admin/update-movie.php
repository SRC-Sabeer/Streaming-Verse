<?php
session_start();
// Check user authentication
if (!isset($_SESSION['admin'])) {
    // Redirect to the registration page
    header("Location: signin.php");
    exit();
}
include("../utilities/connection.php");

$update_id = $_GET['updateid'];
$query = "SELECT * FROM `movies` WHERE id = $update_id";

$run = mysqli_query($con , $query);
$record = mysqli_fetch_array($run);



function escape_string($value) {
    global $con;
    return mysqli_real_escape_string($con, $value);
}

if (isset($_POST['btn'])) {
    $posterFilename = $_FILES['poster_img']['name'];
    $coverFilename = "";

  
    
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST[$key] = implode(",", array_map('escape_string', $value));
        } else {
            $_POST[$key] = escape_string($value);
        }
    }
	$title = $_POST['title'];
	$description = $_POST['description'];
	$release_year = $_POST['release_year'];
    $runtime = $_POST['runtime'];
    $genre = $_POST["genre"] ?? '';
    $rated = $_POST['rated'];
    $imdb = $_POST['imdb'];
    $tagline = $_POST['tagline'];
	$download_link = $_POST['download_link'];
    $trailer_link = $_POST['trailer_link'];
    $watch_link = $_POST['watch_link'];
    $cast = $_POST['cast'];


    $size = $_FILES['poster_img']['size'];
    $temp = $_FILES['poster_img']['tmp_name'];
    $type = $_FILES['poster_img']['type'];

    move_uploaded_file($temp, "../utilities/images/poster/$posterFilename");
    
    if (strtolower($type) == "image/jpg"
        || strtolower($type) == "image/jpeg"
        || strtolower($type) == "image/png") {

        $imagename = $_FILES['poster_img']['name'];

        $update = "UPDATE `movies` SET `title`='$title',`description`='$description',`poster_img`='$posterFilename',`release_year`='$release_year',`rated`='$rated',`imdb`='$imdb',`runtime`='$runtime',`tagline`='$tagline',`genre`='$genre',`cast`='$cast',`trailer_link`='$trailer_link',`download_link`='$download_link',`watch_link`='$watch_link' WHERE `movies`.`id` = $update_id";

        $run = mysqli_query($con, $update);
        if ($run) {
            echo "<script>window.location.href = 'catalog-movies.php';</script>";
        }

    } else {
        echo "Invalid file type. Please upload a JPG, JPEG, or PNG image.";
    }
}
?>



<?php 
include("./common/nav.php")
?>


	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Update Existing Movie</h2>
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
											<input type="text" class="sign__input" placeholder="Title" name="title" value="<?php echo $record[1] ?>">
										</div>
									</div>

									<div class="col-12">
										<div class="sign__group">
											<textarea id="text" class="sign__textarea" placeholder="Description" name="description"><?php echo $record[2] ?></textarea>
										</div>
									</div>

									<div class="col-12 col-xl-6">
                                        <div class="sign__group">
                                            <div class="sign__gallery">
                                                <label id="gallery1" for="sign__gallery-upload">Upload Poster
                                                    (240x340)</label>
                                                <input data-name="#gallery1" id="sign__gallery-upload" name="poster_img"
                                                    class="sign__gallery-upload" type="file" accept=".png, .jpg, .jpeg" value="<?php echo $record[3] ?>">
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
                                                name="release_year" value="<?php echo $record[4] ?>">
                                        </div>
                                    </div>

                                    <div class="col-12 col-xl-6" id="runtime-m">
										
											<div class="sign__group">
												<input type="text" class="sign__input" placeholder="Runtime" name="runtime" value="<?php echo $record[7] ?>">
											</div>
										
									</div>

                                    <div class="col-12">
                                    <div class="sign__group">
                                    <select class="sign__selectjs" id="sign__genre" multiple name="genre[]">
                                        <option value="Action" <?php if (strpos($record[9], 'Action') !== false) echo 'selected'; ?>>Action</option>
            <option value="Animation" <?php if (strpos($record[9], 'Animation') !== false) echo 'selected'; ?>>Animation</option>
            <option value="Adventure" <?php if (strpos($record[9], 'Adventure') !== false) echo 'selected'; ?>>Adventure</option>
            <option value="SuperNatural" <?php if (strpos($record[9], 'SuperNatural') !== false) echo 'selected'; ?>>SuperNatural</option>
            <option value="Comedy" <?php if (strpos($record[9], 'Comedy') !== false) echo 'selected'; ?>>Comedy</option>
            <option value="Crime" <?php if (strpos($record[9], 'Crime') !== false) echo 'selected'; ?>>Crime</option>
            <option value="Drama" <?php if (strpos($record[9], 'Drama') !== false) echo 'selected'; ?>>Drama</option>
            <option value="Fantasy" <?php if (strpos($record[9], 'Fantasy') !== false) echo 'selected'; ?>>Fantasy</option>
            <option value="Historical" <?php if (strpos($record[9], 'Historical') !== false) echo 'selected'; ?>>Historical</option>
            <option value="Horror" <?php if (strpos($record[9], 'Horror') !== false) echo 'selected'; ?>>Horror</option>
            <option value="Romance" <?php if (strpos($record[9], 'Romance') !== false) echo 'selected'; ?>>Romance</option>
            <option value="Science-fiction" <?php if (strpos($record[9], 'Science-fiction') !== false) echo 'selected'; ?>>Science-fiction</option>
            <option value="Thriller" <?php if (strpos($record[9], 'Thriller') !== false) echo 'selected'; ?>>Thriller</option>
            <option value="Western" <?php if (strpos($record[9], 'Western') !== false) echo 'selected'; ?>>Western</option>
            <option value="Other" <?php if (strpos($record[9], 'Other') !== false) echo 'selected'; ?>>Other</option>
                                        </select>
                                    </div>
                                </div>

                                    <div class="col-12 col-xl-6">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Rated" name="rated" value="<?php echo $record[5] ?>">
                                        </div>
                                    </div>

                                    <div class="col-12 col-xl-6">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="IMDb" name="imdb" value="<?php echo $record[6] ?>">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Tagline" name="tagline" value="<?php echo $record[8] ?>">
                                        </div>
                                    </div>
								</div>
							</div>

							<div class="col-12 col-xl-12">
                                <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Cast" name="cast" value="<?php echo $record[10] ?>">
                                </div>
                            </div>

							
							




		<div class="col-12">
			<div class="sign__group">
				<input type="text" class="sign__input" placeholder="Trailer Link" name="trailer_link" value="<?php echo $record[11] ?>">
			</div>
		</div>

		<div class="col-12 ">
			<div class="sign__group">
				<input type="text" class="sign__input" placeholder="Download Link" name="download_link" value="<?php echo $record[12] ?>">
			</div>
		</div>

		<div class="col-12 ">
			<div class="sign__group">
				<input type="text" class="sign__input" placeholder="Watch Link" name="watch_link" value="<?php echo $record[13] ?>">
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


	
<?php 
include("./common/footer.php");
?>


</body>
</html>