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
          <a href="post.php" style="display: inline-block; text-decoration: none; color: rgba(255, 255, 255, 0.47); background: #8cd460; font-weight: bold;
    width: 120px;
    height: 120px;
    line-height: 120px;
    border-radius: 50%;
    text-align: center;
    vertical-align: middle;
    overflow: hidden;
    box-shadow: 0px 0px 0px 5px #8cd460;
    border: solid 2px rgba(255, 255, 255, 0.47);
    transition: .4s;">ａｄｄ</a>
        </div>
<?php foreach ($comment as $comment): ?>
        <div class="col-xs-8">
          <div class="task">
            <h3><?php echo $comment['date'] ?><span> </span><a href="edit2.php?id=<?php echo $comment["id"]; ?>" class="btn btn-default btn-" style="color: lightblue">編集</a><span> </span><a href="delete2.php?id=<?php echo $comment["id"]; ?>" class="btn btn-default" style="color: lightpink">削除</a></h3>
            <div class="content">
              <h3 style="font-weight: bold;"><?php echo $comment['title']; ?></h3>
              <h4><?php echo $comment['detail']; ?></h4>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>