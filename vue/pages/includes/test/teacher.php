<?php
$test = get_test($_GET['id']); // récupérer le test depuis la base de données
  $course = get_course($test['course_id']); // récupérer le cours associé au test
  $user = get_user($_SESSION['user_id']); // récupérer l'utilisateur connecté

  // Vérifier si l'utilisateur connecté est le propriétaire du cours
  if ($course['owner_id'] !== $user['id']) {
    header("Location: login.php");
  }
  ob_start(); ?>

 <h2> Edition du test </h2>

<form action="" method="post">
  <?php foreach ($test['questions'] as $question) { ?>
    <div>
      <h3><?php echo $question['question']; ?></h3>
      <ul>
        <?php foreach ($question['choices'] as $choice) { ?>
          <li>
            <input type="radio" name="answer-<?php echo $question['id']; ?>" id="answer-<?php echo $choice['id']; ?>" value="<?php echo $choice['id']; ?>">
            <label for="answer-<?php echo $choice['id']; ?>"><?php echo $choice['choice']; ?></label>
          </li>
        <?php } ?>
      </ul>
    </div>
  <?php } ?>
  <button type="submit">Enregistrer</button>
</form>


<?php
  $content = ob_get_contents();
  ob_get_clean();
