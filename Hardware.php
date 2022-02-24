<?php
require_once 'DataBase.php';

class Hardware extends DataBase
{
    static protected $hardware;

    private static function buildHardwareList() {
        $query = 'SELECT * FROM `hardware_type`';
        $statement = self::connect()->query($query);
        while($hardware = mysqli_fetch_assoc($statement)) {
            self::$hardware[$hardware['type_name']] = array(
                'mask' => $hardware['type_mask'],
                'id'   => $hardware['id']
            );
        }
    }

    public static function getHardwareList()
    {
        if(is_null(self::$hardware)) {
            self::buildHardwareList();
        }
        return self::$hardware;
    }
}