<?php
$information = array(
    "admin@hcmut.edu.vn" => array(
        "name" => "Harry Potter",
        "phone" => "0901234567",
        "birthday" => "31/07/1980",
        "gender" => "Male",
        "career" => "Software Engineer",
        "img" => "harry.png"
    ),
    "root@hcmut.edu.vn" => array(
        "name" => "Hermione Granger",
        "phone" => "0907654321",
        "birthday" => "19/09/1979",
        "gender" => "Female",
        "career" => "Data Scientist",
        "img" => "hermione.png"
    )
);

session_start();
if(!(isset($_SESSION['remember']) || isset($_COOKIE['remember']))) {
    header("Location: login.php");
    exit();
}

$email = $_COOKIE['email'] ?? $_SESSION['email'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="info.css">
    <title>Account Profile</title>
</head>
<body>
    <form action="logout.php" method="GET" class="container" style="margin-top: 2rem;">
        <button class="btn btn-danger float-end" type="submit">Logout</button>
        <h1>Account Profile</h1>
        <p>A page where users can change profile information</p>

        <div class="row">
            <div class="col-4">
                <img src="<?= $information[$email]['img']?>" id="avatar" alt="">
                <h2><?= $information[$email]['name']?></h2>
                <h5><?= $information[$email]['career']?></h5>
            </div>

            <div class="col-1"></div>
            
            <div class="col-7">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="user-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="user-name" placeholder="User's Name" value="<?= $information[$email]['name']?>">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="user-email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="user-email" placeholder="name@example.com" value="<?= $email?>">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="user-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="user-phone" placeholder="09xxxxxxxx" value="<?= $information[$email]['phone']?>">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="user-birthday" class="form-label">Birthday</label>
                        <input type="text" class="form-control" id="user-birthday" placeholder="dd/mm/yyyy" value="<?= $information[$email]['birthday']?>">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="user-gender" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="<?= $information[$email]['gender']?>" class="text-capitalize"><?= $information[$email]['gender']?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>