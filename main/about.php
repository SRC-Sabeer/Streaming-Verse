<?php 
include("./common/nav.php");





?>

<link rel="stylesheet" href="./css/oc_style.css">

   <!-- breadcrumb -->
   <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpeg');" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                About Us
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./index.php"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">About</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->


<div class="main" id="main">
    
    

    <!-- Start Main Content -->
    <div class="main-content">
        <!-- Start Our Statistics Section -->
        <section class="statistics" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="block-title">Our Statistics</h2>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->

                <?php 

$sql_movie = "SELECT COUNT(*) as row_count_movie FROM `movies`";
$result_movie = $con->query($sql_movie);	
$row_movie = $result_movie->fetch_assoc();
$rowCount_movie = $row_movie['row_count_movie'];

?>
                <div class="row">
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="icon-box text-center">
                            <div class="icon"><i class="fas fa-video"></i></div>
                            <div class="number count1"><?php echo $rowCount_movie ?></div>
                            <p>Movies</p>
                        </div>
                        <!-- Icon Box End -->
                    </div>
                    <!-- Col End -->

                    <?php 

$sql_series = "SELECT COUNT(*) as row_count_series FROM `tv_series`";
$result_series = $con->query($sql_series);	
$row_series = $result_series->fetch_assoc();
$rowCount_series = $row_series['row_count_series'];

?>
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="icon-box text-center">
                            <div class="icon"><i class="fas fa-eye"></i></div>
                            <div class="number count2" ><?php echo $rowCount_series ?></div>
                            <p>Shows</p>
                        </div>
                        <!-- Icon Box End -->
                    </div>
                    <!-- Col End -->

                    <?php 
						$sql_user = "SELECT COUNT(*) as row_counts_user FROM `users`";
						$result_user = $con->query($sql_user);	
$row_user = $result_user->fetch_assoc();
$rowCount_user = $row_user['row_counts_user'];


?>

                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="icon-box text-center">
                            <div class="icon"><i class="fas fa-users"></i></div>
                            <div class="number count3"><?php echo $rowCount_user ?></div>
                            <p>Members</p>
                        </div>
                        <!-- Icon Box End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="icon-box text-center">
                            <div class="icon"><i class="fas fa-trophy"></i></div>
                            <div class="number count4" >2</div>
                            <p>Awards</p>
                        </div>
                        <!-- Icon Box End -->
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row end -->
            </div>
            <!-- Container end -->
        </section>
        <!-- Our Statistics Section End -->
        <div class="gap-50"></div>
        <!-- Start Subscribe Section -->
        <section class="subscribe section-parallax">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid mb-4" src="../utilities/images/fix/about.png" alt="">
                    </div>
                    <!-- Col End -->
                    <div class="col-md-6">
                        <h2 class="mb-4">And If You
                            Join the Experience?</h2>
                        <p class="mb-4">True friendship is perhaps the only relation that survives the trials and tribulations of time and remains unconditional. A unique blend of affection, loyalty, love, respect, trust and loads of fun is perhaps what describes the true meaning of friendship. Similar interests, mutual respect and strong attachment with each other are what friends share between each other. These are just the general traits of a friendship. To experience what is friendship, one must have true friends, who are indeed rare treasure.</p>
                        <a class="btn hvr-sweep-to-right" href="./register.php">Register Now</a>
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row end -->
            </div>
            <!-- Container end -->
        </section>
        <!-- Subscribe Section End -->
        <!-- <div class="gap-50"></div> -->
        <!-- Start Our Team Section -->
     

        <section class="about">
            <div class="main">
                <div class="about-img">
                    <img src="../utilities/images/fix/sabeer.jpg" alt="">
                </div>
    
                <div class="about-texts">
                    <h1 class="slider-text big-title title text-uppercase"  >Sabeer Faisal</h1>
                    <h5>Developer <span> & Youtuber</span> </h5>
                    <p>Sabeer, A Pop Culture Youtuber, IT (Information Technology) and Movies Ethusiast, A Professional
                        Developer, A well Known Person of Cyber World Commonly Known as SRC. </p>
                
                </div>
                
            </div>
            
           
        </section>
    

    </div>
    <!-- Main Content End -->

</div>



<?php 
include("./common/footer.php");
?>