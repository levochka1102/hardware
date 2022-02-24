<?php

class DataBase
{
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'hardware';
    private static $db;

    protected static function connect() {
        try{
            if(is_null(self::$db)) {
                self::$db = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
            }
        } catch(Exception $exception) {
            echo $exception->getMessage();
        }
        return self::$db;
    }
}