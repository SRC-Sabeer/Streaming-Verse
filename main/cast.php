<?php 

session_start();
// Check user authentication
if (!isset($_SESSION['user'])) {
    // Redirect to the registration page
    header("Location: register.php");
    exit();
}

include("../utilities/connection.php");
include("./common/nav.php");



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


function getTopAwardsCast($con, $limit = 6) {
    $query = "SELECT * FROM cast ORDER BY awards DESC LIMIT $limit";
    $result = mysqli_query($con, $query);
    $castArray = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $castArray[] = $row;
    }
    
    return $castArray;
}


?>





    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('../utilities/images/fix/breadcrumb-bg.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title d-flex" style="justify-content: center; align-items: center; text-align: center;">
                         
   <!-- Search bar -->
<form method="POST" action="search.php?type=cast" class="d-flex col-lg-12 col-md-10 col-sm-12 mt-5">
    <input type="text" placeholder="Search Cast" name="actor_name" id="search-actor" style="border:2px solid red;">
    <button type="submit">Search</button>
</form>




                         
                        </div>
                       
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->




    <div class="container mt-5">

    

    <div class="col-xl-6 col-lg-6 col-md-6">
                    <h3 class="gen-heading-title">Top Cast</h3>
                </div>


    <!--
      - #CATEGORY SECTION
    -->
    <section class="category mt-4" id="category">

     

      <div class="category-grid">
      <?php 
                            $query = "SELECT cast_id FROM top_cast";
     $result = mysqli_query($con, $query);
     while ($row = mysqli_fetch_assoc($result)) {
         $cast_id = $row['cast_id'];
         $cast = getCastDetails($con, $cast_id);
         $actor_name = $cast['name'];
         $total_movies = countMoviesByActor($con, $actor_name);
       echo '  
        <div class="category-card">
          <img src="../utilities/images/cast/'.$cast['image'].'" alt="" class="card-img">
          <div class="name"><a href="cast-single.php?id='.$cast['id'].'"> <nobr>'.$cast['name'].'</nobr></a></div>
          <div class="total">'.$total_movies.'</div>
        </div>

        '; } ?>

       

      </div>

    </section>











</div>


<article>




       <!-- owl-carousel Videos Section-1 Start -->
       <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h3 class="gen-heading-title">Top Hollywood Cast</h3>
                </div>
         
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-1">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">
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
                            <div class="item">
                                <div
                                    class="tv_show type-tv_show status-publish has-post-thumbnail hentry tv_show_genre-adventure">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="../utilities/images/cast/'.$cast['image'].'" alt="streamlab-image">
                                               
                                                <div class="gen-movie-action">
                                                    <a href="cast-single.php?id='.$cast['id'].'" class="gen-button">
                                                    <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="cast-single.php?id='.$cast['id'].'">'.$cast['name'].'</a></h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        
                                                        <li>
                                                            <a ><span>Movies: '.$total_movies.' </span></a>
                                                        </li>
                                                        <li>
                                                        <a ><span>Series: '.$total_series.' </span></a>
                                                    </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            '; } ?>
             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-1 End -->



    <!-- owl-carousel images Start -->
    <section class="pt-0 pb-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-4 mt-2">
                    <h3 class="gen-heading-title">Most Oscar Winning Actors </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="gen-banner-movies">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false"
                            data-desk_num="1" data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">

                            <!-- Show according to most awards -->

                            <?php 
$topAwardsCast = getTopAwardsCast($con);
foreach ($topAwardsCast as $cast) {
    $actor_name = $cast['name'];
    $total_movies = countMoviesByActor($con, $actor_name);
    $total_series = countSeriesByActor($con, $actor_name);
    $gender_label = ($cast['gender'] === 'male') ? 'Actor' : 'Actress';

    
    echo '

                            <div class="item" style="background: url(\'../utilities/images/cast/'.$cast['image'].'\');)">
                                <div class="gen-movie-contain h-100">
                                    <div class="container h-100">
                                        <div class="row align-items-center h-100">
                                            <div class="col-xl-6">
                                                <div class="gen-movie-info">
                                                    <h3>'.$cast['name'].'</h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        <li>DOB:  '.$cast['date_of_birth'].'</li>
                                                        <li>
                                                            <a><span>Movies: '.$total_movies.'</span></a>
                                                        </li>

                                                        <li>
                                                        <a><span>Series: '.$total_series.'</span></a>
                                                    </li>
                                                      
                                                    </ul>
                                                    <p>'.$cast['film_industry'].' '.$gender_label.' </p>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <div class="gen-btn-container button-1">
                                                        <a href="cast-single.php?id='.$cast['id'].'" class="gen-button">
                                                        <i aria-hidden="true" class="fa-solid fa-eye"></i> <span
                                                                class="text">Explore</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
'; } ?>
                            <!-- Show according to most awards -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel images End -->




       <!-- owl-carousel Videos Section-1 Start -->
       <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h3 class="gen-heading-title">Top Bollywood Actors</h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-1">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                            data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1"
                            data-autoplay="false" data-loop="false" data-margin="30">
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
       <div class="item">
       <div
           class="tv_show type-tv_show status-publish has-post-thumbnail hentry tv_show_genre-adventure">
           <div class="gen-carousel-movies-style-1 movie-grid style-1">
               <div class="gen-movie-contain">
                   <div class="gen-movie-img">
                       <img src="../utilities/images/cast/'.$cast['image'].'" alt="streamlab-image">
                      
                       <div class="gen-movie-action">
                           <a href="cast-single.php?id='.$cast['id'].'" class="gen-button">
                           <i class="fa-solid fa-eye"></i>
                           </a>
                       </div>
                   </div>
                   <div class="gen-info-contain">
                       <div class="gen-movie-info">
                           <h3><a href="cast-single.php?id='.$cast['id'].'">'.$cast['name'].'</a></h3>
                       </div>
                       <div class="gen-movie-meta-holder">
                           <ul>
                               
                               <li>
                                   <a ><span>Movies: '.$total_movies.' </span></a>
                               </li>
                               <li>
                               <a ><span>Series: '.$total_series.' </span></a>
                           </li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
                            '; } ?>
     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-1 End -->


    </article>







<?php 
include("./common/footer.php");
?>