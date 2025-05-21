<?php
/* データベースに接続するクラス */
class Connect
{
  const DB_NAME = 'cri_sortable';
  const UTF     = 'utf8';
  const USER    = 'root';
  const PASS    = 'root';

  public function pdo(){
    // 1. 環境変数 DB_HOST_NAME を取得。もしなければ MySQLコンテナのサービス名 'training-mysql' にする
    $host = getenv('DB_HOST_NAME');
    if (!$host) {
        $host = 'training-mysql';  // docker-composeのdbサービス名
    }

    // 2. DSN文字列を修正（self::HOST は使わず、$hostを使う）
    $dsn = "mysql:dbname=" . self::DB_NAME . ";host=" . $host . ";charset=" . self::UTF;

    $user = self::USER;
    $pass = self::PASS;

    try {
        $pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . self::UTF));
    } catch (Exception $e) {
        echo 'エラー ' . $e->getMessage();
        die();
    }
    return $pdo;
  }
}


/* SELECT文のときに使用するクラス */
class SelectData extends Connect
{
  public function select($sql)
  {
    $items = $this->pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $items;
  }
}
?>
