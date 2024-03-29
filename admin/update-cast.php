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


<?php
include("../utilities/connection.php");

$update_id = $_GET['updateid'];
$query = "SELECT * FROM `cast` WHERE id = $update_id";

$run = mysqli_query($con , $query);
$record = mysqli_fetch_array($run);

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

     

        $insert = "UPDATE `cast` SET `name`='$name',`film_industry`='$film_industry',`gender`='$gender',`date_of_birth`='$dob',`awards`='$awards',`image`='$posterFilename' WHERE `cast`.`id` =  $update_id";

        $run = mysqli_query($con, $insert);
        if ($run) {
            echo "<script>window.location.href = 'catalog-cast.php';</script>";
        }

    } else {
        echo "Invalid file type. Please upload a JPG, JPEG, or PNG image.";
    }
}
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
											<input type="text" class="sign__input" placeholder="Full Name" name="name" value="<?php echo $record[1] ?>">
										</div>
									</div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Date Of Birth" onfocus="(this.type='date')" placeholder="Date Of Birth" name="dob" value="<?php echo $record[4] ?>">
                                        </div>
                                    </div>

									<div class="col-12 col-xl-6">
                                        <div class="sign__group">
                                            <div class="sign__gallery">
                                                <label id="gallery1" for="sign__gallery-upload">Upload Picture
                                                    (240x340)</label>
                                                <input data-name="#gallery1" id="sign__gallery-upload" name="cast_img"
                                                    class="sign__gallery-upload" type="file" accept=".png, .jpg, .jpeg" value="<?php echo $record[6] ?>">
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
                                                name="film_industry" value="<?php echo $record[2] ?>">
                                        </div>
                                    </div>


                                    <div class="col-8 col-xl-8">
    <div class="sign__group">
        <select id="sortSelect" class="form-select sign__input" aria-label="Default select example" name="gender">
            <option value="" <?php echo $record[3] === '' ? 'selected' : ''; ?>>Gender</option>
            <option value="male" <?php echo $record[3] === 'male' ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo $record[3] === 'female' ? 'selected' : ''; ?>>Female</option>
        </select>
    </div>
</div>




                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" placeholder="Number Of Oscars / Film fare Awards" name="awards" value="<?php echo $record[5] ?>">
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
include("./common/footer.php");
	?>
</body>
</html>