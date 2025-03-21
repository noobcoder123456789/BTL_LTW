<?php 
    include("connect.php");
    $id = $_GET['id'];
    $statment = $conn->prepare("SELECT * FROM products where id = $id");
    $statment->execute();
    $result = $statment->fetchAll(PDO::FETCH_ASSOC)[0];
?>

<h2>Thông Tin Chi Tiết</h2>

<div class="col-6">
    <img src="<?=$result['image']?>" alt="" width="100%">
</div>

<div class="col-6">
    <div class="row">
        <h2><?=$result['name']?></h2>
    </div>

    <div class="row">
        <p><?=$result['description']?></p>
    </div>

    <div class="row">
        <h3 style="font-weight: bold;"><?=number_format($result['price'], 0, ',', '.') . 'VNĐ'?></h3>
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