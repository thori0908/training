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
        <td>名前：<?php echo $user->getFullname(); ?>
          <input type="hidden" name="lastname" value="<?php echo $user_array["lastname"]; ?>">
          <input type="hidden" name="firstname" value="<?php echo $user_array["firstname"]; ?>">
        </td>
      </tr>
      <tr>
        <td>性別：<?php echo $user_array["gender"]; ?>
          <input type="hidden" name="gender" value="<?php echo $user_array["gender"]; ?>">
      </tr>
      <tr> 
        <td>郵便番号：<?php echo $user_array["postcodeFirst"] . "-" . $user_array["postcodeSecond"]; ?>
          <input type="hidden" name="postcodeFirst" value="<?php echo $user_array["postcodeFirst"]; ?>">
          <input type="hidden" name="postcodeSecond" value="<?php echo $user_array["postcodeSecond"]; ?>">
        </td>
      </tr>
      <tr> 
        <td>都道府県：<?php echo $user_array["prefecture"]; ?></td>
          <input type="hidden" name="prefecture" value="<?php echo $user_array["prefecture"]; ?>">
        </td>
      </tr>
      <tr> 
        <td>メールアドレス：<?php echo $user_array["mailaddress"]; ?></td>
          <input type="hidden" name="mailaddress" value="<?php echo $user_array["mailaddress"]; ?>">
        </td>
      </tr>
      <tr> 
        <td>趣味：
          <?php echo $user_array["hobbyMusic"] . ' ' . $user_array["hobbyMovie"] . ' ' . $user_array["hobbyOther"] . ' ' . $user_array["hobbyOtherText"]; ?>
        </td>
      </tr>
      <tr> 
        <td>ご意見：<?php echo $user_array["opinion"]; ?></td>
      </tr>
    </table>
    <input name="return"  type="submit" value="戻る" formaction="issue50_input.php">
    <br>
  </form>
  <form action="issue29_complete.php" method="POST">
    <input type="hidden" name="lastname" value="<?php echo $user_array["lastname"]; ?>">
    <input type="hidden" name="firstname" value="<?php echo $user_array["firstname"]; ?>">
    <input type="hidden" name="mailaddress" value="<?php echo $user_array["mailaddress"]; ?>">
    <input type="hidden" name="prefecture" value="<?php echo $user_array["prefecture"]; ?>">
    <input type="submit" value="送信" formaction="issue29_complete.php">
  </form>
  <p>Copyright 2014</p>
</body>
</html>
