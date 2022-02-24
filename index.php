<?php
    require_once 'Hardware.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardware</title>
</head>
<body>
    <form method="post" action="control.php">
        <textarea name="serial_number"></textarea>
        <select class="select"name="type_name"></select>

        <button type="submit" class="add">Добавить</button>
    </form>

    <script>

        <?php
        foreach (Hardware::getHardwareList() as $key => $value) {
        ?>
        var select = document.querySelector('select');
        var option = document.createElement('option');
        option.textContent = '<?= $key ?>';
        select.appendChild(option);
        <?php
        }
        ?>

    </script>
</body>
</html>