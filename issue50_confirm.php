<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>issue17</title>
</head>

<body>

  <h1>フォーム > 確認</h1>
  <form action="issue50_input.php" method="POST">
    <table>
      <tr>
      <tr>
        <td>名前：<?php echo $_POST["lastname"]. $_POST["firstname"];?></td>
      </tr>
      <tr>
        <td>性別：<?php echo $_POST["gender"];?></td>
      </tr>
      <tr> 
        <td>郵便番号：<?php echo $_POST["postcode"];?>123-4567</td>
      </tr>
      <tr> 
        <td>都道府県：<?php echo $_POST["prefecture"];?></td>
      </tr>
      <tr> 
        <td>メールアドレス：<?php echo $_POST["mailaddress"];?></td>
      </tr>
      <tr> 
        <td>趣味：
        <?php 
        $hobby = $_POST["hobbys"]; 
        for ($i = 0; $i < sizeof($hobby); $i++){
            echo $hobby[$i]. " ";
        }
        ?>
        </td>
      </tr>
      <tr> 
        <td>ご意見：<?php echo $_POST["opinion"];?></td>
      </tr>
    </table>
    <input type="submit" value="戻る" onClick="location.href='issue50input.php'">
    <br>
    <input type="submit" value="送信" onClick="location.href='issue50_complete.php'">
  </form>
  <p>Copyright 2014</p>
</body>
</html>

