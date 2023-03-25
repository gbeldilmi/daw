<?php
  $test = get_test($_GET['id']); // xml
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
}

if (empty($_GET['id'])) {
  header('Location: index.php?p=404');
}
ob_start();
?>

<div>
  <h1><?php echo $test['title']; ?></h1>
  <p><?php echo $test['description']; ?></p>
</div>

<form action="" method="post">
  <?php foreach ($test['questions'] as $question) { ?>
    <div>
      <h3><?php echo $question['question']; ?></h3>
      <ul>
        <?php foreach ($question['choices'] as $choice) { ?>
          <li>
            <input type="radio" name="answer-<?php echo $question['id']; ?>" id="answer-<?php echo $choice['id']; ?>" value="<?php echo $choice['id']; ?>" <?php if($choice['valid'] == 'true') { echo 'valid="true"'; } ?>>
            <label for="answer-<?php echo $choice['id']; ?>"><?php echo $choice['choice']; ?></label>
          </li>
        <?php } ?>
      </ul>
    </div>
  <?php } ?>
  <button type="submit">Soumettre</button>
</form>


<?php
  $content = ob_get_contents();
  ob_get_clean();
