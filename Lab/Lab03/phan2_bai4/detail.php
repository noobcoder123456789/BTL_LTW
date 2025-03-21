<?php 
    include("connect.php"); 
    $id = $_GET['id'];
    $statment = $conn->prepare("SELECT * FROM products WHERE id = $id");
    $statment->execute();
    $result = $statment->fetchAll(PDO::FETCH_ASSOC)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.2/color-thief.umd.js"></script>
    <link rel="stylesheet" href="detail_style.css">
    <title>Chi Tiết Sản Phẩm</title>
</head>
<body>
    <div class="row">
        <div class="col-5">
            <h1 style="font-weight: bold;">Accessories</h1>

            <img src="<?=$result['image']?>" style="width: 100%;" alt="" crossOrigin="anonymous">

            <div class="container" style="margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-3">
                        <img src="<?=$result['image']?>" alt="Góc trái" class="cropped left">
                    </div>
                    
                    <div class="col-3">
                        <img src="<?=$result['image']?>" alt="Góc giữa" class="cropped center">
                    </div>
                    
                    <div class="col-3">
                        <img src="<?=$result['image']?>" alt="Góc phải" class="cropped right">
                    </div>
                </div>
            </div>            
        </div>

        <div class="col-7">
            <div class="row">
                <div class="col-10">
                    <ul>
                        <li><a href="">Ưu Đãi</a></li>
                        <li><a href="">Di Động</a></li>
                        <li><a href="">TV & AV</a></li>
                        <li><a href="">Gia Dụng</a></li>
                        <li><a href="">SmartThings</a></li>
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
                    <h2><?=$result['name']?></h2>
                </div>

                <div class="col-12">
                    <p><?=$result['description']?></p>
                </div>

                <div class="col-12">
                    <h4><?=number_format($result['price'], 0, ',', '.') . 'VNĐ'?></h4>
                </div>

                <div class="col-12">
                    <h5>Màu Sắc</h5>
                    <span style="margin-top: 0.5rem;"></span>
                </div>

                <div class="row" style="margin-top: 2rem;">
                    <div class="col-6">
                        <button id="buy-now" class="btn" style="width: 100%; height: 4rem;">
                            MUA NGAY
                        </button>
                    </div>

                    <div class="col-6">
                        <button id="add-basket" class="btn" style="width: 100%; height: 4rem;">
                            THÊM VÀO GIỎ HÀNG
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const img = document.querySelector('img');
        img.addEventListener('load', function(){
            const colorThief = new ColorThief();
            const dominantColor = colorThief.getColor(img);
            const span = document.querySelector('span');
            span.style.backgroundColor = `rgb(${dominantColor.join(',')})`;
            span.style.display = "inline-block";
            span.style.width = "50px";
            span.style.height = "50px";
            span.style.borderRadius = "50%";
        });
    </script>
</body>
</html>