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
          <input type="hidden" name="lastname" value="<?php echo $user->getLastname(); ?>">
          <input type="hidden" name="firstname" value="<?php echo $user->getFirstname(); ?>">
        </td>
      </tr>
      <tr>
        <td>性別：<?php echo $user->getGender(); ?>
          <input type="hidden" name="gender" value="<?php echo $user->getGender(); ?>">
      </tr>
      <tr> 
        <td>郵便番号：<?php echo $user->getPostcodeFirst() . "-" . $user->getPostcodeSecond(); ?>
          <input type="hidden" name="postcodeFirst" value="<?php echo $user->getPostcodeFirst(); ?>">
          <input type="hidden" name="postcodeSecond" value="<?php echo $user->getPostcodeSecond(); ?>">
        </td>
      </tr>
      <tr> 
        <td>都道府県：<?php echo $user->getPrefecture(); ?></td>
          <input type="hidden" name="prefecture" value="<?php echo $user->getPrefecture(); ?>">
        </td>
      </tr>
      <tr> 
        <td>メールアドレス：<?php echo $user->getMailaddress(); ?></td>
          <input type="hidden" name="mailaddress" value="<?php echo $user->getMailaddress(); ?>">
        </td>
      </tr>
      <tr> 
        <td>趣味：
          <?php echo $user->getHobbyMusic() . ' ' . $user->getHobbyMovie() . ' ' . $user->getHobbyOther() . ' ' . $user->getHobbyOtherText(); ?>
        </td>
      </tr>
      <tr> 
        <td>ご意見：<?php echo $user->getOpinion(); ?></td>
      </tr>
    </table>
    <input name="return"  type="submit" value="戻る" formaction="issue50_input.php">
    <br>
  </form>
  <form action="issue29_complete.php" method="POST">
    <input type="hidden" name="lastname" value="<?php echo $user->getLastname(); ?>">
    <input type="hidden" name="firstname" value="<?php echo $user->getFirstname(); ?>">
    <input type="hidden" name="mailaddress" value="<?php echo $user->getMailaddress(); ?>">
    <input type="hidden" name="prefecture" value="<?php echo $user->getPrefecture(); ?>">
    <input type="submit" value="送信" formaction="issue29_complete.php">
  </form>
  <p>Copyright 2014</p>
</body>
</html>
