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
						<h2>Add New Cast</h2>
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
											<input type="text" class="sign__input" placeholder="Full Name" name="name">
										</div>
									</div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Date Of Birth" onfocus="(this.type='date')" placeholder="Date Of Birth" name="dob">
                                        </div>
                                    </div>

									<div class="col-12 col-xl-6">
                                        <div class="sign__group">
                                            <div class="sign__gallery">
                                                <label id="gallery1" for="sign__gallery-upload">Upload Picture
                                                    (240x340)</label>
                                                <input data-name="#gallery1" id="sign__gallery-upload" name="cast_img"
                                                    class="sign__gallery-upload" type="file" accept=".png, .jpg, .jpeg">
                                            </div>
                                        </div>
                                    </div>

									
								</div>
							</div>

							<div class="col-12 col-xl-5">
								<div class="row">


                                    <div class="col-12 col-xl-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Film Industry"
                                                name="film_industry">
                                        </div>
                                    </div>


                                    <div class="col-8 col-xl-8">
                                        <div class="sign__group">
                                        <select id="sortSelect" class="form-select sign__input" aria-label="Default select example" name="gender">
            <option selected value="">Gender</option>
            <option value="male" >Male</option>
            <option value="female" >Female</option>
        </select>
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Number Of Oscars / Film fare Awards" name="awards">
                                        </div>
                                    </div>
                                    

									

                                  

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
    $posterFilename = $_FILES['cast_img']['name'];
    $coverFilename = "";


    
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST[$key] = implode(",", array_map('escape_string', $value));
        } else {
            $_POST[$key] = escape_string($value);
        }
    }
	$name = $_POST['name'];
    $dob = $_POST['dob'];
    $film_industry = $_POST['film_industry'];
    $gender = $_POST['gender'];
    $awards = $_POST['awards'];


    

    $size = $_FILES['cast_img']['size'];
    $temp = $_FILES['cast_img']['tmp_name'];
    $type = $_FILES['cast_img']['type'];

    move_uploaded_file($temp, "../utilities/images/cast/$posterFilename");
    
    if (strtolower($type) == "image/jpg"
        || strtolower($type) == "image/jpeg"
        || strtolower($type) == "image/png") {

        $imagename = $_FILES['cast_img']['name'];

        $insert = "INSERT INTO `cast`(`name`, `film_industry`, `gender`, `date_of_birth`, `awards`, `image`) VALUES ('$name','$film_industry','$gender','$dob','$awards','$posterFilename')";

        $run = mysqli_query($con, $insert);
        if ($run) {
            echo "<script>alert('Cast Added Successfully')</script>";
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