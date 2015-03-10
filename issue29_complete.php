<?php
  var_dump($_POST['lastname']);

  $pdo = new PDO("mysql:dbname=issue28;host=127.0.0.1", "root");
  $st = $pdo->prepare("INSERT INTO users (last_name, first_name) VALUES (?, ?)");
  $st->execute(array($_POST['lastname'], $_POST['firstname']));
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>issue17</title>
</head>

<body>
  <h1>フォーム > 完了</h1>
  <p>応募しました</p>
  <a href="index.php">TOPページへ</a>
  <p>Copyright 2014</p>
</body>
</html>
