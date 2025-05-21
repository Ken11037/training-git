<?php
require_once('../Controller/Connect.php');
require_once('../Controller/AppController.php');

if(!empty($_POST['left'])){
  try{
    $sql  = '
            UPDATE sortable
            SET
              `left_x` = :LEFT,
              `top_y`  = :TOP
            WHERE
              `id` = :NUMBER
            ';

    $obj = new AppController();
    $obj->update_sortable($sql, (int)$_POST['left'], (int)$_POST['top'], (int)$_POST['id']);

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>
