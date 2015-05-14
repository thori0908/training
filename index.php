<?php 
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="Content-Style-Type" content="text/css">
  <title>issue17</title>
</head>

<body>
  <header>
    <h1 style="font-size:30px; margin-top:10px; margin-bottom:10px;">フォーム > TOPページ</h1>
  </header>
  <section>
    <a href="issue50_input.php">フォームを入力する</a>
  </section>
  <footer>
    <p>Copyright 2014</p>
  </footer>
</body>
</html>
