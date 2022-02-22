<?php
    require_once 'getHardwareList.php';
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
    <form method="post" action="create.php">
        <textarea name="serial_number"></textarea>
        <select class="select"name="type_name"></select>

        <button type="submit" class="add">Добавить</button>
    </form>

    <script>
        <?php
        foreach ($hardware_list as $type_name => $type_mask) {
        ?>
        var select = document.querySelector('select');
        var option = document.createElement('option');
        option.textContent = '<?= $type_name ?>';
        select.appendChild(option);
        <?php
        }
        ?>
    </script>
</body>
</html>