<?php

define('BASE_URL',          'http://03_t3_wd21201_web2041.test/');
define('BASE_URL_ADMIN',      'http://03_t3_wd21201_web2041.test/?mode=admin');

define('PATH_ROOT',         __DIR__ . '/../');

define('PATH_VIEW_ADMIN',         PATH_ROOT . 'views/admin/');
define('PATH_VIEW_CLIENT',         PATH_ROOT . 'views/client/');

define('PATH_VIEW_MAIN_ADMIN',    PATH_ROOT . 'views/admin/main.php');
define('PATH_VIEW_MAIN_CLIENT',    PATH_ROOT . 'views/client/main.php');

define('BASE_ASSETS_UPLOADS',   BASE_URL . 'assets/uploads/');
define('BASE_ASSETS_UPLOADS_PRODUCTS',   PATH_ROOT . 'assets/uploads/products/');

define('PATH_ASSETS_UPLOADS',   PATH_ROOT . 'assets/uploads/');

define('PATH_CONTROLLER_ADMIN',       PATH_ROOT . 'controllers/admin/');
define('PATH_CONTROLLER_CLIENT',       PATH_ROOT . 'controllers/client/');

define('PATH_MODEL',            PATH_ROOT . 'models/');

define('DB_HOST',     'localhost');
define('DB_PORT',     '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME',     'thuyvtph12345_wd21201');
define('DB_OPTIONS', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
