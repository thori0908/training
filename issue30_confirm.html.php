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
        <td>名前：<?php echo $formValues["lastname"] . $formValues["firstname"]; ?></td>
          <input type="hidden" name="lastname" value="<?php echo $formValues["lastname"]; ?>">
          <input type="hidden" name="firstname" value="<?php echo $formValues["firstname"]; ?>">
      </tr>
      <tr>
        <td>性別：<?php echo $formValues["gender"]; ?></td>
          <input type="hidden" name="gender" value="<?php echo $formValues["gender"]; ?>">
      </tr>
      <tr> 
        <td>郵便番号：<?php echo $formValues["postcodeFirst"] . "-" . $formValues["postcodeSecond"]; ?></td>
          <input type="hidden" name="postcodeFirst" value="<?php echo $formValues["postcodeFirst"]; ?>">
          <input type="hidden" name="postcodeSecond" value="<?php echo $formValues["postcodeSecond"]; ?>">
      </tr>
      <tr> 
        <td>都道府県：<?php echo $formValues["prefecture"]; ?></td>
          <input type="hidden" name="prefecture" value="<?php echo $formValues["prefecture"]; ?>">
      </tr>
      <tr> 
        <td>メールアドレス：<?php echo $formValues["mailaddress"]; ?></td>
          <input type="hidden" name="mailaddress" value="<?php echo $formValues["mailaddress"]; ?>">
      </tr>
      <tr> 
        <td>趣味：
        <?php echo $formValues["hobbyMusic"] . ' ' . $formValues["hobbyMovie"] . ' ' . $formValues["hobbyOther"] . ' ' . $formValues["hobbyOtherText"]; ?>

        </td>
      </tr>
      <tr> 
        <td>ご意見：<?php echo nl2br($formValues["opinion"]); ?></td>
      </tr>
    </table>
    <input name="return"  type="submit" value="戻る" formaction="issue50_input.php">
    <br>
  </form>
  <form action="issue29_complete.php" method="POST">
    <input type="hidden" name="lastname" value="<?php echo $formValues["lastname"]; ?>">
    <input type="hidden" name="firstname" value="<?php echo $formValues["firstname"]; ?>">
    <input type="hidden" name="mailaddress" value="<?php echo $formValues["mailaddress"]; ?>">
    <input type="hidden" name="prefecture" value="<?php echo $formValues["prefecture"]; ?>">
    <input type="submit" value="送信" formaction="issue29_complete.php">
  </form>
  <p>Copyright 2014</p>
</body>
</html>
