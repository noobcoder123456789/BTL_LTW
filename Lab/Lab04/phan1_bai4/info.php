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
    <div class="container" style="margin-top: 2rem;">
        <h1>Account Profile</h1>
        <p>A page where users can change profile information</p>

        <div class="row">
            <div class="col-4">
                <img src="https://zuramai.github.io/mazer/demo/assets/compiled/jpg/2.jpg" id="avatar" alt="">
                <h2>Harry Potter</h2>
                <h5>Junior Software Engineer</h5>
            </div>

            <div class="col-1"></div>
            
            <div class="col-7">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="user-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="user-name" placeholder="User's Name">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="user-email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="user-email" placeholder="name@example.com">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="user-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="user-phone" placeholder="09xxxxxxxx">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="user-birthday" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="user-birthday" placeholder="dd/mm/yyyy">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="user-gender" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>