<?php

    $dsn = 'mysql:dbname=skilltest1;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES utf8');

        $sql = 'SELECT * FROM `tasks`';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $comment = array();
        while (1) {
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($rec == false){
          break;
          }
          $comment[] = $rec;

        }
        $dbh = null;

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Skill Test</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style="margin-top: 60px">

  <div class="container">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">

        <h2 class="text-center content_header"><div style="padding: 0.5em 1em;
    margin: 2em 0;
    color: rgba(255, 255, 255, 0.47);
    background: #8cd460;
    border-bottom: solid 6px color: rgba(255, 255, 255, 0.47);;
    border-radius: 9px;">タスク管理</div></h2>

        <div class="col-xs-4">
          <div style="position:fixed; padding-left: 5px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px;">
          <a href="post.php" class="add">ａｄｄ</a>
        </div>
        </div>
        <div class="col-xs-8">
          <?php foreach ($comment as $comment): ?>
          <div class="task">
            <h3><?php echo $comment['date'] ?><span> </span><a href="edit2.php?id=<?php echo $comment["id"]; ?>" class="btn btn-default btn-" style="color: lightblue">編集</a><span> </span><a href="delete2.php?id=<?php echo $comment["id"]; ?>" class="btn btn-default" style="color: lightpink">削除</a></h3>
            <div class="content">
              <h3 style="font-weight: bold;"><?php echo $comment['title']; ?></h3>
              <h4><?php echo $comment['detail']; ?></h4>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>