<?php
$currentFilePath = $_SERVER['PHP_SELF'];
$isNavFile = basename($currentFilePath) === 'nav.php';
$includePath = $isNavFile ? "../../utilities/connection.php" : "../utilities/connection.php";
include($includePath);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>          
   

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
  
   <title>Streaming Verse - Free Movie and TV Shows Streaming</title>

   <meta name="description" content="Watch your favorite movies and TV shows for free on Streaming Verse. Explore a wide range of genres and start streaming today.">
   <meta name="keywords" content="streaming, movies, TV shows, free streaming, online streaming, watch TV online">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="canonical" href="https://www.streamingverse.com"> -->

   <meta property="og:title" content="Streaming Verse - Free Movie and TV Shows Streaming">
<meta property="og:description" content="Watch your favorite movies and TV shows for free on Streaming Verse. Explore a wide range of genres and start streaming today.">
<meta property="og:url" content="https://www.streamingverse.com">
<meta property="og:image" content="https://www.streamingverse.com/images/logo.png">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@StreamingVerse">
<meta name="twitter:title" content="Streaming Verse - Free Movie and TV Shows Streaming">
<meta name="twitter:description" content="Watch your favorite movies and TV shows for free on Streaming Verse. Explore a wide range of genres and start streaming today.">
<meta name="twitter:image" content="https://www.streamingverse.com/images/logo.png">

<meta name="robots" content="index, follow">


<link rel="shortcut icon" href="../utilities/images/fix/logo.png">
   
   <!-- CSS bootstrap-->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!--  Style -->
   <link rel="stylesheet" href="css/style.css" />
   <!--  Responsive -->
   <link rel="stylesheet" href="css/responsive.css" />

   

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css"
      >

   <link rel="stylesheet" href="css/style2.css">
</head>

<body>
   <!--========== Header ==============-->
   <header id="gen-header" class="gen-header-style-1 gen-has-sticky">
      <div class="gen-bottom-header">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <a class="navbar-brand" href="#">
                        <img class="img-fluid logo" src="../utilities/images/fix/logo.png" alt="logo">
                     </a>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div id="gen-menu-contain" class="gen-menu-contain">
                        <ul id="gen-main-menu" class="navbar-nav ml-auto">
   <li class="menu-item <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : ''; ?>">
      <a href="../../../SRC Verse TV/main/index.php" aria-current="page">Home</a>
   </li>
   <li class="menu-item <?php echo in_array(basename($_SERVER['PHP_SELF']), ['movies-home.php', 'movies.php']) ? 'active' : ''; ?>">
      <a href="../../../SRC Verse TV/main/movies-home.php">Movies</a>
   </li>
   <li class="menu-item <?php echo in_array(basename($_SERVER['PHP_SELF']), [ 'series-home.php', 'series.php']) ? 'active' : ''; ?>">
      <a href="../../../SRC Verse TV/main/series-home.php">TV Shows</a>
   </li>
   <li class="menu-item <?php echo in_array(basename($_SERVER['PHP_SELF']), [ 'cast.php']) ? 'active' : ''; ?>">
      <a href="../../../SRC Verse TV/main/cast.php">Cast</a>
   </li>
</ul>

                        </div>
                     </div>
                     <div class="gen-header-info-box">
                        <div class="gen-menu-search-block">
                           <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                           <div class="gen-search-form" >
                              <form role="search" method="get" class="search-form" action="#">
                                 <label>
                                    <span class="screen-reader-text"></span>
                                    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                                 </label>
                                 <button type="submit" class="search-submit"><span
                                       class="screen-reader-text"></span></button>
                              </form>
                           </div>
                        </div>
                        <div class="gen-account-holder">
                           <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                           <div class="gen-account-menu">
                              
                              <ul class="gen-account-menu">

                              <?php 


if (isset($_SESSION['user'])){
    echo '
                                
                                 <li>
                                    <a><i class="fa-solid fa-user"></i>
                                    '. $_SESSION['user'] .' </a>
                                 </li>


                                 <li>
                                 <a href="watchlist.php"><i class="fa-solid fa-rectangle-history-circle-plus"></i>
                                 Watchlist </a>
                              </li>
                               
                                
                              
                               
                                 <li>
                                    <a href="../../../SRC Verse TV/main/common/logout.php"> <i class="fa-solid fa-right-from-bracket"></i></i>
                                       Logout </a>
                                 </li>

                                 '; }
                                 else{
                                     echo '

                                     <li>
                                     <a href="register.php"><i class="fa fa-user"></i>
                                        Register </a>
                                  </li>    ';
                                 }
                                 ?>
                                 
                                 



                              </ul>
                           </div>
                        </div>
                        <div class="gen-btn-container">
                           <a  class="gen-button">
                              <div class="gen-button-block">
                                 <span class="gen-button-line-left"></span>
                                 <span class="gen-button-text">Free Version</span>
                              </div>
                           </a>
                        </div>
                     </div>
                     <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                     </button>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!--========== Header ==============-->



   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
      var currentUrl = window.location.href;

      // Check if the current URL matches the specified pages
      var isMoviesPage = currentUrl.includes("movies.php") || currentUrl.includes("single-movie.php")|| currentUrl.includes("movies-home");
      var isShowsPage = currentUrl.includes("single-tv-shows.php") || currentUrl.includes("series.php")|| currentUrl.includes("episode-details.php")|| currentUrl.includes("series-home.php");

      // Hide or show the search bar based on the current page
      if (isMoviesPage || isShowsPage) {
         $(".gen-menu-search-block").show();
      } else {
         $(".gen-menu-search-block").hide();
      }

      // Handle search form submission
      $(".search-form").submit(function(event) {
         event.preventDefault();

         var searchQuery = $(this).find(".search-field").val();
         var searchType = isMoviesPage ? "movies" : (isShowsPage ? "tv_shows" : "");

         if (searchQuery.trim() !== "") {
            // Redirect to the search results page with the appropriate query parameters
            window.location.href = "search.php?type=" + searchType + "&query=" + encodeURIComponent(searchQuery);
         }
      });
   });
</script>
