<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phần 1 Bài 3</title>
</head>
<body>
    <p>
        These are all odd number from 1 to 100 using for loop: <br>
        <span>
            <?php
                for($i = 1; $i <= 100; $i++){
                    if($i % 2 != 0){
            ?>                        
            <?php
                        echo $i . " ";
                    }
                }
            ?>
        </span>
    </p>

    <p>
        These are all odd number from 1 to 100 using while loop: <br>
        <span>
            <?php
                $i = 1;
                while($i <= 100) {
                    if($i % 2 != 0){
            ?>                        
            <?php
                        echo $i . " ";
                    } $i++;
                }
            ?>
        </span>
    </p>
</body>
</html>