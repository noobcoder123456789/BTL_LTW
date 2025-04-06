<?php
$account = array(
    "admin@hcmut.edu.vn" => "root",
    "root@hcmut.edu.vn" => "admin"
);

session_start();

if(isset($_SESSION['remember']) || isset($_COOKIE['remember'])) {
    header("Location: info.php");
    exit();
}

$error = NULL;
if($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = trim($_POST["email-big"] ?? $_POST["email"] ?? '');
    $password = trim($_POST["password-big"] ?? $_POST["password"] ?? '');
    $remember_me = isset($_POST["remember-me"]) || isset($_POST["remember-me-big"]);
    
    if(isset($account[$email]) && $account[$email] === $password) {
        $token = bin2hex(random_bytes(16));
        $_SESSION['remember'] = $token;
        $_SESSION['email'] = $email;
        if($remember_me) {
            setcookie("remember", $token, time() + 600);
            setcookie("email", $email, time() + 600);            
        }

        header('Location: info.php');
        exit();
    } else {
        $error = 'Email or Password is incorrect! Please try again!';        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body class="overlay">
    <?php if(isset($error)): ?>
        <script>alert(<?= json_encode($error) ?>);</script>
    <?php endif; ?>

    <form action="login.php" method="POST" class="container">
        <div class="row" id="big-screen">
            <div class="col-6">
                <div class="row" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="col-12 logo">
                        <img src="hcmut.png" style="height: 6rem; width: auto;" alt="">
                    </div>

                    <div class="col-12">
                        <h2>Login</h2>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email-big" name="email-big" placeholder="name@example.com">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password-big" name="password-big" placeholder="Password">
                    </div>

                    <div class="col-12 form-check" style="margin-left: 1rem;">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember-me-big">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label>
                    </div>

                    <div class="col-12">
                        <a href="#"><p id="forgot-p">Forgot Password?</p></a>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-warning">
                            Sign in
                        </button>
                    </div>

                    <div class="col-12">
                        <p id="continue-p">Or Continue With</p>
                    </div>

                    <div class="col-12" style="padding: 0;">
                        <div class="row" style="background-color: transparent;">
                            <div class="col-4">
                                <button class="btn btn-light">
                                    <i class="bi bi-google fs-1"></i>
                                </button>
                            </div>

                            <div class="col-4">
                                <button class="btn btn-light">
                                    <i class="bi bi-github fs-1"></i>
                                </button>
                            </div>

                            <div class="col-4">
                                <button class="btn btn-light">
                                    <i class="bi bi-facebook fs-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <p style="text-align: center; font-size: 1.2rem;">Don't have an account yet? <a href="register.html" id="register-a">Register for free</a></p>
                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <img src="background.png" style="transform: scaleX(-1) scale(0.5);" alt="">
            </div>
        </div>

        <div class="row" id="small-screen">
            <div class="col-12">
                <div class="row" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="col-12 logo">
                        <img src="hcmut.png" style="height: 6rem; width: auto;" alt="">
                    </div>

                    <div class="col-12">
                        <h2>Login</h2>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="col-12 form-check" style="margin-left: 1rem;">
                        <input class="form-check-input" type="checkbox" value="" id="remember-me" name="remember-me">
                        <label class="form-check-label" for="remember-me">
                            Remember Me
                        </label>
                    </div>

                    <div class="col-12">
                        <a href="#"><p id="forgot-p">Forgot Password?</p></a>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-warning">
                            Sign in
                        </button>
                    </div>

                    <div class="col-12">
                        <p id="continue-p">Or Continue With</p>
                    </div>

                    <div class="col-12" style="padding: 0;">
                        <div class="row" style="background-color: transparent;">
                            <div class="col-4">
                                <button class="btn btn-light">
                                    <i class="bi bi-google fs-1"></i>
                                </button>
                            </div>

                            <div class="col-4">
                                <button class="btn btn-light">
                                    <i class="bi bi-github fs-1"></i>
                                </button>
                            </div>

                            <div class="col-4">
                                <button class="btn btn-light">
                                    <i class="bi bi-facebook fs-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <p style="text-align: center; font-size: 1.2rem;">Don't have an account yet? <a href="#" id="register-a">Register for free</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>