<?php
$test = get_test($_GET['id']); // récupérer le test depuis la base de données
$course = get_course($test['course_id']); // récupérer le cours associé au test
$user = get_user($_SESSION['user_id']); // récupérer l'utilisateur connecté
ob_start();
?>

<h1> Edition du test </h1>

<form action="/../test.php" method="post">
  <input type="hidden" name="test_id" value="<?= $test['id'] ?>">
  <?php 
    foreach ($test['questions'] as $question) {
      echo '<div>';
      echo '<p>' . $question['question'] . '</p>';
      echo '<ul>';
      foreach ($question['choices'] as $choice) {
        echo '<li>';
        echo '<input type="checkbox" name="answer-' . $question['id'] . '" id="answer-' . $choice['id'] . '" value="' . $choice['id'] . '">';
        echo '<label for="answer-' . $choice['id'] . '">' . $choice['choice']. '</label>';
        echo '</li>';
      }
      echo '</ul>';
      echo '</div>';
    }
  ?>
  <button type="submit">Enregistrer</button>
</form>


<?php
  $content = ob_get_contents();
  ob_get_clean();
