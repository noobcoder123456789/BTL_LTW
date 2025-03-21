<?php include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="list_style.css">
    <title>Danh Sách Sản Phẩm</title>
</head>
<body>    
    <header>
        <div class="row">
            <div class="col-2">
                <h1>Accessories</h1>
            </div>

            <div class="col-8">
                <ul>
                    <li><a href="">Ưu Đãi</a></li>
                    <li><a href="">Di Động</a></li>
                    <li><a href="">TV & AV</a></li>
                    <li><a href="">Gia Dụng</a></li>
                    <li><a href="">IT</a></li>
                    <li><a href="">Phụ Kiện</a></li>
                    <li><a href="">SmartThings</a></li>
                    <li><a href="">AI</a></li>
                </ul>
            </div>
            
            <div class="col-2">
                <i class="bi bi-bag-fill"></i>
                <i class="bi bi-person-fill"></i>
                <i class="bi bi-heart-fill"></i>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h1>DANH SÁCH SẢN PHẨM</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button class="btn btn-light">
                    MUA NGAY
                </button>
            </div>
        </div>
    </header>

    <main class="container" style="margin-top: 4rem;">
        <div class="row">
            <!-- <div class="col-3">
                <div class="card">
                    <img src="https://m.media-amazon.com/images/I/31UpGSJdmqL._AC_.jpg" class="card-img-top" alt="...">
                    
                    <div class="card-body">
                        <h6 class="card-title">Usb Kingston 3.0</h6>
                        <a href="" class="btn btn-primary">42000</a>
                    </div>
                </div>
            </div> -->

            <?php
                $statment = $conn->prepare("SELECT id, price, name, image FROM products");
                $statment->execute();
                $result = $statment->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($result as $row) {
                    $price = number_format($row['price'], 0, ',', '.') . 'đ';
                    $currentPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                    $directory = dirname($currentPage);

                    print "<div class=\"col-3\">
                        <div class=\"card\">
                            <img src=\"{$row['image']}\" class=\"card-img-top\" alt=\"...\">
                            
                            <div class=\"card-body\">
                                <h6 class=\"card-title\">{$row['name']}</h6>
                                <a href=\"?id={$row['id']}\" class=\"btn btn-primary\">{$price}</a>
                            </div>
                        </div>
                    </div>";
                }
            ?>
        </div>

        <div class="row detail"></div>
    </main>

    <footer>
        <div class="row">
            <div class="col-4">
                <h4>Sản Phẩm & Dịch Vụ</h4>

                <ul>
                    <li>Thiết Bị Âm Thanh</li>
                    <li>Thiết Bị Đeo</li>
                    <li>Smart Switch</li>
                    <li>Phụ Kiện</li>
                </ul>
            </div>

            <div class="col-4">
                <h4>Tài khoản & Cộng đồng</h4>

                <ul>
                    <li>Tài Khoản Của Tôi</li>
                    <li>Đơn Hàng</li>
                    <li>Danh Sách Yêu Thích</li>
                    <li>Samsung Members</li>
                </ul>
            </div>

            <div class="col-4">
                <h4>Chương trình đặc quyền</h4>

                <ul>
                    <li>Ưu đãi sinh viên</li>
                    <li>Ưu đãi Nhân viên đối tác (EPP)</li>
                    <li>Ưu đãi chính phủ</li>
                    <li>VIP Mall</li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            $(".card-body a.btn.btn-primary").click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "detail.php",
                    type: "GET",
                    data: {id: $(this).attr('href').split('=')[1]},
                    success: function(response) {
                        $(".detail").html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>