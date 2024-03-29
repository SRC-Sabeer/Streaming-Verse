
<?php
session_start();
include("../utilities/connection.php");
// Check user authentication
if (!isset($_SESSION['admin'])) {
    // Redirect to the registration page
    header("Location: signin.php");
    exit();
}


$select = "SELECT * FROM `users`";
$userdetail = mysqli_query($con ,$select);

// Get current page from URL, default to 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Number of items to display per page
$itemsPerPage = 10;

// Calculate the offset for pagination
$offset = ($page - 1) * $itemsPerPage;

// Query to fetch movies with pagination
$selectMovies = "SELECT * FROM `users` LIMIT $offset, $itemsPerPage";
$userdetail = mysqli_query($con, $selectMovies);



// Get the search term from the form input
$searchTerm = isset($_GET['search']) ? $_GET['search'] : "";

// Modify the query to fetch movies with pagination and search filter
$selectMovies = "SELECT * FROM `users` WHERE username LIKE '%$searchTerm%' LIMIT $offset, $itemsPerPage";
$userdetail = mysqli_query($con, $selectMovies);



// Query to get the total number of movies for pagination
$sql = "SELECT COUNT(*) as row_count FROM `users`";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$rowCount = $row['row_count'];

// Calculate total number of pages
$totalPages = ceil($rowCount / $itemsPerPage);

// Calculate the start page for pagination
$maxVisibleButtons = 3;
$startPage = max(1, min($totalPages - $maxVisibleButtons + 1, $page - floor($maxVisibleButtons / 2)));


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
						<h2>Users</h2>
						<?php 
						$sql = "SELECT COUNT(*) as row_counts FROM `users`";
						$result = $con->query($sql);	
$row = $result->fetch_assoc();
$rowCounts = $row['row_counts'];
?>
						<span class="main__title-stat"><?php echo $rowCounts ?> Total</span>

						

						<div class="main__title-wrap">
						

							  <!-- search -->
							  <form action="#" class="main__title-form">
                                <input type="text" placeholder="Find movie / tv series.." name="search"
                                    value="<?php echo $searchTerm; ?>">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path ... />
                                    </svg>
                                </button>
                            </form>

                            <!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->

				<!-- users -->
				<div class="col-12">
					<div class="catalog catalog--1">
						<table class="catalog__table">
							<thead>
								<tr>
									<th>ID</th>
									<th>BASIC INFO</th>
									<th>USERNAME</th>
									<th>PASSWORD</th>
									<th>CRAETED DATE</th>
									<th>ACTIONS</th>
								</tr>
							</thead>

							<tbody>

							<?php
 while ($data_user = mysqli_fetch_assoc($userdetail)) {

    echo' 

	<tr>
	<td>
		<div class="catalog__text">'.$data_user['id'].'</div>
	</td>
	<td>
		<div class="catalog__user">
			<div class="catalog__avatar">
				<img src="img/user.svg" alt="">
			</div>
			<div class="catalog__meta">
				<h3>'.$data_user['firstname'].' '.$data_user['lastname'].'</h3>
				<span>'.$data_user['email'].'</span>
			</div>
		</div>
	</td>
	<td>
		<div class="catalog__text">'.$data_user['username'].'</div>
	</td>
	<td>
		<div class="catalog__text">'.$data_user['password'].'</div>
	</td>
	
	
	<td>
		<div class="catalog__text">'.$data_user['datecreated'].'</div>
	</td>
	<td>
		<div class="catalog__btns">
			
			<a href="edit-user.php" class="catalog__btn catalog__btn--edit">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"/></svg>
			</a>
			<button type="button" class="catalog__btn catalog__btn--delete" data-bs-toggle="modal" data-bs-target="#modal-delete" data-user-id="' . $data_user['id'] . '">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/></svg>
			</button>
		</div>
	</td>
</tr>




    ';
 }


?>



								
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- end users -->

			                <!-- paginator -->
							<div class="col-12">
                    <div class="main__paginator">
                        <ul class="" style="display: flex; margin-top: 5%;">

                            <?php
for ($i = $startPage; $i <= min($startPage + $maxVisibleButtons - 1, $totalPages); $i++) {
    echo '<li class="paginator__item ' . ($i == $page ? 'paginator__item--active' : '') . '">';
    echo '<a href="?page=' . $i .'">' . $i . '</a>';
    echo '</li>';
}

?>



                        </ul>
                    </div>
                </div>
                <!-- end paginator -->
			</div>
		</div>
	</main>
	<!-- end main content -->

<!-- delete modal -->
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal__content">
                <form action="common/delete_user.php" method="POST">
                    <h4 class="modal__title">User delete</h4>

                    <p class="modal__text">Are you sure to permanently delete this user?</p>

                    <!-- Pass the user ID to the delete_user.php script -->
                    <input type="hidden" id="deleteUserId" name="userId" value="">

                    <div class="modal__btns">
                        <button class="modal__btn modal__btn--apply" type="submit"><span>Delete</span></button>
                        <button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal" aria-label="Close"><span>Dismiss</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end delete modal -->

<?php 
include("./common/footer.php");

?>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.catalog__btn--delete');
        const modalDelete = new bootstrap.Modal(document.getElementById('modal-delete'));

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-user-id');
                // Set the user ID in the hidden input field of the delete modal
                document.getElementById('deleteUserId').value = userId;
                modalDelete.show(); // Show the delete modal
            });
        });
    });
</script>
</body>
</html>