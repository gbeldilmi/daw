<?php
  $couses = get_followed_courses(); // array of courses
  ob_start(); ?>

<?php
  foreach ($couses as $course) {
    echo '<div class="course-card"><h2>' . $course['NAME'] . '</h2>';
    echo '<p>' . $course['DESCRIPTION'] . '</p>';
    echo '<a href="index.php?p=course&id=' . $course['id'] . '">Accéder au cours</a> </div>';
  } ?>

<?php
  $content = ob_get_contents();
  ob_get_clean();