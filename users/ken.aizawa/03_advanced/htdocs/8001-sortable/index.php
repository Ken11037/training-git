<?php
error_reporting(-1);
file_put_contents(__DIR__ . '/debug_all_post.txt', print_r($_POST, true));

// ローカル環境ならまずはこれを試す
define('DB_DNS', 'mysql:host=training-mysql;dbname=cri_sortable;charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

/* データベースへ接続 */
try {
  $dbh = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e){
    echo $e->getMessage();
    exit;
}

if (!empty($_POST['inputName']) && !empty($_POST['gender_id'])) {
  // genderありの登録
  try {
    $sql  = 'INSERT INTO sortable(name, gender_id) VALUES(:ONAMAE, :GENDER_ID)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':ONAMAE', $_POST['inputName'], PDO::PARAM_STR);
    $stmt->bindValue(':GENDER_ID', $_POST['gender_id'], PDO::PARAM_INT);
    $stmt->execute();
    header('location: http://localhost:8001/');
    exit();
  } catch (PDOException $e) {
    echo 'データベースにアクセスできません！'.$e->getMessage();
  }
} elseif (!empty($_POST['inputName'])) {
  // genderなしの登録（予備）
  try {
    $sql  = 'INSERT INTO sortable(name) VALUES(:ONAMAE)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':ONAMAE', $_POST['inputName'], PDO::PARAM_STR);
    $stmt->execute();
    header('location: http://localhost:8001/');
    exit();
  } catch (PDOException $e) {
    echo 'データベースにアクセスできません！'.$e->getMessage();
  }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>8001-cri-sortable</title>
  <link href="css/style.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script>
$(function(){
  $('.drag').draggable({
    containment:'#drag-area',
    cursor:'move',
    opacity:0.6,
    scroll:true,
    zIndex:10,
    /* ==========STOP処理====================================== */
    stop:function(event, ui){
      let myNum  = $(this).data('num');
      let myLeft = (ui.offset.left - $('#drag-area').offset().left);
      let myTop  = (ui.offset.top  - $('#drag-area').offset().top);
      /* ==========AJAX通信================= */
      $.ajax({
        type:'POST',
        url: 'index.php',  // 相対パスでOK
        data: {
          id  :myNum,
          left:myLeft,
          top :myTop
        }
      }).done(function(){
         console.log('成功');
      }).fail(function(XMLHttpRequest, textStatus, errorThrown){
         console.log(XMLHttpRequest.status);
         console.log(textStatus);
         console.log(errorThrown);
      });
      /* ==========/AJAX通信================= */
        console.log("左: " + myLeft);
        console.log("上: " + myTop);
    }
    /* ==========/STOP処理====================================== */
  });
});
</script>
</head>
<body>
<div id="wrapper">

<div id="input_form">
  <form action="index.php" method="POST">
    <input type="text" name="inputName" placeholder="名前を入力" required>

   <label><input type="radio" name="gender_id" value="1" required> 男性</label>
   <label><input type="radio" name="gender_id" value="2" required> 女性</label>


    <input type="submit" value="登録">
  </form>
</div>



<div id="drag-area">
 <?php
  $sql = '
  SELECT
    t1.*,
    g.gender
  FROM
    sortable AS t1
  LEFT JOIN genders AS g ON t1.gender_id = g.id
';
  $stmt = $dbh->query($sql);
  foreach ($stmt as $result){
    $genderClass = ($result['gender_id'] == 1) ? 'gender1' : (($result['gender_id'] == 2) ? 'gender2' : '');
    echo '<div class="drag '.$genderClass.'" data-num="'.$result['id'].'" style="left:'.$result['left_x'].'px; top:'.$result['top_y'].'px;">';
    echo '<p><span class="name">'.$result['id'].' '.$result['name'].' ('.$result['gender'].')</span></p>';
    echo '</div>';
}

?>

</div>


</div>
</body>
</html>