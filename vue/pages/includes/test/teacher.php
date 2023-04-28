<?php
$test = get_test_xml($id); // récupérer le test depuis la base de données
ob_start();
?>

<h1> Edition du test </h1>

<form action="controller/courses/update_test.php" method="post">
  <input type="hidden" name="test_id" value="<?= $id ?>">
  <div id="question-container">
  <?php
  $qcount = 1;
  foreach ($test->question as $question) {
    echo '<div class="question" id="q' . $qcount . '">';
    echo '<button onclick="delete_question(' . $qcount . ')">Supprimer</button>';
    echo '<p>' . $qcount . '. ' . $question->text . '</p>';
    echo '<ul>';
    foreach ($question->answer as $answer) {
      echo '<li><label><input type="checkbox" ';
      if ($answer['valid'] == 'true') {
        echo 'class="ansv"';
      } else {
        echo 'class="ansf"';
      }
      echo '>' . $answer->text . '</label></li>';
    }
    echo '</ul><p class="ans"></p></div>';
    $qcount = $qcount + 1;
  }
  ?>
  </div>
  <button onclick="add_question()">Ajouter une question</button>
  <input type="submit" value="Enregistrer">
</form>

<?= '<script src="vue/assets/js/edittest.js" onload="inittest(' . $qcount . ')"></script>' ?>

<?php
$content = ob_get_contents();
ob_get_clean();
