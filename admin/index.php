<?php
session_start();
// Check user authentication
if (!isset($_SESSION['admin'])) {
    // Redirect to the registration page
    header("Location: signin.php");
    exit();
}
include("../utilities/connection.php");


$user = "SELECT * FROM `users`";
$userdetail = mysqli_query($con ,$user);

$movies = "SELECT * FROM `movies`";
$userdetail = mysqli_query($con ,$movies);

$tv_series = "SELECT * FROM `tv_series`";
$seriesdetail = mysqli_query($con ,$tv_series);


function getMovieDetails($con, $movie_id) {
    $query = "SELECT * FROM movies WHERE id = '$movie_id'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_assoc($result);
}
function getSeriesDetails($con, $series_id) {
	$query = "SELECT * FROM tv_series WHERE id = '$series_id'";
	$result = mysqli_query($con, $query);
	$series = mysqli_fetch_assoc($result);
 
	// Fetch season and episode counts for the current series
	$season_query = "SELECT COUNT(DISTINCT season_id) AS season_count FROM episodes WHERE season_id IN (SELECT id FROM seasons WHERE tv_series_id = '$series_id')";
	$episode_query = "SELECT COUNT(*) AS episode_count FROM episodes WHERE season_id IN (SELECT id FROM seasons WHERE tv_series_id = '$series_id')";
 
	$season_result = mysqli_query($con, $season_query);
	$episode_result = mysqli_query($con, $episode_query);
 
	$season_count = mysqli_fetch_assoc($season_result)['season_count'];
	$episode_count = mysqli_fetch_assoc($episode_result)['episode_count'];
 
	// Add season and episode counts to the series data
	$series['season_count'] = $season_count;
	$series['episode_count'] = $episode_count;
 
	return $series;
 }


 function getCastDetails($con, $cast_id) {
    $query = "SELECT * FROM cast WHERE id = '$cast_id'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_assoc($result);
 }

 
 function countMoviesByActor($con, $actor_name) {
    $query = "SELECT COUNT(*) as total_movies FROM movies WHERE cast LIKE '%$actor_name%'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_movies'];
}

function countSeriesByActor($con, $actor_name) {
    $query = "SELECT COUNT(*) as total_series FROM tv_series WHERE cast LIKE '%$actor_name%'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_series'];
}
?>



<?php 
include("./common/nav.php");
?>

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Dashboard</h2>

						<a  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="main__title-link"><span>add item</span></a>
					</div>
				</div>
				<!-- end main title -->
			</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="background-color:rgb(11, 11, 11);">
     
      <div class="modal-body" >
        <a href="add-movie.php" style="color:red; font-weight:bold;">Add Movie</a>
		<br>
		<br>
		<a href="add-series.php"  style="color:red; font-weight:bold;">Add TV Series</a>
		<br>
		<br>
		<a href="add-cast.php"  style="color:red; font-weight:bold;">Add Cast</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


			<div class="row">
				<!-- stats -->

				<?php 

$sql_movie = "SELECT COUNT(*) as row_count_movie FROM `movies`";
$result_movie = $con->query($sql_movie);	
$row_movie = $result_movie->fetch_assoc();
$rowCount_movie = $row_movie['row_count_movie'];

?>


				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Movies</span>
						<p><?php echo $rowCount_movie ?></p>
						<img src="img/graph-bar.svg" alt="">
					</div>
				</div>
				<!-- end stats -->


				<?php 

$sql_series = "SELECT COUNT(*) as row_count_series FROM `tv_series`";
$result_series = $con->query($sql_series);	
$row_series = $result_series->fetch_assoc();
$rowCount_series = $row_series['row_count_series'];

?>

				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>TV Series</span>
						<p><?php echo $rowCount_series ?></p>
						<img src="img/film.svg" alt="">
					</div>
				</div>
				<!-- end stats -->

				<?php 
						$sql_user = "SELECT COUNT(*) as row_counts_user FROM `users`";
						$result_user = $con->query($sql_user);	
$row_user = $result_user->fetch_assoc();
$rowCount_user = $row_user['row_counts_user'];


?>


				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Users</span>
						<p><?php echo $rowCount_user ?></p>
						<img src="img/comments.svg" alt="">
					</div>
				</div>
				<!-- end stats -->


				<?php 
						$sql_cast = "SELECT COUNT(*) as row_counts_cast FROM `cast`";
						$result_cast = $con->query($sql_cast);	
$row_cast = $result_cast->fetch_assoc();
$rowCount_cast = $row_cast['row_counts_cast'];


