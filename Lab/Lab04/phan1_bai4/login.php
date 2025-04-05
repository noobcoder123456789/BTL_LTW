<?php
$account = array(
    array("admin@hcmut.edu.vn", "root"),
    array("root@hcmut.edu.vn", "admin")
);

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = trim('');
    if(isset($_POST["email"])) $email = trim($_POST["email"]);
    elseif(isset($_POST["email-big"])) $email = trim($_POST["email-big"]);
    
    $password = trim('');    
    if(isset($_POST["password"])) $password = trim($_POST["password"]);
    elseif(isset($_POST["password-big"])) $password = trim($_POST["password-big"]);
    
    $remember_me = isset($_POST["remember-me"]) || isset($_POST["remember-me-big"]);

    $isvalid = (
        $account[0][0] === $email && $account[0][1] === $password ||
        $account[1][0] === $email && $account[1][1] === $password
    );
    
    header('Content-Type: application/json'); 
    if($isvalid) {
        if($remember_me) {
            setcookie("email", $email, time() + 600);
            setcookie("password", $password, time() + 600);
        }

        http_response_code(200);
        echo json_encode([
            'redirect' => 'info.php'
        ]);
    } else {
        http_response_code(401);
        echo json_encode([
            'error' => 'authentication_failed',
            'message' => 'Invalid email or password'
        ]);
    }

    exit();
}
?>