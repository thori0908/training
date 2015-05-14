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
  <header>
    <h1>フォーム > TOPページ</h1>
  </header>
  <section>
    <a href="issue50_input.php">フォームを入力する</a>
  </section>
  <footer>
    <p>Copyright 2014</p>
  </footer>
</body>
</html>
