<?php

var_dump ($_POST);
$pdo = new PDO("mysql:dbname=issue28;host=127.0.0.1", "root");

$st = $pdo->prepare("select pref_id from prefectures where pref_name='?'");
$st->query(array($_POST['prefecture']));
var_dump ($st);

var_dump($_POST['prefecture']);
var_dump($prefid);
$st1 = $pdo->prepare("INSERT INTO users (last_name, first_name, pref_id, updated_at) VALUES (?, ?, ?, ?)");
$st1->execute(array($_POST['lastname'], $_POST['firstname'], $prefid, $updated_at));


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
