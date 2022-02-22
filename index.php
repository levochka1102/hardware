<?php
    require_once 'db.php';
    require_once 'getHardwareList.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/modal.css"> 
    <title>Phone Book</title>
</head>
<body>
    <form method="post" action="create.php">
        <textarea name="serial_number"></textarea>
        <select name="type_name">
            <?php
            foreach ($hardware_list as $type_name => $type_mask) {
            ?>
            <option><?= $type_name ?></option>
            <?php
            }
            ?>
        </select>

        <button type="submit" class="add">Добавить</button>
    </form>
</body>
</html>