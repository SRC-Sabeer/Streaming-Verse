<?php
session_start();
include("../../utilities/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the userId parameter is set and is a number
    if (isset($_POST['userId']) && is_numeric($_POST['userId'])) {
        // Sanitize the userId to prevent SQL injection (you should use prepared statements for better security)
        $userId = mysqli_real_escape_string($con, $_POST['userId']);

        // Start a database transaction
        mysqli_autocommit($con, false);
        $error = false;

        // Query to delete watchlist entries for the user
        $deleteWatchlistQuery = "DELETE FROM `watchlist` WHERE `user_id` = $userId";

        // Perform the deletion of watchlist entries
        if (!mysqli_query($con, $deleteWatchlistQuery)) {
            // Deletion of watchlist entries failed
            $error = true;
            $_SESSION['error_message'] = "Error deleting watchlist entries: " . mysqli_error($con);
        }

        // Query to delete the user with the given userId
        $deleteUserQuery = "DELETE FROM `users` WHERE `id` = $userId";

        // Perform the deletion of the user
        if (!mysqli_query($con, $deleteUserQuery)) {
            // Deletion of the user failed
            $error = true;
            $_SESSION['error_message'] = "Error deleting user: " . mysqli_error($con);
        }

        if ($error) {
            // If any deletion operation failed, roll back the transaction and set an error message
            mysqli_rollback($con);
        } else {
            // If all deletion operations were successful, commit the transaction
            mysqli_commit($con);
            $_SESSION['success_message'] = "User with ID $userId and their watchlist entries have been deleted successfully!";
        }
    } else {
        // Invalid or missing userId parameter
        $_SESSION['error_message'] = "Invalid request. Please provide a valid user ID.";
    }
} else {
    // Handle cases where the request method is not POST (e.g., if someone tries to access this page directly)
    $_SESSION['error_message'] = "Invalid request method.";
}

// Close the database connection
mysqli_close($con);

// Redirect back to the users.php page
header("Location: ../users.php");
exit();
?>
