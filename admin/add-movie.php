<?php 
session_start();
// Check user authentication
if (!isset($_SESSION['admin'])) {
    // Redirect to the registration page
    header("Location: signin.php");
    exit();
}
include("./common/nav.php");
?>

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Add New Movie</h2>
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

                                    <div class="col-12 col-xl-6" id="runtime-m">
										
											<div class="sign__group">
												<input type="text" class="sign__input" placeholder="Runtime" name="runtime">
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
                                <input type="text" class="sign__input" placeholder="cast" name="cast">
                                </div>
                            </div>

							
							




		<div class="col-12">
			<div class="sign__group">
				<input type="text" class="sign__input" placeholder="Trailer Link" name="trailer_link">
			</div>
		</div>

		<div class="col-12 ">
			<div class="sign__group">
				<input type="text" class="sign__input" placeholder="Download Link" name="download_link">
			</div>
		</div>

		<div class="col-12 ">
			<div class="sign__group">
				<input type="text" class="sign__input" placeholder="Watch Link" name="watch_link">
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
include("../utilities/connection.php");
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

        $insert = "INSERT INTO `movies`(`title`, `description`, `poster_img`,  `release_year`, `rated`, `imdb`, `runtime`, `tagline`, `genre`, `cast`, `trailer_link`, `download_link`, `watch_link`) VALUES 
		('$title','$description','$posterFilename','$release_year','$rated','$imdb','$runtime','$tagline','$genre','$cast','$trailer_link','$download_link','$watch_link')";

        $run = mysqli_query($con, $insert);
        if ($run) {
            echo "<script>alert('Movie Added Successfully')</script>";
        }

    } else {
        echo "Invalid file type. Please upload a JPG, JPEG, or PNG image.";
    }
}
?>



	<?php 
include("./common/footer.php");
	?>
</body>
</html>