?>

				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Cast</span>
						<p><?php echo $rowCount_cast ?></p>
						<img src="img/star-half-alt.svg" alt="">
					</div>
				</div>
				<!-- end stats -->




			

				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="fa-solid fa-arrow-trend-up" style="color: red;"></i>&nbsp;&nbsp; Trending Movies</h3>

							<div class="dashbox__wrap">
							
								<a class="dashbox__more" href="./catalog-movies.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--2">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>ITEM</th>
										<th>YEAR</th>
										<th>RATING</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$query = "SELECT movie_id FROM trending_movies";
									$result = mysqli_query($con, $query);

									while ($row = mysqli_fetch_assoc($result)) {
										$movie_id = $row['movie_id'];
										$movie = getMovieDetails($con, $movie_id);
										echo '
									<tr>
										<td>
											<div class="dashbox__table-text">'.$movie['id'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text"><a  >'.$movie['title'].'</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">'.$movie['release_year'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text dashbox__table-text--rate">'.$movie['imdb'].'</div>
										</td>
									</tr>
									';
									}

									?>
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->

				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><img src="img/film.svg" alt=""> For You Movies</h3>

							<div class="dashbox__wrap">
							
								<a class="dashbox__more" href="./catalog-movies.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--3">
							<table class="dashbox__table">
								<thead>
								<tr>
										<th>ID</th>
										<th>ITEM</th>
										<th>YEAR</th>
										<th>RATING</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$query = "SELECT movie_id FROM foryou_movies";
									$result = mysqli_query($con, $query);

									while ($row = mysqli_fetch_assoc($result)) {
										$movie_id = $row['movie_id'];
										$movie = getMovieDetails($con, $movie_id);
										echo '
									<tr>
										<td>
											<div class="dashbox__table-text">'.$movie['id'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text"><a  >'.$movie['title'].'</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">'.$movie['release_year'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text dashbox__table-text--rate">'.$movie['imdb'].'</div>
										</td>
									</tr>
									';
									}

									?>
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->

		








					<!-- dashbox -->
					<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><img src="img/award.svg" alt=""> Top Picks TV Shows</h3>

							<div class="dashbox__wrap">
								
								<a class="dashbox__more" href="./catalog-series.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--3">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>ITEM</th>
										<th>SZN</th>
										<th>EP</th>
										<th>IMDB</th>
										<th>YEAR</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$query = "SELECT series_id FROM top_picks_tv_series";
									$result = mysqli_query($con, $query);

									while ($row = mysqli_fetch_assoc($result)) {
										$series_id = $row['series_id'];
										$series = getSeriesDetails($con, $series_id);
										echo '
									<tr>
										<td>
											<div class="dashbox__table-text">'.$series['id'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text"><a  >'.$series['title'].'</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">'.$series['season_count'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$series['episode_count'].'</div>
									</td>
										<td>
											<div class="dashbox__table-text dashbox__table-text--rate">'.$series['imdb'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$series['release_year'].'</div>
									</td>
									</tr>
									';
									}

									?>
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->

					<!-- dashbox -->
					<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="fa-solid fa-fire" style="color: red;"></i> &nbsp;&nbsp; Popular TV Shows</h3>

							<div class="dashbox__wrap">
								
								<a class="dashbox__more" href="./catalog-series.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--3">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>ITEM</th>
										<th>SZN</th>
										<th>EP</th>
										<th>IMDB</th>
										<th>YEAR</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$query = "SELECT series_id FROM popular_series";
									$result = mysqli_query($con, $query);

									while ($row = mysqli_fetch_assoc($result)) {
										$series_id = $row['series_id'];
										$series = getSeriesDetails($con, $series_id);
										echo '
									<tr>
										<td>
											<div class="dashbox__table-text">'.$series['id'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text"><a  >'.$series['title'].'</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">'.$series['season_count'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$series['episode_count'].'</div>
									</td>
										<td>
											<div class="dashbox__table-text dashbox__table-text--rate">'.$series['imdb'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$series['release_year'].'</div>
									</td>
									</tr>
									';
									}

									?>
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->


					<!-- dashbox -->
					<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="fa-solid fa-signal-stream" style="color: red;"></i>&nbsp;&nbsp; Top Streaming TV Shows</h3>

							<div class="dashbox__wrap">
								
								<a class="dashbox__more" href="./catalog-series.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--3">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>ITEM</th>
										<th>SZN</th>
										<th>EP</th>
										<th>IMDB</th>
										<th>YEAR</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$query = "SELECT series_id FROM top_streaming_series";
									$result = mysqli_query($con, $query);

									while ($row = mysqli_fetch_assoc($result)) {
										$series_id = $row['series_id'];
										$series = getSeriesDetails($con, $series_id);
										echo '
									<tr>
										<td>
											<div class="dashbox__table-text">'.$series['id'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text"><a  >'.$series['title'].'</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">'.$series['season_count'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$series['episode_count'].'</div>
									</td>
										<td>
											<div class="dashbox__table-text dashbox__table-text--rate">'.$series['imdb'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$series['release_year'].'</div>
									</td>
									</tr>
									';
									}

									?>
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->




						<!-- dashbox -->
						<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="fa-solid fa-signal-stream" style="color: red;"></i>&nbsp;&nbsp; Top Cast</h3>

							<div class="dashbox__wrap">
								
								<a class="dashbox__more" href="./catalog-cast.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--3">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>NAME</th>
										<th>FILM INDUSTRY</th>
										<th>AWARDS</th>
										<th>SERIES</th>
										<th>MOVIES</th>
									</tr>
								</thead>
								<tbody>
								<?php 
$query = "SELECT cast_id FROM top_cast";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $cast_id = $row['cast_id'];
    $cast = getCastDetails($con, $cast_id);
    $actor_name = $cast['name'];
    $total_movies = countMoviesByActor($con, $actor_name);
    $total_series = countSeriesByActor($con, $actor_name);
       echo '  
									<tr>
										<td>
											<div class="dashbox__table-text">'.$cast['id'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text"><a  >'.$cast['name'].'</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">'.$cast['film_industry'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$cast['awards'].'</div>
									</td>
										<td>
											<div class="dashbox__table-text ">'.$total_movies.'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$total_series.'</div>
									</td>
									</tr>
									';
									}

									?>
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->


										<!-- dashbox -->
										<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="fa-solid fa-signal-stream" style="color: red;"></i>&nbsp;&nbsp; Top Hollywood Cast</h3>

							<div class="dashbox__wrap">
								
								<a class="dashbox__more" href="./catalog-cast.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--3">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>NAME</th>
										<th>FILM INDUSTRY</th>
										<th>AWARDS</th>
										<th>SERIES</th>
										<th>MOVIES</th>
									</tr>
								</thead>
								<tbody>
								<?php 
$query = "SELECT cast_id FROM top_hollywood_cast";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $cast_id = $row['cast_id'];
    $cast = getCastDetails($con, $cast_id);
    $actor_name = $cast['name'];
    $total_movies = countMoviesByActor($con, $actor_name);
    $total_series = countSeriesByActor($con, $actor_name);
       echo '  
									<tr>
										<td>
											<div class="dashbox__table-text">'.$cast['id'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text"><a >'.$cast['name'].'</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">'.$cast['film_industry'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$cast['awards'].'</div>
									</td>
										<td>
											<div class="dashbox__table-text ">'.$total_movies.'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$total_series.'</div>
									</td>
									</tr>
									';
									}

									?>
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->




										<!-- dashbox -->
										<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="fa-solid fa-signal-stream" style="color: red;"></i>&nbsp;&nbsp; Top Bollywood Cast</h3>

							<div class="dashbox__wrap">
								
								<a class="dashbox__more" href="./catalog-cast.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--3">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>NAME</th>
										<th>FILM INDUSTRY</th>
										<th>AWARDS</th>
										<th>SERIES</th>
										<th>MOVIES</th>
									</tr>
								</thead>
								<tbody>
								<?php 
$query = "SELECT cast_id FROM top_bollywood_cast";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $cast_id = $row['cast_id'];
    $cast = getCastDetails($con, $cast_id);
    $actor_name = $cast['name'];
    $total_movies = countMoviesByActor($con, $actor_name);
    $total_series = countSeriesByActor($con, $actor_name);
       echo '  
									<tr>
										<td>
											<div class="dashbox__table-text">'.$cast['id'].'</div>
										</td>
										<td>
											<div class="dashbox__table-text"><a >'.$cast['name'].'</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">'.$cast['film_industry'].'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$cast['awards'].'</div>
									</td>
										<td>
											<div class="dashbox__table-text ">'.$total_movies.'</div>
										</td>
										<td>
										<div class="dashbox__table-text">'.$total_series.'</div>
									</td>
									</tr>
									';
									}

									?>
							
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->






			







			</div>
		</div>
	</main>
	<!-- end main content -->

<?php 
include("./common/footer.php");
?>
</body>
</html>