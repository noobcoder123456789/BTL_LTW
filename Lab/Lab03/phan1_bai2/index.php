<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phần 1 Bài 2</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" id="txtNumber" name="txtNumber" value="0">
        <input type="submit" value="Submit">
    </form>

    <p id="result">
        <?php
            function process($x) {
                $temp = $x % 5;
                
                switch ($temp) {
                    case 0:
                        return "Hello";
                        break;

                    case 1:
                        return "How are you?";
                        break;

                    case 2:
                        return "I'm doing well, thank you";
                        break;

                    case 3:
                        return "See you later";
                        break;

                    default:
                        return "Good bye!";
                        break;
                }
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $number = isset($_POST["txtNumber"]) ? $_POST["txtNumber"] : 0;
                print process($number);
            }
        ?>
    </p>
</body>
</html>