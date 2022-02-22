<?php
require_once 'db.php';
// get type name for select option
$hardware_list = [];
$hardware_list_query = mysqli_query($db, "SELECT `type_name`, `type_mask` FROM `hardware_type`");
while($hardware = mysqli_fetch_assoc($hardware_list_query)) {
    $hardware_list[$hardware[type_name]] = $hardware[type_mask];
}