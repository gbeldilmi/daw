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
    echo '<button onclick="deletequestion(' . $qcount . ')">Supprimer</button>';
    echo '<textarea id="q' . $qcount . 'qt" name="q' . $qcount . 'qt" >' . $question->text . '</textarea><ul>';
    $acount = 1;
    foreach ($question->answer as $answer) {
      echo '<li><label><input id="q' . $qcount . 'a' . $acount . 'v" name="q' . $qcount . 'a' . $acount . 'v" type="checkbox" ';
      if ($answer['valid'] == 'true') {
        echo 'checked';
      }
      echo ' ><input id="q' . $qcount . 'a' . $acount . 'v" name="q' . $qcount . 'a' . $acount . 't" type="text" value="' . $answer->text . '"></label></li>';
      $acount = $acount + 1;
    }
    echo '</ul><p class="ans"></p></div>';
    $qcount = $qcount + 1;
  }
  ?>
  </div>
  <button onclick="addquestion()">Ajouter une question</button>
  <input type="submit" value="Enregistrer">
</form>

<?= '<script src="vue/assets/js/edittest.js" onload="inittest(' . $qcount . ')"></script>' ?>

<?php
$content = ob_get_contents();
ob_get_clean();
