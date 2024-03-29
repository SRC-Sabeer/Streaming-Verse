
<?php
session_start();
// Check user authentication
if (!isset($_SESSION['user'])) {
    // Redirect to the registration page
    header("Location: register.php");
    exit();
}

// Rest of the page content
// ...
?>

<?php 
include("./common/nav.php");
include("../utilities/connection.php");
// Pagination
$seriesPerPage = 25;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $seriesPerPage;

// Query to fetch TV series for the current page
$query = "SELECT * FROM movies";
$sortOption = 'id'; // Default sorting by movie IDs

// Check for sorting options
if (isset($_GET['sort'])) {
    $sortOption = $_GET['sort'];
    switch ($sortOption) {
        case 'releaseyear':
            $orderBy = 'release_year DESC';
            break;
        case 'imdb':
            $orderBy = 'imdb DESC';
            break;
        case 'all':
            // When "All" is selected, remove the ORDER BY clause to show all movies
            $orderBy = '';
            break;
        default:
            // Default sorting by movie IDs if none selected
            $orderBy = 'id ASC';
            break;
    }
}

if (isset($_GET['rated']) && $_GET['rated'] !== 'all') {
    $ratedOption = $_GET['rated'];
    $ratedFilter = "rated = '$ratedOption'";
} else {
    // Show all rated movies if "All" is selected
    $ratedFilter = '';
}

// Query to fetch movies with sorting
$query = "SELECT * FROM movies";
if (!empty($ratedFilter)) {
    $query .= " WHERE $ratedFilter";
}
if (!empty($orderBy)) {
    $query .= " ORDER BY $orderBy";
}


$result = $con->query($query);
$totalSeries = $result->num_rows;
$totalPages = ceil($totalSeries / $seriesPerPage);
$result->free_result(); // Free the result set

