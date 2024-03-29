<?php
// Start session at the beginning of the script
session_start();

include("../utilities/connection.php");

$error_message = ""; // Initialize the error message

if (isset($_POST["btn"])) {
    $Email2 = $_POST["email2"];
    $Pass2 = $_POST["password2"];

   if ($Email2 == 'admin@gmail.com' && $Pass2 == 'admin') {
	$_SESSION['admin'] ='Sabeer';
        header("location:index.php");
        exit();
    } else {
        $error_message = "Username or Password is Incorrect";
    }
}


?>
<head>

<meta charset="utf-8">
  
  <title>Streaming Verse - Admin Panel</title>

  <meta name="description" content="Watch your favorite movies and TV shows for free on Streaming Verse. Explore a wide range of genres and start streaming today.">
  <meta name="keywords" content="streaming, movies, TV shows, free streaming, online streaming, watch TV online">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="canonical" href="https://www.streamingverse.com"> -->

  <meta property="og:title" content="Streaming Verse - Admin Panel">
<meta property="og:description" content="Watch your favorite movies and TV shows for free on Streaming Verse. Explore a wide range of genres and start streaming today.">
<meta property="og:url" content="https://www.streamingverse.com">
<meta property="og:image" content="../utilities/images/fix/logo.png">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@StreamingVerse">
<meta name="twitter:title" content="Streaming Verse - Admin Panel">
<meta name="twitter:description" content="Watch your favorite movies and TV shows for free on Streaming Verse. Explore a wide range of genres and start streaming today.">
<meta name="twitter:image" content="../utilities/images/fix/logo.png">

<meta name="robots" content="index, follow">

<link rel="shortcut icon" href="../utilities/images/fix/logo.png">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/slimselect.css">
	<link rel="stylesheet" href="css/admin.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css"
      >
	

	
</head>
</body>
	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="#" class="sign__form" method="post">
							<a href="index.php" class="sign__logo">
								<img src="../utilities/images/fix/logo.png" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Email" name="email2">
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" placeholder="Password" name="password2">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Remember Me</label>
							</div>
							
							<button class="sign__btn" type="submit" name="btn"><span>Sign in</span></button>

							<p class="error-message " style="color: red; font-weight: bold;" ><?php echo isset($error_message) ? $error_message : ""; ?></p>

							

							
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>



	<?php 
include("./common/footer.php");
	?>

</body>