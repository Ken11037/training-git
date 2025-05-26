<?php
error_reporting(-1);

define('DB_DNS', 'mysql:host=mysql; dbname=cri_sortable; charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

// データベース接続
try {
  $dbh = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e){
    echo "データベース接続失敗: " . $e->getMessage();
    exit;
}

// 新規登録（重複INSERTしないように修正済）
if (!empty($_POST['inputName'])) {
  try {
    $randX = rand(50, 400);
    $randY = rand(50, 300);
    $sql = 'INSERT INTO sortable(name, gender_id, left_x, top_y)
            VALUES(:ONAMAE, :GENDER, :X, :Y)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':ONAMAE', $_POST['inputName'], PDO::PARAM_STR);
    $stmt->bindValue(':GENDER', $_POST['inputGender'], PDO::PARAM_INT);
    $stmt->bindValue(':X', $randX, PDO::PARAM_INT);
    $stmt->bindValue(':Y', $randY, PDO::PARAM_INT);
    $stmt->execute();

    // 二重投稿防止
    header('Location: index.php');
    exit;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

// 座標更新処理
if (!empty($_POST['left'])) {
  try {
    $sql = 'UPDATE `sortable` SET `left_x` = :LEFT, `top_y` = :TOP WHERE `id` = :NUMBER';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':LEFT', $_POST['left'], PDO::PARAM_INT);
    $stmt->bindValue(':TOP', $_POST['top'], PDO::PARAM_INT);
    $stmt->bindValue(':NUMBER', $_POST['id'], PDO::PARAM_INT);
    $stmt->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
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
      stop:function(event, ui){
        let myNum  = $(this).data('num');
        let myLeft = (ui.offset.left - $('#drag-area').offset().left);
        let myTop  = (ui.offset.top  - $('#drag-area').offset().top);
        $.ajax({
          type:'POST',
          url :'http://localhost:8001/',
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
      }
    });
  });
  </script>
</head>
<body>
<div id="wrapper">
  <div id="input_form">
    <form action="index.php" method="POST">
      <input type="text" name="inputName" placeholder="新メンバー名を入力" required>
      <?php
        $sql = 'SELECT * FROM genders';
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $val) {
          $checked = ($val['id'] == 1) ? ' checked="checked"' : '';
          echo '<input type="radio" name="inputGender" value="'.$val['id'].'"' . $checked . '>'.$val['gender'].PHP_EOL;
        }
      ?>
      <input type="submit" value="登録">
    </form>
  </div>

  <div id="drag-area">
    <?php
    $sql = '
      SELECT
        t1.*,
        genders.gender
      FROM
        sortable AS t1
      LEFT JOIN `genders` ON t1.gender_id = genders.id
    ';
    $stmt = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $result){
      echo '<div class="drag gender'.$result['gender_id'].'" data-num="'.$result['id'].'" style="left:'.$result['left_x'].'px; top:'.$result['top_y'].'px;">'.PHP_EOL;
      echo '  <p><span class="name">'.$result['id'].' '.$result['name'].' ('.$result['gender'].')</span></p>'.PHP_EOL;
      echo '</div>'.PHP_EOL;
    }
    ?>
  </div>
</div>
</body>
</html>
