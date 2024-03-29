<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/slimselect.css">
	<link rel="stylesheet" href="css/admin.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

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
			<img src="img/logo.svg" alt="">
		</a>
		<!-- end sidebar logo -->
		
		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="img/user.svg" alt="">
			</div>

			<div class="sidebar__user-title">
				<span>Admin</span>
				<p>John Doe</p>
			</div>

			<button class="sidebar__user-btn" type="button">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"></path></svg>
			</button>
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a href="index.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z"/></svg> Dashboard</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="catalog.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21,2a1,1,0,0,0-1,1V5H18V3a1,1,0,0,0-2,0V4H8V3A1,1,0,0,0,6,3V5H4V3A1,1,0,0,0,2,3V21a1,1,0,0,0,2,0V19H6v2a1,1,0,0,0,2,0V20h8v1a1,1,0,0,0,2,0V19h2v2a1,1,0,0,0,2,0V3A1,1,0,0,0,21,2ZM6,17H4V15H6Zm0-4H4V11H6ZM6,9H4V7H6Zm10,9H8V13h8Zm0-7H8V6h8Zm4,6H18V15h2Zm0-4H18V11h2Zm0-4H18V7h2Z"/></svg> Catalog</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="users.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,2A10,10,0,0,0,4.65,18.76h0a10,10,0,0,0,14.7,0h0A10,10,0,0,0,12,2Zm0,18a8,8,0,0,1-5.55-2.25,6,6,0,0,1,11.1,0A8,8,0,0,1,12,20ZM10,10a2,2,0,1,1,2,2A2,2,0,0,1,10,10Zm8.91,6A8,8,0,0,0,15,12.62a4,4,0,1,0-6,0A8,8,0,0,0,5.09,16,7.92,7.92,0,0,1,4,12a8,8,0,0,1,16,0A7.92,7.92,0,0,1,18.91,16Z"/></svg> Users</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="comments.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.61,19.19A7,7,0,0,0,17.87,8.62,8,8,0,1,0,3.68,14.91L2.29,16.29a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,18H8.69A7,7,0,0,0,15,22h6a1,1,0,0,0,.92-.62,1,1,0,0,0-.21-1.09ZM8,15a6.63,6.63,0,0,0,.08,1H5.41l.35-.34a1,1,0,0,0,0-1.42A5.93,5.93,0,0,1,4,10a6,6,0,0,1,6-6,5.94,5.94,0,0,1,5.65,4c-.22,0-.43,0-.65,0A7,7,0,0,0,8,15ZM18.54,20l.05.05H15a5,5,0,1,1,3.54-1.46,1,1,0,0,0-.3.7A1,1,0,0,0,18.54,20Z"/></svg> Comments</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="reviews.php" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M22,10.1c0.1-0.5-0.3-1.1-0.8-1.1l-5.7-0.8L12.9,3c-0.1-0.2-0.2-0.3-0.4-0.4C12,2.3,11.4,2.5,11.1,3L8.6,8.2L2.9,9C2.6,9,2.4,9.1,2.3,9.3c-0.4,0.4-0.4,1,0,1.4l4.1,4l-1,5.7c0,0.2,0,0.4,0.1,0.6c0.3,0.5,0.9,0.7,1.4,0.4l5.1-2.7l5.1,2.7c0.1,0.1,0.3,0.1,0.5,0.1v0c0.1,0,0.1,0,0.2,0c0.5-0.1,0.9-0.6,0.8-1.2l-1-5.7l4.1-4C21.9,10.5,22,10.3,22,10.1z M15.8,13.6c-0.2,0.2-0.3,0.6-0.3,0.9l0.7,4.2l-3.8-2c-0.1-0.1-0.3-0.1-0.5-0.1V5.7l1.9,3.8c0.1,0.3,0.4,0.5,0.8,0.5l4.2,0.6L15.8,13.6z"/></svg> Reviews</a>
			</li>
			
			<!-- dropdown -->
			<li class="sidebar__nav-item">
				<a class="sidebar__nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,14.05,2H10A3,3,0,0,0,7,5V6H6A3,3,0,0,0,3,9V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V18h1a3,3,0,0,0,3-3V9S21,9,21,8.94ZM15,5.41,17.59,8H16a1,1,0,0,1-1-1ZM15,19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V9A1,1,0,0,1,6,8H7v7a3,3,0,0,0,3,3h5Zm4-4a1,1,0,0,1-1,1H10a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h3V7a3,3,0,0,0,3,3h3Z"/></svg> Pages</a>

				<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown">
					<li><a href="add-item.php">Add item</a></li>
					<li><a href="edit-user.php">Edit user</a></li>
					<li><a href="signin.php">Sign In</a></li>
					<li><a href="signup.php">Sign Up</a></li>
					<li><a href="forgot.php">Forgot password</a></li>
					<li><a href="404.php">404 Page</a></li>
				</ul>
			</li>
			<!-- end dropdown -->
		</ul>
		<!-- end sidebar nav -->
		
		<!-- sidebar copyright -->
		<div class="sidebar__copyright">© FlixGo, 2018—2023. <br>Create by <a href="https://themeforest.net/user/dmitryvolkov/portfolio" target="_blank" rel="noopener">Dmitry Volkov</a>.</div>
		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Edit user</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- profile -->
				<div class="col-12">
					<div class="profile__content">
						<!-- profile user -->
						<div class="profile__user">
							<div class="profile__avatar">
								<img src="img/user.svg" alt="">
							</div>
							<!-- or red -->
							<div class="profile__meta profile__meta--green">
								<h3>Username <span>(Approved)</span></h3>
								<span>FlixGo ID: 23562</span>
							</div>
						</div>
						<!-- end profile user -->

						<!-- profile tabs nav -->
						<ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
							<li class="nav-item" role="presentation">
								<button id="1-tab" class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">Profile</button>
							</li>

							<li class="nav-item" role="presentation">
								<button id="2-tab" data-bs-toggle="tab" data-bs-target="#tab-2" type="button" role="tab" aria-controls="tab-2" aria-selected="false">Comments</button>
							</li>

							<li class="nav-item" role="presentation">
								<button id="3-tab" data-bs-toggle="tab" data-bs-target="#tab-3" type="button" role="tab" aria-controls="tab-3" aria-selected="false">Reviews</button>
							</li>
						</ul>
						<!-- end profile tabs nav -->

						<!-- profile btns -->
						<div class="profile__actions">
							<button type="button" data-bs-toggle="modal" class="profile__action profile__action--banned" data-bs-target="#modal-status3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,13a1,1,0,0,0-1,1v3a1,1,0,0,0,2,0V14A1,1,0,0,0,12,13Zm5-4V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z"/></svg></button>
							<button type="button" data-bs-toggle="modal" class="profile__action profile__action--delete" data-bs-target="#modal-delete3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg></button>
						</div>
						<!-- end profile btns -->
					</div>
				</div>
				<!-- end profile -->

				<!-- content tabs -->
				<div class="tab-content">
					<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab" tabindex="0">
						<div class="col-12">
							<div class="row">
								<!-- details form -->
								<div class="col-12 col-lg-6">
									<form action="#" class="sign__form sign__form--profile">
										<div class="row">
											<div class="col-12">
												<h4 class="sign__title">Profile details</h4>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="username">Login</label>
													<input id="username" type="text" name="username" class="sign__input" placeholder="User 123">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="email2">Email</label>
													<input id="email2" type="text" name="email" class="sign__input" placeholder="email@email.com">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="firstname">First Name</label>
													<input id="firstname" type="text" name="firstname" class="sign__input" placeholder="John">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="lastname">Last Name</label>
													<input id="lastname" type="text" name="lastname" class="sign__input" placeholder="Doe">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="subscription">Subscription</label>
													<select class="sign__select" id="subscription">
														<option value="Basic">Basic</option>
														<option value="Premium">Premium</option>
														<option value="Cinematic">Cinematic</option>
													</select>
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="rights">Rights</label>
													<select class="sign__select" id="rights">
														<option value="User">User</option>
														<option value="Moderator">Moderator</option>
														<option value="Admin">Admin</option>
													</select>
												</div>
											</div>

											<div class="col-12">
												<button class="sign__btn sign__btn--small" type="button"><span>Save</span></button>
											</div>
										</div>
									</form>
								</div>
								<!-- end details form -->

								<!-- password form -->
								<div class="col-12 col-lg-6">
									<form action="#" class="sign__form sign__form--profile">
										<div class="row">
											<div class="col-12">
												<h4 class="sign__title">Change password</h4>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="oldpass">Old Password</label>
													<input id="oldpass" type="password" name="oldpass" class="sign__input">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="sign__group">
													<label class="sign__label" for="newpass">New Password</label>
													<input id="newpass" type="password" name="newpass" class="sign__input">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12">
												<div class="sign__group">
													<label class="sign__label" for="confirmpass">Confirm New Password</label>
													<input id="confirmpass" type="password" name="confirmpass" class="sign__input">
												</div>
											</div>

											<div class="col-12">
												<button class="sign__btn sign__btn--small" type="button"><span>Change</span></button>
											</div>
										</div>
									</form>
								</div>
								<!-- end password form -->
							</div>
						</div>	
					</div>

					<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab" tabindex="0">
						<!-- table -->
						<div class="col-12">
							<div class="catalog catalog--1">
								<table class="catalog__table">
									<thead>
										<tr>
											<th>ID</th>
											<th>ITEM</th>
											<th>AUTHOR</th>
											<th>TEXT</th>
											<th>LIKE / DISLIKE</th>
											<th>CRAETED DATE</th>
											<th>ACTIONS</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>
												<div class="catalog__text">11</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">I Dream in Another Language</a></div>
											</td>
											<td>
												<div class="catalog__text">Charlize Theron</div>
											</td>
											<td>
												<div class="catalog__text">When a renowned archaeologist goes...</div>
											</td>
											<td>
												<div class="catalog__text">12 / 7</div>
											</td>
											<td>
												<div class="catalog__text">05.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">12</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">The Forgotten Road</a></div>
											</td>
											<td>
												<div class="catalog__text">Tyreese Gibson</div>
											</td>
											<td>
												<div class="catalog__text">A down-on-his-luck boxer struggles...</div>
											</td>
											<td>
												<div class="catalog__text">67 / 22</div>
											</td>
											<td>
												<div class="catalog__text">05.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">13</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Whitney</a></div>
											</td>
											<td>
												<div class="catalog__text">Jordana Brewster</div>
											</td>
											<td>
												<div class="catalog__text">When an old friend offers him...</div>
											</td>
											<td>
												<div class="catalog__text">44 / 5</div>
											</td>
											<td>
												<div class="catalog__text">04.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">14</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Red Sky at Night</a></div>
											</td>
											<td>
												<div class="catalog__text">Son Gun</div>
											</td>
											<td>
												<div class="catalog__text">But as the stakes get higher...</div>
											</td>
											<td>
												<div class="catalog__text">20 / 6</div>
											</td>
											<td>
												<div class="catalog__text">04.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">15</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Into the Unknown</a></div>
											</td>
											<td>
												<div class="catalog__text">Louis Leterrier</div>
											</td>
											<td>
												<div class="catalog__text">A brilliant scientist discovers...</div>
											</td>
											<td>
												<div class="catalog__text">8 / 132</div>
											</td>
											<td>
												<div class="catalog__text">04.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">16</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">The Unseen Journey</a></div>
											</td>
											<td>
												<div class="catalog__text">Brian Cranston</div>
											</td>
											<td>
												<div class="catalog__text">But when her groundbreaking...</div>
											</td>
											<td>
												<div class="catalog__text">6 / 1</div>
											</td>
											<td>
												<div class="catalog__text">03.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">17</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Savage Beauty</a></div>
											</td>
											<td>
												<div class="catalog__text">Matt Jones</div>
											</td>
											<td>
												<div class="catalog__text">Along the way, she must...</div>
											</td>
											<td>
												<div class="catalog__text">10 / 0</div>
											</td>
											<td>
												<div class="catalog__text">03.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">18</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Endless Horizon</a></div>
											</td>
											<td>
												<div class="catalog__text">Rosa Lee</div>
											</td>
											<td>
												<div class="catalog__text">Renewable energy source...</div>
											</td>
											<td>
												<div class="catalog__text">13 / 14</div>
											</td>
											<td>
												<div class="catalog__text">02.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">19</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">The Lost Key</a></div>
											</td>
											<td>
												<div class="catalog__text">Tess Harper</div>
											</td>
											<td>
												<div class="catalog__text">Confront her own past to save...</div>
											</td>
											<td>
												<div class="catalog__text">12 / 7</div>
											</td>
											<td>
												<div class="catalog__text">02.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">20</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Echoes of Yesterday</a></div>
											</td>
											<td>
												<div class="catalog__text">Gene Graham</div>
											</td>
											<td>
												<div class="catalog__text">Her father and uncover the secrets...</div>
											</td>
											<td>
												<div class="catalog__text">67 / 22</div>
											</td>
											<td>
												<div class="catalog__text">01.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- end table -->

						<!-- paginator -->
						<div class="col-12">
							<div class="main__paginator">
								<!-- amount -->
								<span class="main__paginator-pages">Showing 10 of 2356</span>
								<!-- end amount -->

								<ul class="main__paginator-list">
									<li>
										<a href="#">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg>
											<span>Prev</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span>Next</span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg>
										</a>
									</li>
								</ul>

								<ul class="paginator">
									<li class="paginator__item paginator__item--prev">
										<a href="#"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg></a>
									</li>
									<li class="paginator__item"><a href="#">1</a></li>
									<li class="paginator__item paginator__item--active"><a href="#">2</a></li>
									<li class="paginator__item"><a href="#">3</a></li>
									<li class="paginator__item"><a href="#">4</a></li>
									<li class="paginator__item"><span>...</span></li>
									<li class="paginator__item"><a href="#">29</a></li>
									<li class="paginator__item"><a href="#">30</a></li>
									<li class="paginator__item paginator__item--next">
										<a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.54,11.29,9.88,5.64a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.95,5L8.46,17a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l5.66-5.65A1,1,0,0,0,15.54,11.29Z"/></svg></a>
									</li>
								</ul>
							</div>
						</div>
						<!-- end paginator -->
					</div>

					<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab" tabindex="0">
						<!-- table -->
						<div class="col-12">
							<div class="catalog catalog--2">
								<table class="catalog__table">
									<thead>
										<tr>
											<th>ID</th>
											<th>ITEM</th>
											<th>AUTHOR</th>
											<th>TEXT</th>
											<th>RATING</th>
											<th>LIKE / DISLIKE</th>
											<th>CRAETED DATE</th>
											<th>ACTIONS</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>
												<div class="catalog__text">11</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">I Dream in Another Language</a></div>
											</td>
											<td>
												<div class="catalog__text">Gene Graham</div>
											</td>
											<td>
												<div class="catalog__text">Her father and uncover the secrets...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">7.9</div>
											</td>
											<td>
												<div class="catalog__text">12 / 7</div>
											</td>
											<td>
												<div class="catalog__text">06.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">12</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">The Forgotten Road</a></div>
											</td>
											<td>
												<div class="catalog__text">Tess Harper</div>
											</td>
											<td>
												<div class="catalog__text">Confront her own past to save...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">8.6</div>
											</td>
											<td>
												<div class="catalog__text">67 / 22</div>
											</td>
											<td>
												<div class="catalog__text">06.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">13</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Whitney</a></div>
											</td>
											<td>
												<div class="catalog__text">Rosa Lee</div>
											</td>
											<td>
												<div class="catalog__text">Renewable energy source...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">6.0</div>
											</td>
											<td>
												<div class="catalog__text">44 / 5</div>
											</td>
											<td>
												<div class="catalog__text">05.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">14</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Red Sky at Night</a></div>
											</td>
											<td>
												<div class="catalog__text">Matt Jones</div>
											</td>
											<td>
												<div class="catalog__text">Along the way, she must...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">9.1</div>
											</td>
											<td>
												<div class="catalog__text">20 / 6</div>
											</td>
											<td>
												<div class="catalog__text">05.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">15</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Into the Unknown</a></div>
											</td>
											<td>
												<div class="catalog__text">Brian Cranston</div>
											</td>
											<td>
												<div class="catalog__text">But when her groundbreaking...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">5.5</div>
											</td>
											<td>
												<div class="catalog__text">8 / 132</div>
											</td>
											<td>
												<div class="catalog__text">05.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">16</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">The Unseen Journey</a></div>
											</td>
											<td>
												<div class="catalog__text">Louis Leterrier</div>
											</td>
											<td>
												<div class="catalog__text">A brilliant scientist discovers...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">7.0</div>
											</td>
											<td>
												<div class="catalog__text">6 / 1</div>
											</td>
											<td>
												<div class="catalog__text">04.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">17</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Savage Beauty</a></div>
											</td>
											<td>
												<div class="catalog__text">Son Gun</div>
											</td>
											<td>
												<div class="catalog__text">But as the stakes get higher...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">9.0</div>
											</td>
											<td>
												<div class="catalog__text">10 / 0</div>
											</td>
											<td>
												<div class="catalog__text">04.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">18</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Endless Horizon</a></div>
											</td>
											<td>
												<div class="catalog__text">Jordana Brewster</div>
											</td>
											<td>
												<div class="catalog__text">When an old friend offers him...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">6.2</div>
											</td>
											<td>
												<div class="catalog__text">13 / 14</div>
											</td>
											<td>
												<div class="catalog__text">03.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">19</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">The Lost Key</a></div>
											</td>
											<td>
												<div class="catalog__text">Tyreese Gibson</div>
											</td>
											<td>
												<div class="catalog__text">A down-on-his-luck boxer struggles...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">7.9</div>
											</td>
											<td>
												<div class="catalog__text">12 / 7</div>
											</td>
											<td>
												<div class="catalog__text">02.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="catalog__text">20</div>
											</td>
											<td>
												<div class="catalog__text"><a href="#">Echoes of Yesterday</a></div>
											</td>
											<td>
												<div class="catalog__text">Charlize Theron</div>
											</td>
											<td>
												<div class="catalog__text">When a renowned archaeologist goes...</div>
											</td>
											<td>
												<div class="catalog__text catalog__text--rate">8.6</div>
											</td>
											<td>
												<div class="catalog__text">67 / 22</div>
											</td>
											<td>
												<div class="catalog__text">02.02.2023</div>
											</td>
											<td>
												<div class="catalog__btns">
													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--view" data-bs-target="#modal-view2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
													</button>

													<button type="button" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete2">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
													</button>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- end table -->

						<!-- paginator -->
						<div class="col-12">
							<div class="main__paginator">
								<!-- amount -->
								<span class="main__paginator-pages">Showing 10 of 9071</span>
								<!-- end amount -->

								<ul class="main__paginator-list">
									<li>
										<a href="#">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"/></svg>
											<span>Prev</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span>Next</span>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"/></svg>
										</a>
									</li>
								</ul>

								<ul class="paginator">
									<li class="paginator__item paginator__item--prev">
										<a href="#"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"/></svg></a>
									</li>
									<li class="paginator__item"><a href="#">1</a></li>
									<li class="paginator__item paginator__item--active"><a href="#">2</a></li>
									<li class="paginator__item"><a href="#">3</a></li>
									<li class="paginator__item"><a href="#">4</a></li>
									<li class="paginator__item"><span>...</span></li>
									<li class="paginator__item"><a href="#">29</a></li>
									<li class="paginator__item"><a href="#">30</a></li>
									<li class="paginator__item paginator__item--next">
										<a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.54,11.29,9.88,5.64a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.95,5L8.46,17a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l5.66-5.65A1,1,0,0,0,15.54,11.29Z"/></svg></a>
									</li>
								</ul>
							</div>
						</div>
						<!-- end paginator -->
					</div>
				</div>
				<!-- end content tabs -->
			</div>
		</div>
	</main>
	<!-- end main content -->
	
	<!-- view modal -->
	<div class="modal fade" id="modal-view" tabindex="-1" aria-labelledby="modal-view" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal__content modal__content--view">
					<div class="comments__autor">
						<img class="comments__avatar" src="img/user.svg" alt="">
						<span class="comments__name">John Doe</span>
						<span class="comments__time">30.08.2023, 17:53</span>
					</div>
					<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
					<div class="comments__actions">
						<div class="comments__rate">
							<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.3,10.08A3,3,0,0,0,19,9H14.44L15,7.57A4.13,4.13,0,0,0,11.11,2a1,1,0,0,0-.91.59L7.35,9H5a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17.73a3,3,0,0,0,2.95-2.46l1.27-7A3,3,0,0,0,21.3,10.08ZM7,20H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H7Zm13-7.82-1.27,7a1,1,0,0,1-1,.82H9V10.21l2.72-6.12A2.11,2.11,0,0,1,13.1,6.87L12.57,8.3A2,2,0,0,0,14.44,11H19a1,1,0,0,1,.77.36A1,1,0,0,1,20,12.18Z"/></svg>12</span>

							<span>7<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,2H6.27A3,3,0,0,0,3.32,4.46l-1.27,7A3,3,0,0,0,5,15H9.56L9,16.43A4.13,4.13,0,0,0,12.89,22a1,1,0,0,0,.91-.59L16.65,15H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2ZM15,13.79l-2.72,6.12a2.13,2.13,0,0,1-1.38-2.78l.53-1.43A2,2,0,0,0,9.56,13H5a1,1,0,0,1-.77-.36A1,1,0,0,1,4,11.82l1.27-7a1,1,0,0,1,1-.82H15ZM20,12a1,1,0,0,1-1,1H17V4h2a1,1,0,0,1,1,1Z"/></svg></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end view modal -->

	<!-- delete modal -->
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal__content">
					<form action="#" class="modal__form">
						<h4 class="modal__title">Comment delete</h4>

						<p class="modal__text">Are you sure to permanently delete this comment?</p>

						<div class="modal__btns">
							<button class="modal__btn modal__btn--apply" type="button"><span>Delete</span></button>
							<button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal" aria-label="Close"><span>Dismiss</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end delete modal -->

	<!-- view modal -->
	<div class="modal fade" id="modal-view2" tabindex="-1" aria-labelledby="modal-view2" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal__content modal__content--view">
					<div class="reviews__autor">
						<img class="reviews__avatar" src="img/user.svg" alt="">
						<span class="reviews__name">Best Marvel movie in my opinion</span>
						<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

						<span class="reviews__rating"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M22,10.1c0.1-0.5-0.3-1.1-0.8-1.1l-5.7-0.8L12.9,3c-0.1-0.2-0.2-0.3-0.4-0.4C12,2.3,11.4,2.5,11.1,3L8.6,8.2L2.9,9C2.6,9,2.4,9.1,2.3,9.3c-0.4,0.4-0.4,1,0,1.4l4.1,4l-1,5.7c0,0.2,0,0.4,0.1,0.6c0.3,0.5,0.9,0.7,1.4,0.4l5.1-2.7l5.1,2.7c0.1,0.1,0.3,0.1,0.5,0.1v0c0.1,0,0.1,0,0.2,0c0.5-0.1,0.9-0.6,0.8-1.2l-1-5.7l4.1-4C21.9,10.5,22,10.3,22,10.1z"></path></svg>8.4</span>
					</div>
					<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end view modal -->

	<!-- delete modal -->
	<div class="modal fade" id="modal-delete2" tabindex="-1" aria-labelledby="modal-delete2" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal__content">
					<form action="#" class="modal__form">
						<h4 class="modal__title">Review delete</h4>

						<p class="modal__text">Are you sure to permanently delete this review?</p>

						<div class="modal__btns">
							<button class="modal__btn modal__btn--apply" type="button"><span>Delete</span></button>
							<button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal" aria-label="Close"><span>Dismiss</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end delete modal -->

	<!-- status modal -->
	<div class="modal fade" id="modal-status3" tabindex="-1" aria-labelledby="modal-status3" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal__content">
					<form action="#" class="modal__form">
						<h4 class="modal__title">Status change</h4>

						<p class="modal__text">Are you sure about immediately change status?</p>

						<div class="modal__btns">
							<button class="modal__btn modal__btn--apply" type="button"><span>Apply</span></button>
							<button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal" aria-label="Close"><span>Dismiss</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end status modal -->
	
	<!-- delete modal -->
	<div class="modal fade" id="modal-delete3" tabindex="-1" aria-labelledby="modal-delete3" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal__content">
					<form action="#" class="modal__form">
						<h4 class="modal__title">User delete</h4>

						<p class="modal__text">Are you sure to permanently delete this user?</p>

						<div class="modal__btns">
							<button class="modal__btn modal__btn--apply" type="button"><span>Delete</span></button>
							<button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal" aria-label="Close"><span>Dismiss</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end delete modal -->

	<!-- JS -->
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/smooth-scrollbar.js"></script>
	<script src="js/slimselect.min.js"></script>
	<script src="js/admin.js"></script>
</body>
</html>