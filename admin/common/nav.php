<!DOCTYPE html>
<html lang="en">
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
<body>
	<!-- header -->
	<header class="header">
		<div class="header__content">
			<!-- header logo -->
			<a href="index.php" class="header__logo">
				<img src="img/logo.svg" alt="">
			</a>
			<!-- end header logo -->

			<!-- header menu btn -->
			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- end header menu btn -->
		</div>
	</header>
	<!-- end header -->

	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<a href="index.php" class="sidebar__logo">
			<img src="../utilities/images/fix/logo.png" alt="" >
			
		</a>
		<br>
		<!-- end sidebar logo -->
		
		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="img/user.svg" alt="">
			</div>

			<div class="sidebar__user-title">
				<span>Admin</span>
				<p>Sabeer Faisal</p>
			</div>
<a  class="sidebar__user-btn" href="../../../SRC Verse TV/admin/common/logout.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"></path></svg></a>
		
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a href="../../../SRC Verse TV/admin/index.php" class="sidebar__nav-link "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z"/></svg> Dashboard</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="../../../SRC Verse TV/admin/catalog-movies.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21,2a1,1,0,0,0-1,1V5H18V3a1,1,0,0,0-2,0V4H8V3A1,1,0,0,0,6,3V5H4V3A1,1,0,0,0,2,3V21a1,1,0,0,0,2,0V19H6v2a1,1,0,0,0,2,0V20h8v1a1,1,0,0,0,2,0V19h2v2a1,1,0,0,0,2,0V3A1,1,0,0,0,21,2ZM6,17H4V15H6Zm0-4H4V11H6ZM6,9H4V7H6Zm10,9H8V13h8Zm0-7H8V6h8Zm4,6H18V15h2Zm0-4H18V11h2Zm0-4H18V7h2Z"/></svg> Movies</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="../../../SRC Verse TV/admin/catalog-series.php" class="sidebar__nav-link"><i class="fa-solid fa-tv-retro"></i> &nbsp;&nbsp;&nbsp; TV Shows</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="../../../SRC Verse TV/admin/catalog-cast.php" class="sidebar__nav-link"><i class="fa-solid fa-masks-theater"></i> &nbsp;&nbsp;&nbsp; Cast</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="../../../SRC Verse TV/admin/users.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,2A10,10,0,0,0,4.65,18.76h0a10,10,0,0,0,14.7,0h0A10,10,0,0,0,12,2Zm0,18a8,8,0,0,1-5.55-2.25,6,6,0,0,1,11.1,0A8,8,0,0,1,12,20ZM10,10a2,2,0,1,1,2,2A2,2,0,0,1,10,10Zm8.91,6A8,8,0,0,0,15,12.62a4,4,0,1,0-6,0A8,8,0,0,0,5.09,16,7.92,7.92,0,0,1,4,12a8,8,0,0,1,16,0A7.92,7.92,0,0,1,18.91,16Z"/></svg> Users</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="../../../SRC Verse TV/admin/modify-home.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"/></svg> Modify Home</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="../../../SRC Verse TV/admin/modify-cast.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"/></svg> Modify Cast</a>
			</li>

		
		</ul>
		<!-- end sidebar nav -->
		
		<!-- sidebar copyright -->
		<div class="sidebar__copyright">© SRC Verse TV, 2023. <br>Create by <a  target="_blank" rel="noopener" style="font-weight:bold;">Sabeer Faisal</a>. <br><span style="font-weight:bolder; color:red;">V 2.0</span></div>
		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->



	
    <script>
$(document).ready(function() {
  // Get the current page's URL
  var currentPageUrl = window.location.href;

  // Loop through each navigation link and compare its href attribute with the current page's URL
  $('.sidebar__nav-link').each(function() {
    var linkUrl = $(this).attr('href');

    // Check if the current page's URL contains the link's URL
    if (currentPageUrl.includes(linkUrl)) {
      $(this).addClass('sidebar__nav-link--active');
    }
  });
});
</script>