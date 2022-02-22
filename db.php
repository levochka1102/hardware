<?php
// DB connection
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'hardware';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($db->connect_errno) exit('Ошибка подключения к БД');
