<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="detail_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Phần 1 Bài 2</title>    

    <script>
        $(document).ready(function() {
            $("header div:last-child").click(function() {
                $(this).animate({
                    opacity: 0
                }, 500, function() {
                    $(this).hide();
                    // $("header .form-floating label").hide();
                    $("header .form-floating").fadeIn(500);
                });
            });

            $(".burger-menu-container").hide();
            $("header div:first-child").click(function() {
                $(".burger-menu-container").slideDown(100, function() {
                    $(".burger-menu").slideDown(600);
                });                
            });

            $(".burger-menu-container svg").click(function() {
                $(".burger-menu").slideUp(600, function() {
                    $(".burger-menu-container").slideUp(0);
                });            
            });
        });
    </script>
</head>
<body>
    <header>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
        </div>

        <h1>Site Title</h1>

        <ul>
            <li><a href="">Categories</a></li>
            <li><a href="">Contact us</a></li>
            <li><a href="">Follow us</a></li>
        </ul>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Search">
            <label for="floatingInput"></label>
        </div>
        
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
        </div>
    </header>

    <div class="burger-menu-container">
        <div class="burger-menu">
            <svg style="margin: 20px 20px 0 0;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
    
            <h1>Menu</h1>
    
            <ul>
                <li><a href="">Categories</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">Follow us</a></li>
            </ul>
        </div>
    </div>

    <main class="row">
        <div class="col-12 col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12">
            <h3>Category</h3>

            <ul>
                <li><a href="">Item 1....</a></li>
                <li><a href="">Item 2....</a></li>
                <li><a href="">Item 3....</a></li>
                <li><a href="">Item 4....</a></li>
                <li><a href="">Item 5....</a></li>
            </ul>

            <h3>Top Products</h3>

            <ul>
                <li><a href="">Item 1....</a></li>
                <li><a href="">Item 2....</a></li>
                <li><a href="">Item 3....</a></li>
                <li><a href="">Item 4....</a></li>
                <li><a href="">Item 5....</a></li>
            </ul>
        </div>
        
        <div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-12">
            <h5>Home > Main Category > SubCategory</h5>

            <div class="row main-content">
                <div class="col col-6">
                    <div class="square"></div>

                    <div class="more-square">
                        <div class="square"></div>
                        <div class="square"></div>
                        <div class="square"></div>
                        <div class="square"></div>
                    </div>
                </div>

                <div class="col col-6" style="padding: 10px;">
                    <h2>Sample Product Title</h2>

                    <h4>Summary:</h4>

                    <p style="text-align: justify;">
                        Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip
                        ex ea
                    </p>

                    <div style="width: 100%; display: flex; flex-flow: row wrap; justify-content: center;">
                        <button class="btn" style="border: 1px solid black;">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>

            <div class="description-content">
                <h6>Description:</h6>

                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</li>
                </ul>
            </div>
        </div>
        
        <div class="col-12 col-xxl-3 col-xl-3 col-lg-3">
            <div class="ads">
                <p>160 x 600</p>
            </div>

            <div class="ads2"></div>
        </div>
    </main>

    <footer>
        <p>Footer Information....</p>

        <ul>
            <li><a href="">Link 1</a></li>
            <li><a href="">Link 2</a></li>
            <li><a href="">Link 3</a></li>
        </ul>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>