<?php
const DB_HOST = 'env-php-db-host';
const DB_PORT = 3306;
const DB_DATABASE = 'php_db';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';
const DB_CHARSET = 'utf8mb4';

$dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE . ';charset=' . DB_CHARSET;
$dbh = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

echo 'DB接続成功';
// PHP の設定情報を出力
phpinfo();