// Fetch TV series for the current page
$query = "SELECT * FROM movies";
if (!empty($ratedFilter)) {
    $query .= " WHERE $ratedFilter";
}
if (!empty($orderBy)) {
    $query .= " ORDER BY $orderBy";
}
$query .= " LIMIT $offset, $seriesPerPage";
$result = $con->query($query);
?>

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('../utilities/images/fix/breadcrumb-bg.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                Movies
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./index.php"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">Movies</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <div class="container mt-4 mb-3 d-flex">
    <div class="col-xl-3">
        <select id="sortSelect" class="form-select" aria-label="Default select example" onchange="sortMovies(this.value)">
            <option value="all" <?php if ($sortOption === 'all') echo 'selected'; ?>>All</option>
            <option value="releaseyear" <?php if ($sortOption === 'releaseyear') echo 'selected'; ?>>Release Year</option>
            <option value="imdb" <?php if ($sortOption === 'imdb') echo 'selected'; ?>>IMDb</option>
        </select>
    </div>

    <div class="col-xl-3">
    <form method="GET" id="ratedForm">
        <select name="rated" id="ratedFilter" class="form-select" aria-label="Default select example" onchange="submitRatedForm()">
            <option value="all" <?php if (isset($_GET['rated']) && $_GET['rated'] === 'all') echo 'selected'; ?>>Rating</option>
            <option value="pg" <?php if (isset($_GET['rated']) && $_GET['rated'] === 'pg') echo 'selected'; ?>>PG</option>
            <option value="pg-13" <?php if (isset($_GET['rated']) && $_GET['rated'] === 'pg-13') echo 'selected'; ?>>PG-13</option>
            <option value="r" <?php if (isset($_GET['rated']) && $_GET['rated'] === 'r') echo 'selected'; ?>>R</option>
            <option value="12A" <?php if (isset($_GET['rated']) && $_GET['rated'] === '12A') echo 'selected'; ?>>12A</option>
            <option value="12+" <?php if (isset($_GET['rated']) && $_GET['rated'] === '12+') echo 'selected'; ?>>12+</option>
            <option value="16" <?php if (isset($_GET['rated']) && $_GET['rated'] === '16') echo 'selected'; ?>>16</option>
            <option value="C" <?php if (isset($_GET['rated']) && $_GET['rated'] === 'C') echo 'selected'; ?>>C</option>
            <option value="AG" <?php if (isset($_GET['rated']) && $_GET['rated'] === 'AG') echo 'selected'; ?>>AG</option>
        </select>
    </form>
</div>


</div>







    <!-- Section-1 Start -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                    <?php while ($row = $result->fetch_assoc()) { 
                        echo '
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                <div class="gen-movie-contain">
                                    <div class="gen-movie-img">
                                        <img src="../utilities/images/poster/'.$row['poster_img'].'" alt="srcverse-image">
                                        <div class="gen-movie-add">
                                            <div class="wpulike wpulike-heart">
                                                <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                    <button type="button"
                                                        class="wp_ulike_btn wp_ulike_put_image"></button>
                                                </div>
                                            </div>
                                            <ul class="menu bottomRight">
                                            <li class="share top">
                                            <input type="text" value="http://localhost/Movies%20Booking%20System/avastream/movie-single.php?movie_id='.$row['id'].'" id="myInput" style="display:none;">
                                               <i class="fa fa-share-alt" onclick="copy()"></i>
                                              
                                              
                                            </li>
                                         </ul>
                                            <div class="movie-actions--link_add-to-playlist dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                        class="fa fa-plus"></i></a>
                                                <div class="dropdown-menu mCustomScrollbar">
                                                    <div class="mCustomScrollBox">
                                                        <div class="mCSB_container">
                                                            <a class="login-link" href="#">Sign in to add this
                                                                movie to a
                                                                playlist.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gen-movie-action">
                                            <a href="single-movie.php?movie_id='.$row['id'].'" class="gen-button">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gen-info-contain">
                                        <div class="gen-movie-info">
                                            <h3><a href="single-movie.php?movie_id='.$row['id'].'">'.$row['title'].'</a></h3>
                                        </div>
                                        <div class="gen-movie-meta-holder">
                                        <ul>
                                        <li><i class="fa-regular fa-clock red-c"></i>  '.$row['runtime'].' m</li>
                                        <li>
                                          <span><i class="fa-solid fa-star red-c"></i> '.$row['imdb'].'</span>
                                        </li>
                                        <li>
                                       <span class="red-c">'.$row['release_year'].'</span>
                                     </li>
                                     </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       ';} ?>


                    </div>
                </div>
                <div class="col-lg-12">
                   <!-- Pagination links -->
                   <div class="gen-pagination">
    <nav aria-label="Page navigation">
        <ul class="page-numbers">
            <?php if ($page > 1) { ?>
                <li><a class="page-numbers" href="?page=<?php echo $page - 1; ?>"><</a></li>
            <?php } ?>
            <li>
                <a class="page-numbers <?php if ($page === 1) echo 'current'; ?>" href="?page=1">1</a>
            </li>
            <?php if ($page > 2) { ?>
                <li><span class="page-numbers">...</span></li>
            <?php } ?>
            <?php if ($page > 1 && $page <= $totalPages) { ?>
                <li>
                    <a class="page-numbers <?php if ($page === $page) echo 'current'; ?>" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                </li>
            <?php } ?>
            <?php if ($page < $totalPages) { ?>
                <li><a class="page-numbers" href="?page=<?php echo $page + 1; ?>">></a></li>
            <?php } ?>
        </ul>
    </nav>
</div>



                </div>
            </div>
        </div>
    </section>
    <!-- Section-1 End -->

    <script>
function submitRatedForm() {
    document.getElementById("ratedForm").submit();
}
</script>

    <script>
    function sortMovies(sortOption) {
        var url = window.location.href.split('?')[0]; // Get the current URL without query parameters
        if (sortOption) {
            url += "?sort=" + sortOption; // Add the sort option as a query parameter
        }
        window.location.href = url; // Redirect to the sorted URL

        // Set the selected option in the dropdown
        var selectElement = document.getElementById('sortSelect');
        if (selectElement) {
            selectElement.value = sortOption;
        }
    }
</script>



<?php 

include("./common/footer.php");
?>