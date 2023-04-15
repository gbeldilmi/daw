<?php
  $courses = get_followed_courses(); // array of courses
  ob_start(); ?>

<?php
  if (empty($courses)) {
    echo '<h1>Vous ne suivez aucun cours.</h1>';
  } else {
    echo '<h1>Cours suivis :</h1>';
  }
  foreach ($courses as $course) {
    echo '<div class="course-card"><h2>' . $course['NAME'] . '</h2>';
    echo '<p>' . $course['DESCRIPTION'] . '</p>';
    echo '<a href="index.php?p=course&id=' . $course['ID'] . '">Accéder au cours</a> </div>';
  } ?>

<?php
  $content = ob_get_contents();
  ob_get_clean();
// done
