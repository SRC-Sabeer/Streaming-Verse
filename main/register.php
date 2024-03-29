    <?php

    session_start();
    
        include("../utilities/connection.php");

        if (isset($_POST["btn"])) {
            $firstname = $_POST["f-name"];
            $lastname = $_POST["l-name"];
            $username = $_POST["u-name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $date_created = date('Y-m-d H:i:s');
            $validNamePattern = '/^[A-Za-z]+$/';
        
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>$(document).ready(function() { $('#e-error').html('Please enter a valid email address.'); });</script>";
            } else {
                // First Name and Last Name Validation
                $validNamePattern = '/^[A-Za-z]+$/'; // Regex pattern for only letters
        
                if (empty($firstname) || !preg_match($validNamePattern, $firstname)) {
                    echo "<script>$(document).ready(function() { $('#f-error').html('Please enter a valid first name containing only letters.'); });</script>";
                } elseif (empty($lastname) || !preg_match($validNamePattern, $lastname)) {
                    echo "<script>$(document).ready(function() { $('#l-error').html('Please enter a valid last name containing only letters.'); });</script>";
                } else {
                    // All fields are valid, proceed with registration
                    $insert = "INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `password`, `datecreated`) VALUES ('$firstname','$lastname','$username','$email','$password','$date_created')";
                    $run = mysqli_query($con, $insert);
        
                    if ($run) {
                        header("location: log-in.php");
                        exit;
                    }
                }
            }
        }
        
        include("./common/nav.php");
        ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Function to check if the username exists in the database
    function checkUsername() {
        var username = $("input[name='u-name']").val();
        $.ajax({
            url: "./common/check_username.php", // Replace with the PHP file that checks the username
            method: "POST",
            data: { username: username },
            success: function(response) {
                if (response === "exists") {
                    $("#u-error").html("Username already exists!");
                } else {
                    $("#u-error").html("");
                }
                checkButtonStatus();
            }
        });
    }

    // Function to check if the email exists in the database
    function checkEmail() {
        var email = $("input[name='email']").val();
        $.ajax({
            url: "./common/check_email.php", // Replace with the PHP file that checks the email
            method: "POST",
            data: { email: email },
            success: function(response) {
                if (response === "exists") {
                    $("#e-error").html("Email already exists!");
                } else {
                    $("#e-error").html("");
                }
                checkButtonStatus();
            }
        });
    }

    function checkEmptyFields() {
        var firstname = $("input[name='f-name']").val();
        var lastname = $("input[name='l-name']").val();
        var username = $("input[name='u-name']").val();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
        var repeatpassword = $("input[name='pass2']").val();

        var isEmpty = !firstname || !lastname || !username || !email || !password || !repeatpassword;
        if (isEmpty) {
            $("#sign-error").html("");
        } else {
            $("#sign-error").html("");
        }

        // Check password length
        if (password.length < 8) {
            $("#pass-error").html("Weak Password");
        } else {
            $("#pass-error").html("");
        }

        // Recheck password match when either password field is updated
        checkPasswordMatch();

        checkButtonStatus();
    }

    // Function to check if first name and last name contain only letters
    function checkfNameFields() {
        var firstname = $("input[name='f-name']").val();

        // Check if first name and last name contain only letters
        var validNamePattern = /^[A-Za-z]+$/;
        var isFirstNameValid = validNamePattern.test(firstname);

        // Display error messages for first and last name
        if (!isFirstNameValid) {
            $("#f-error").html("Should contain letters only");
        } else {
            $("#f-error").html("");
        }

        checkButtonStatus();
    }

    function checklNameFields() {
        var lastname = $("input[name='l-name']").val();

        // Check if first name and last name contain only letters
        var validNamePattern = /^[A-Za-z]+$/;
        var isLastNameValid = validNamePattern.test(lastname);

        if (!isLastNameValid) {
            $("#l-error").html("Should contain letters only");
        } else {
            $("#l-error").html("");
        }

        checkButtonStatus();
    }

    function checkPasswordMatch() {
        var password = $("input[name='password']").val();
        var repeatPassword = $("input[name='pass2']").val();

        if (password === repeatPassword) {
            $("#pass2-error").html("");
        } else {
            $("#pass2-error").html("Passwords do not match.");
        }

        checkButtonStatus();
    }

    // Function to check the overall button status and enable/disable it accordingly
    function checkButtonStatus() {
        var usernameError = $("#u-error").html();
        var emailError = $("#e-error").html();
        var fnameError = $("#f-error").html();
        var lnameError = $("#l-error").html();
        var passwordMatchError = $("#pass2-error").html();
        var emptyFieldsError = $("#sign-error").html();
        var passwordLengthError = $("#pass-error").html(); // New variable for password length error

        // Disable the button if there are any errors or empty fields or password length error
        $("button[name='btn']").prop("disabled", usernameError || emailError || passwordMatchError || fnameError || lnameError || emptyFieldsError || passwordLengthError);
    }

    // Bind events to input fields to trigger validation
    $("input[name='u-name']").on("input", checkUsername);
    $("input[name='email']").on("input", checkEmail);
    $("input[name='f-name']").on("input", checkfNameFields);
    $("input[name='l-name']").on("input", checklNameFields);
    $("input[name='password'], input[name='pass2']").on("input", checkEmptyFields); // Check empty fields for both passwords


    // Initial button status check
    checkButtonStatus();
});
</script>
    

        <?php  

        ?>

    </head>
    <body>

        <!-- register -->
        <section class="position-relative pb-0">
            <div class="gen-register-page-background" style="background-image: url('../utilities/images/fix/register-bg.jpeg');">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <form id="pms_register-form" class="pms-form" method="POST">
                                <h4>Create Your Free Account</h4>
                                <input type="hidden" id="pmstkn" name="pmstkn" value="59b502f483"><input type="hidden"
                                    name="_wp_http_referer" value="/register/">
                                <ul class="pms-form-fields-wrapper pl-0">
                                    <li class="pms-field pms-user-login-field ">
                                        <label for="pms_user_login">First Name *</label>
                                        <input id="pms_user_login" name="f-name" type="text" required>
                                        <label id="f-error" style="color: red;"></label>
                                        
                                    </li>
                                    <li class="pms-field pms-user-email-field ">
                                        <label for="pms_user_email">Last Name *</label>
                                        <input id="pms_user_email" name="l-name" type="text" value="" required>
                                        <label id="l-error" style="color: red;"></label>    
                                    </li>
                                    <li class="pms-field pms-first-name-field ">
                                        <label for="pms_first_name">Username *</label>
                                        <input id="pms_first_name" name="u-name" type="text" value="" required>
                                        <label id="u-error" style="color: red;"></label>
                                    </li>
                                    <li class="pms-field pms-last-name-field ">
                                        <label for="pms_last_name">Email *</label>
                                        <input id="pms_last_name" name="email" type="email" value="" required>
                                        <label id="e-error" style="color: red;"></label>
                                    </li>
                                    <li class="pms-field pms-pass1-field">
                                        <label for="pms_pass1">Password *</label>
                                        <input id="pms_pass1" name="password" type="password" required>
                                        <label id="pass-error" style="color: red;"></label>
                                        
                                    </li>
                                    <li class="pms-field pms-pass2-field">
        <label for="pms_pass2">Repeat Password *</label>
        <input id="pms_pass2" name="pass2" type="password" required>
        <label id="pass2-error" style="color: red;"></label>
    </li>

                                
                                </ul>
                            
                                <button class="sign__btn signup" type="submit" name="btn"><span>Sign up</span></button>
                                <br>
                                <br>
                                <a href="./log-in.php" class="ml-2 red-c" ><span style="color:#fff;">Already Registered? </span> &nbsp;Signin</a>
                                
                            </form>



                            <p id="sign-error" style="color: red; font-weight: bold; "></p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- register -->


    
    </body>
    </html>