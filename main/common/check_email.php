<?php
include("../../utilities/connection.php");

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    
    // Perform a query to check if the email exists in the database
    $query = "SELECT COUNT(*) as count FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['count'] > 0) {
        echo "exists";
    } else {
        echo "not_exists";
    }
}
?>
