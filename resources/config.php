<?php

define('DEV', true);
define('ROOT_FOLDER', '/public');
define('DOC_ROOT', '/task/');
// DB Settings
$type = 'mysql';
$host = '192.168.1.124';
$port = 3306;
$db_user = 'root';
$db_pass = 'Lagiacrus7!';
$schema = 'Tasks';
$charset = 'utf8mb4';
$dsn = "$type:host=$host;dbname=$schema;port=$port;charset=$charset";

// File uploading
define('MEDIA_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
define('FILE_EXTENTIONS', ['jpeg', 'jpg', 'png', 'gif']);
define('MAX_SIZE', '5242880');
define('UPLOADS', dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . ROOT_FOLDER . DIRECTORY_SEPARATOR . 'uploads'
    . DIRECTORY_SEPARATOR);