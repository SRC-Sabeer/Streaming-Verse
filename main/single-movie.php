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

?>

    <!-- Single movie Start -->
    <section class="gen-section-padding-3 gen-single-movie">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="gen-single-movie-wrapper style-1">
                        <div class="row">

                        <?php
                        function getMovieDetails($con, $id) {
                            $query = "SELECT * FROM movies WHERE id = '$id'";
                            $result = mysqli_query($con, $query);
                            return mysqli_fetch_assoc($result);
                        }

                        function isMovieInWatchlist($con, $user_id, $movie_id) {
                            // Make sure 'user_id' is not NULL
                            if ($user_id !== NULL) {
                                $query = "SELECT * FROM watchlist WHERE user_id = $user_id AND movie_id = $movie_id";
                                $result = mysqli_query($con, $query);
                                return mysqli_num_rows($result) > 0;
                            }
                            return false; // Return false if 'user_id' is not set
                        }

                        if (isset($_GET['movie_id'])) {
                            $id = $_GET['movie_id'];
                        } elseif (isset($_GET['id'])) {
                            $id = $_GET['id'];
                        } else {
                            // Handle the case when neither movie_id nor id is provided
                            // You can display an error message or redirect the user
                            exit("Movie ID not provided.");
                        }

                        $movie = getMovieDetails($con, $id);

                        if ($movie) {
                            // Check if 'user' session variable is set, indicating the user is logged in
                            if (isset($_SESSION['user'])) {
                                // Retrieve the user's ID from the database based on their username or email
                                $username = $_SESSION['user']; // Assuming the session variable holds the username or email
                                $query = "SELECT id FROM users WHERE username = '$username' OR email = '$username'";
                                $result = mysqli_query($con, $query);
                        
                                if ($result && $row = mysqli_fetch_assoc($result)) {
                                    $user_id = $row['id'];
                                    $isInWatchlist = isMovieInWatchlist($con, $user_id, $id);

                                    echo '
                        

                        
                            <div class="col-lg-12">
                                <div class="gen-video-holder">
                                    <iframe width="100%" height="550px" src="https://www.youtube.com/embed/'.$movie['trailer_link'].'"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <div class="gen-single-movie-info">
                                    <h2 class="gen-title">'.$movie['title'].'</h2>
                                    <div class="gen-single-meta-holder">
                                        <ul>
                                            <li class="gen-sen-rating">'.$movie['rated'].'</li>


                                            <li>
                                               <li> 

                                                <img src="../utilities/images/fix/imdb.png" alt="rating-image">
                                                <span>&nbsp;
                                                '.$movie['imdb'].' </span>

                                             </li>
                                          
                                      
                                        

                                            
                                        </ul>
                                        <ul>

                                        

                                    </div>

                                    </li>

                                    <p>'.$movie['description'].'
                                    </p>

                                    
                                    <div class="gen-after-excerpt">
                                        <div class="gen-extra-data">
                                            <ul>
                                                <li>
                                                    <span class="red-c">Tagline :</span>
                                                    <span>'.$movie['tagline'].'</span>
                                                </li>
                                               
                                                <li><span class="red-c">Genre :</span>
                                                    <span>
                                                    '.$movie['genre'].'
                                                    </span>
                                                </li>

                                                <li><span class="red-c">Cast :</span>
                                                <span>
                                                '.$movie['cast'].'
                                                </span>
                                            </li>
                                                
                                                <li><span class="red-c">Run Time :</span>
                                                    <span><i class="fa-solid fa-clock red-c"></i> &nbsp;'.$movie['runtime'].' m</span>
                                                </li>
                                                <li>
                                                    <span class="red-c" >Release Year :</span>
                                                    <span><i class="fa-solid fa-calendar red-c"></i> &nbsp;  '.$movie['release_year'].'</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="gen-socail-share">
                                        ';

                                        if ($isInWatchlist) {
                                            echo '
                                            
                                            <div class="gen-btn-container">
                                            <a  href="common/removeFromWatchlist.php?type=movie&id=' . $id . '" class="gen-button">
                                                <span class="text">Remove From Watchlist</span>
                                            </a>
                                        </div>
                                            ';
                                            
                                            
                                        } else {
                                            echo '
                                            
                                            <div class="gen-btn-container">
                                            <a  href="common/addToWatchlist.php?type=movie&id=' . $id . '" class="gen-button">
                                                <span class="text">Add To Watchlist</span>
                                            </a>
                                        </div>
                                            ';
                                        }
            
                                        echo '
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


<div class="col-lg-12" style="display: flex ;justify-content: center;align-items: center;margin: 0;">
  
<button  style="margin-right:3%;  background-color:red; border-radius:8px;" ><a href="'.$movie['download_link'].'" style="color:#fff;">Download Now&nbsp; <i class="fa-solid fa-download fa-bounce"></i></a></button>

<button style="margin-left:3%; color:#fff; background-color:red; border-radius:8px;" onclick="watch()">Watch Now &nbsp;<i class="fa-solid fa-play fa-bounce"></i></button>

  </div>





                            <div class="col-lg-12" style="margin-top:8%;">
                            
                                <div class="pm-inner">
                                   
                                   <div class="gen-more-like" id="watch-now"  style=" display: none ;justify-content: center;align-items: center;margin: 0;">
                                   <iframe width="640" height="360" style="max-width:100%;max-height:100%; " frameborder="0" src="'.$movie['watch_link'].'" allowfullscreen></iframe>
                                   </div>
                                </div>
                            </div>

                            ';
                        } else {
                            // Handle the case when the user cannot be found in the database
                            echo 'User not found in the database.';
                        }
                    } else {
                        // Handle the case when 'user' session variable is not set
                        echo 'User not logged in.';
                    }
                }
                ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Single movie End -->

<script>
    
    function watch() {
     
    watch =document.getElementById("watch-now");
    if (watch.style.display === "none") {
watch.style.display = "flex";
  } else {
    watch.style.display = "none";
  }
}    
    

</script>

<?php 
include("./common/footer.php");
?>