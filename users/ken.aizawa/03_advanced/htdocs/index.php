<?php
require_once('./config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['inputName'] ?? '';
    $gender_id = $_POST['inputGender'] ?? 1;

    if ($name !== '') {
        $sql = "INSERT INTO sortable (name, gender_id, left_x, top_y) VALUES (:name, :gender_id, 0, 0)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':gender_id', $gender_id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Sortable_Comp</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
  <script src="js/sort.js"></script>
    <link href="css/style.css" rel="stylesheet">  <!-- CSS 読み込み -->
</head>
<body>
<div id="wrapper">
  <div id="input_form">
    <form action="" method="POST">
      <input type="text" name="inputName" placeholder="新メンバー名を入力" required>
      <?php
        $sql    = 'SELECT * FROM genders';
        $stmt   = $dbh->query($sql);
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
      LEFT JOIN genders ON t1.gender_id = genders.id
    ';
    $stmt = $dbh->query($sql);
    foreach ($stmt as $result){
      echo '<div class="drag gender'.$result['gender_id'].'" data-num="'.$result['id'].'" style="left:'.$result['left_x'].'px; top:'.$result['top_y'].'px;">'.PHP_EOL;
      echo '<p><span class="name">'.$result['id'].' '.$result['name'].' ('.$result['gender'].')</span></p>'.PHP_EOL;
      echo '</div>'.PHP_EOL;
    }
  ?>
  </div>
</div>
</body>
</html>
