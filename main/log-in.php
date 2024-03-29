<?php
// Start session at the beginning of the script
session_start();

include("../utilities/connection.php");

$error_message = ""; // Initialize the error message

if (isset($_POST["btn"])) {
    $Email2 = $_POST["email2"];
    $Pass2 = $_POST["password2"];

    // Using prepared statements to prevent SQL injection
    $signin = "SELECT * FROM `users` WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($con, $signin);
    mysqli_stmt_bind_param($stmt, "ss", $Email2, $Pass2);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $num = mysqli_num_rows($result);

    if ($num != 0) {
        $array = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $array['username'];
        
        header("location:index.php");
        exit();
    } else if ($Email2 == 'admin@gmail.com' && $Pass2 == 'admin') {
        header("location:../admin/signin.php");
        exit();
    } else {
        $error_message = "Username or Password is Incorrect";
    }
}

include("./common/nav.php");
?>




    <!-- Log-in  -->
    <section class="position-relative pb-0">
        <div class="gen-login-page-background" style="background-image: url('../utilities/images/fix/login-bg.jpg');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form name="pms_login" id="pms_login" action="#" method="post">
                            <h4>Sign In</h4>
                            <p class="login-username">
                                <label for="user_login">Email Address</label>
                                <input type="email" class="input" name="email2" size="20">
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" class="input" name="password2" size="20">
                            </p>
                            <p class="login-remember">
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                    Me </label>
                            </p>
                            <p class="login-submit">
                            <button class="sign__btn" type="submit" name="btn"><span>Sign in</span></button>

                              
                            </p>
                            
                            <input type="hidden" name="pms_login" value="1"><input type="hidden" name="pms_redirect">Don't Have An Account ?  &nbsp;<a
                                href="register.php">Register</a> 
                                
                        </form>

                        <p class="error-message " style="color: red; font-weight: bold;" ><?php echo isset($error_message) ? $error_message : ""; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Log-in  -->
