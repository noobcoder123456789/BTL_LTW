<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<body>
    <form method="POST">
        <div class="container">
            <h1>Create Your Account</h1>
    
            <h6>One Account is all you need to access all Our services.</h6>
    
            <div class="row">
                <div class="col-6">
                    <div class="form-floating mb-3 has-validation">
                        <input type="text" class="form-control" id="first-name" name="first-name" placeholder="First Name">
                        <label for="first-name">First Name</label>
                    </div>
                </div>
    
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last Name">
                        <label for="last-name">Last Name</label>
                    </div>                
                </div>
            </div>
    
            <div class="row">
                <div class="col-2">
                    <h5>Gender</h5>
                </div>
    
                <div class="col-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="unknown" value="unknown">
                        <label class="form-check-label" for="unknown">Unknown</label>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <select class="form-floating form-select" name="country" id="country" aria-label="Default select example">
                            <option value="vietnam">Việt Nam</option>
                            <option value="Australia">Australia</option>
                            <option value="United States">United States</option>
                            <option value="India">India</option>
                            <option value="Other">Other</option>
                        </select>
                        <label for="country">Country/Region</label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <h5>
                    Birthday
                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="This information is used to determine the services available for your account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                    </span>
                </h5>
                
                <div class="col-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="month-birth" id="month-birth" aria-label="Default select example">
                            <option value="m" style="color: grey;">Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <label for="month-birth">Month</label>
                    </div>
                </div>
    
                <div class="col-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="date-birth" id="date-birth" aria-label="Default select example">
                            <option value="d" style="color: grey;">Day</option>
                            <?php
                                for($i = 1; $i <= 31; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                        </select>
                        <label for="date-birth">Day</label>
                    </div>
                </div>
    
                <div class="col-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="year-birth" name="year-birth" aria-label="Default select example">
                            <option value="y" style="color: grey;">Year</option>
                            <?php
                                for($i = 2022; $i >= 1900; $i--) {
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                        </select>
                        <label for="year-birth">Year</label>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">name@example.com</label>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <p style="color: grey;">This will be your new Account.</p>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                        <label for="password">Password</label>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="********">
                        <label for="confirm-password">Confirm Password</label>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="about" id="about" style="height: 100px"></textarea>
                        <label for="about">About</label>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-top: 20px;">
                <div class="col-12" style="display: flex; flex-flow: row wrap; justify-content: center;">
                    <img alt="Privacy Icon" width="32" height="32" src="https://www.apple.com/legal/images/icon_dataprivacy_2x.png">
    
                    <p style="font-size: 12px; margin-top: 10px;">
                        Your Account information is used to allow you to sign in securely and access your data. records certain data for security, support and reporting purposes. If you agree, may also use your Account information to send you marketing emails and communications, including based on your use of services. 
                    </p>
                </div>
            </div>
    
            <div class="row" style="margin-top: 20px;">
                <div class="col-6">
                    <button id="reset-button" class="btn btn-danger" onclick="reset(event)" type="button">
                        Reset
                    </button>
                </div>
    
                <div class="col-6">
                    <button id="submit-button" type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>

    <?php 
        function checkLength($str) {
            return strlen($str) >= 2 && strlen($str) <= 30;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = isset($_POST["first-name"]) ? $_POST["first-name"] : NULL;
            $last_name = isset($_POST["last-name"]) ? $_POST["last-name"] : NULL;
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : NULL;
            $country = isset($_POST["country"]) ? $_POST["country"] : NULL;
            $month_birth = isset($_POST["month-birth"]) ? $_POST["month-birth"] : NULL;
            $date_birth = isset($_POST["date-birth"]) ? $_POST["date-birth"] : NULL;
            $year_birth = isset($_POST["year-birth"]) ? $_POST["year-birth"] : NULL;
            $email = isset($_POST["email"]) ? $_POST["email"] : NULL;
            $password = isset($_POST["password"]) ? $_POST["password"] : NULL;
            $confirm_password = isset($_POST["confirm-password"]) ? $_POST["confirm-password"] : NULL;
            $about = isset($_POST["about"]) ? $_POST["about"] : NULL;
            
            $feedback = "";
            if(!$first_name) {
                $feedback .= "First name is required.\n";
            } else if(!checkLength($first_name)) {
                $feedback .= "First name must include 2-30 characters.\n";
            }

            if(!$last_name) {
                $feedback .= "Last name is required.\n";
            } else if(!checkLength($last_name)) {
                $feedback .= "Last name must include 2-30 characters.\n";
            }

            if(!$gender) {
                $feedback .= "Gender is required.\n";
            }

            if(!$country) {
                $feedback .= "Country is required.\n";
            }

            if($month_birth == "m" || $date_birth == "d" || $year_birth == "y") {
                $feedback .= "Birthday is required.\n";
            } else if(!checkdate((int)$month_birth, (int)$date_birth, (int)$year_birth)) {
                $feedback .= "Birthday is invalid.\n";
            }

            if(!$email) {
                $feedback .= "Email is required.\n";
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $feedback .= "Email is invalid.\n";
            }

            if(!$password) {
                $feedback .= "Password is required.\n";
            } else if(!checkLength($password)) {
                $feedback .= "Password must include 2-30 characters.\n";
            }

            if(!$confirm_password) {
                $feedback .= "Confirm password is required.\n";
            } else if($password != $confirm_password) {
                $feedback .= "Confirm password is not match.\n";
            }

            if(strlen($about) > 10000) {
                $feedback .= "About must include less than 10000 characters.\n";
            }

            if(strlen($feedback) > 0) {
                $feedback = str_replace("\n", "\\n", $feedback);
                echo "<script>alert('$feedback')</script>";
            } else {
                echo "<script>alert('Complete!')</script>";
            }
        }
    ?>

    <script>
        function reset(e) {
            e.preventDefault();
            $("#first-name").val("");
            $("#last-name").val("");
            $("#month-birth").val("m");
            $("#date-birth").val("d");
            $("#year-birth").val("y");
            $("#email").val("");
            $("#password").val("");
            $("#confirm-password").val("");
            $("#about").val("");
        }
    </script>
</body>
</html>