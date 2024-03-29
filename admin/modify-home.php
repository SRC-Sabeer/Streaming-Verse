

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

$trending_movies_result = mysqli_query($con, "SELECT movie_id FROM trending_movies");
$foryou_movies_result = mysqli_query($con, "SELECT movie_id FROM foryou_movies");
$top_streaming_series_result = mysqli_query($con, "SELECT series_id FROM top_streaming_series");
$top_picks_tv_series_result = mysqli_query($con, "SELECT series_id FROM top_picks_tv_series");
$popular_series_result = mysqli_query($con, "SELECT series_id FROM popular_series");


$trending_movies_array = [];
$foryou_movies_array = [];
$top_streaming_series_array = [];
$top_picks_tv_series_array = [];
$popular_series_array = [];

// Populate arrays with old data


while ($row = mysqli_fetch_assoc($trending_movies_result)) {
    $trending_movies_array[] = $row['movie_id'];
}

while ($row = mysqli_fetch_assoc($foryou_movies_result)) {
    $foryou_movies_array[] = $row['movie_id'];
}

while ($row = mysqli_fetch_assoc($top_streaming_series_result)) {
    $top_streaming_series_array[] = $row['series_id'];
}

while ($row = mysqli_fetch_assoc($top_picks_tv_series_result)) {
    $top_picks_tv_series_array[] = $row['series_id'];
}
while ($row = mysqli_fetch_assoc($popular_series_result)) {
    $popular_series_array[] = $row['series_id'];
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
                    <h2>Modify Home Page</h2>
                </div>
            </div>
            <!-- end main title -->

            <!-- form -->
            <div class="col-12">
                <form class="sign__form sign__form--add" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-xl-7">

						<span class="sign__episode-title mt-4 modify-h">MODIFY MOVIES</span>
                            <div class="row">


							
                       


                                <div class="col-12">
                                    <div class="sign__group">
									<label for="trending_movies">Trending Movies (8 max)</label>
									<input type="text" class="sign__input" placeholder="Enter IDs for Trending Movies" name="trending_movies" id="trending_movies" value="<?php echo implode(',', $trending_movies_array); ?>">
                                    </div>
                                </div>
                                

                                <div class="col-12">
                                    <div class="sign__group">
									<label for="foryou_movies">For You Movies (6 max)</label>
									<input type="text" class="sign__input" placeholder="Enter IDs for For You Movies" name="foryou_movies" id="foryou_movies" value="<?php echo implode(',', $foryou_movies_array); ?>">
                                    </div>
                                </div>


                        

                       
                    </div>



					<span class="sign__episode-title mt-4 modify-h">MODIFY TV SERIES</span>
                            <div class="row">


							
                            <div class="col-12">
                                 

                                <div class="col-12">
                                    <div class="sign__group">
									<label for="trending_movies">Top Picks Shows (6 max)</label>
									<input type="text" class="sign__input" placeholder="Enter IDs for Top Picks TV Series" name="top_picks_tv_series" id="top_picks_tv_series" value="<?php echo implode(',', $top_picks_tv_series_array); ?>">
                                    </div>
                                </div>
                                

                                <div class="col-12">
                                    <div class="sign__group">
									<label for="foryou_movies">Popular Shows (8 max)</label>
									<input type="text" class="sign__input" placeholder="enter id for for you movies" name="popular_series" id="popular_series"  value="<?php echo implode(',', $popular_series_array); ?>">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="sign__group">
									<label for="foryou_movies">Top Streaming Shows (8 max)</label>
									<input type="text" class="sign__input" placeholder="enter id for for you movies" name="top_streaming_series" id="top_streaming_series"  value="<?php echo implode(',', $top_streaming_series_array); ?>">
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
  
    $trending_movies = $_POST['trending_movies'];
    $foryou_movies = $_POST['foryou_movies'];


    $top_streaming_series = $_POST['top_streaming_series'];
    $top_picks_tv_series = $_POST['top_picks_tv_series'];
	$popular_series = $_POST['popular_series'];
    

    // Validate and sanitize the input (you may add more validation as per your requirements)
   
    $trending_movies = mysqli_real_escape_string($con, $trending_movies);
    $foryou_movies = mysqli_real_escape_string($con, $foryou_movies);

    $top_streaming_series = mysqli_real_escape_string($con, $top_streaming_series);
    $top_picks_tv_series = mysqli_real_escape_string($con, $top_picks_tv_series);
	$popular_series = mysqli_real_escape_string($con, $popular_series);

    // Split the input strings into arrays
   
    $trending_movies_array = explode(',', $trending_movies);
    $foryou_movies_array = explode(',', $foryou_movies);

    $top_streaming_series_array = explode(',', $top_streaming_series);
    $top_picks_tv_series_array = explode(',', $top_picks_tv_series);
	$popular_series_array = explode(',', $popular_series);

    // Truncate existing tables to ensure a fresh start
    
    mysqli_query($con, "TRUNCATE TABLE trending_movies");
    mysqli_query($con, "TRUNCATE TABLE foryou_movies");

    mysqli_query($con, "TRUNCATE TABLE top_streaming_series");
    mysqli_query($con, "TRUNCATE TABLE top_picks_tv_series");
	mysqli_query($con, "TRUNCATE TABLE popular_series");

    // Insert the new movie IDs into their respective tables
   

    foreach ($trending_movies_array as $movie_id) {
        $query = "INSERT INTO trending_movies (movie_id) VALUES ('$movie_id')";
		if (mysqli_query($con, $query)) {
            $success = true;
        }
    }

    foreach ($foryou_movies_array as $movie_id) {
        $query = "INSERT INTO foryou_movies (movie_id) VALUES ('$movie_id')";
		if (mysqli_query($con, $query)) {
            $success = true;
        }
    }

    foreach ($top_streaming_series_array as $series_id) {
        $query = "INSERT INTO top_streaming_series (series_id) VALUES ('$series_id')";
		if (mysqli_query($con, $query)) {
            $success = true;
        }
    }

    foreach ($top_picks_tv_series_array as $series_id) {
        $query = "INSERT INTO top_picks_tv_series (series_id) VALUES ('$series_id')";
		if (mysqli_query($con, $query)) {
            $success = true;
        }
    }
	foreach ($popular_series_array as $series_id) {
        $query = "INSERT INTO popular_series (series_id) VALUES ('$series_id')";
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