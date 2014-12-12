<?php 
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>issue17</title>
</head>

<body>
  <h1>フォーム > TOPページ</h1>
  <a href="issue50_input.php">フォームを入力する</a>
  <p>Copyright 2014</p>
</body>
</html>
