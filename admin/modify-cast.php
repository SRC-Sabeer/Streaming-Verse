

<?php  
session_start();
// Check user authentication
if (!isset($_SESSION['admin'])) {
    // Redirect to the registration page
    header("Location: signin.php");
    exit();
}
include("../utilities/connection.php");


// Fetch old data from the database
$top_cast_result = mysqli_query($con, "SELECT cast_id FROM top_cast");
$top_hollywood_cast_result = mysqli_query($con, "SELECT cast_id FROM top_hollywood_cast");
$top_bollywood_cast_result = mysqli_query($con, "SELECT cast_id FROM top_bollywood_cast");

$top_cast_array = [];
$top_hollywood_cast_array = [];
$top_bollywood_cast_array = [];


// Populate arrays with old data
while ($row = mysqli_fetch_assoc($top_cast_result)) {
    $top_cast_array[] = $row['cast_id'];
}

while ($row = mysqli_fetch_assoc($top_hollywood_cast_result)) {
    $top_hollywood_cast_array[] = $row['cast_id'];
}

while ($row = mysqli_fetch_assoc($top_bollywood_cast_result)) {
    $top_bollywood_cast_array[] = $row['cast_id'];
}


?>

<?php 
include("./common/nav.php");
?>
<style>
	.sign__form label{
		color: #fff;
	}
	.sign__group{
		margin-top: 3%;
	}.modify-h{
		text-align: center;
		color: red;
		font-weight: bold;
		letter-spacing: 1px;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 28px;
	}
</style>


	
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Modify CAST Page</h2>
                </div>
            </div>
            <!-- end main title -->

            <!-- form -->
            <div class="col-12">
                <form class="sign__form sign__form--add" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-xl-7">

						<span class="sign__episode-title mt-4 modify-h">MODIFY CAST</span>
                            <div class="row">


							
                            <div class="col-12">
                                    <div class="sign__group">
									
									<label for="top_cast">Top Cast (8 max)</label>
									<label for=""></label>
									<input type="text" class="sign__input" placeholder="Enter IDs for Top Cast" name="top_cast" id="top_cast" value="<?php echo implode(',', $top_cast_array); ?>">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="sign__group">
									<label for="top_hollywood_cast">Top Hollywood Cast (8 max)</label>
									<input type="text" class="sign__input" placeholder="Enter IDs for Top Hollywood Cast" name="top_hollywood_cast" id="top_hollywood_cast" value="<?php echo implode(',', $top_hollywood_cast_array); ?>">
                                    </div>
                                </div>
                                

                                <div class="col-12">
                                    <div class="sign__group">
									<label for="top_bollywood_cast">Top Bollywood Cast (8 max)</label>
									<input type="text" class="sign__input" placeholder="Enter IDs for Top Bollywood Cast" name="top_bollywood_cast" id="top_bollywood_cast" value="<?php echo implode(',', $top_bollywood_cast_array); ?>">
                                    </div>
                                </div>


                        

                       
                    </div>




                               
                                
                        

                        <div class="col-12">
                            <button type="submit" class="sign__btn sign__btn--small" name="btn"><span>Publish</span></button>
                        </div>
                    </div>

					


                </form>
            </div>
            <!-- end form -->
        </div>
    </div>
</main>

<?php 
include("../utilities/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $top_cast = $_POST["top_cast"];
    $top_hollywood_cast = $_POST['top_hollywood_cast'];
    $top_bollywood_cast = $_POST['top_bollywood_cast'];

    

    // Validate and sanitize the input (you may add more validation as per your requirements)
    $top_cast = mysqli_real_escape_string($con, $top_cast);
    $top_hollywood_cast = mysqli_real_escape_string($con, $top_hollywood_cast);
    $top_bollywood_cast = mysqli_real_escape_string($con, $top_bollywood_cast);

  

    // Split the input strings into arrays
    $top_cast_array = explode(',', $top_cast);
    $top_hollywood_cast_array = explode(',', $top_hollywood_cast);
    $top_bollywood_cast_array = explode(',', $top_bollywood_cast);

   

    // Truncate existing tables to ensure a fresh start
    mysqli_query($con, "TRUNCATE TABLE top_cast");
    mysqli_query($con, "TRUNCATE TABLE top_hollywood_cast");
    mysqli_query($con, "TRUNCATE TABLE top_bollywood_cast");

   

    // Insert the new movie IDs into their respective tables
    foreach ($top_cast_array as $cast_id) {
        $query = "INSERT INTO top_cast (cast_id) VALUES ('$cast_id')";
		if (mysqli_query($con, $query)) {
            $success = true;
        }
    }

    foreach ($top_hollywood_cast_array as $cast_id) {
        $query = "INSERT INTO top_hollywood_cast (cast_id) VALUES ('$cast_id')";
		if (mysqli_query($con, $query)) {
            $success = true;
        }
    }

    foreach ($top_bollywood_cast_array as $cast_id) {
        $query = "INSERT INTO top_bollywood_cast (cast_id) VALUES ('$cast_id')";
		if (mysqli_query($con, $query)) {
            $success = true;
        }
    }

   
	if ($success) {
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('error', 'Data upload unsuccessful');</script>";
    }

  
}

?>

<?php 
include("./common/footer.php");
?>

</body>
</html>