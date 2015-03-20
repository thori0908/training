<?php
// connect database
try {
  $pdo = new PDO("mysql:dbname=issue28;host=127.0.0.1;charset=utf8", "root");
  $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

// register users data
try {
  $st = $pdo->prepare ("select pref_id from prefectures where pref_name=?");
  $st->execute (array($_POST['prefecture']));
  $prefid = $st->fetch(PDO::FETCH_ASSOC);

  $st1 = $pdo->prepare("INSERT INTO users (last_name, first_name, pref_id, email) VALUES (?, ?, ?, ?)");
  $st1->execute (array($_POST['lastname'], $_POST['firstname'], $prefid["pref_id"], $_POST['mailaddress']));
} catch (PDOException $e) {
  echo 'Connection failed2: ' . $e->getMessage();
}

// disconnect database
$pdo = null;

include 'issue30_complete.html.php';
?>
