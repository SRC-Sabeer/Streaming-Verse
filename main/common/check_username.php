<?php
include("../../utilities/connection.php");

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    
    // Perform a query to check if the username exists in the database
    $query = "SELECT COUNT(*) as count FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['count'] > 0) {
        echo "exists";
    } else {
        echo "not_exists";
    }
}
?>
