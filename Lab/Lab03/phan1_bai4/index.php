<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phần 1 Bài 4</title>

    <style>
        table, td, th {
            border: 1px solid black;
            background-color: yellow;
        }

        td {
            width: 5%;
            aspect-ratio: 1 / 1;
            text-align: center;
        }

        table {
            border-collapse: collapse;            
        }
    </style>
</head>
<body>
    <table>
        <?php
            for($i = 1; $i <= 7; $i ++) {
        ?>
                <tr>
                    <?php
                        for($j = 1; $j <= 7; $j ++) {
                    ?>
                            <td><?php echo $j * $i?></td>
                    <?php
                        }
                    ?>
                </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>