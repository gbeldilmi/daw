<?php
  $couses = get_followed_courses(); // array of courses
  ob_start();
 ?>
<?php foreach ($couses as $course) {
    echo "<div><h2>" . $course['NAME'] . "</h2>";
    echo "<p>" . $course['DESCRIPTION'] . "</p>";
    echo "<a href='course.php?id=" . $course['id'] . "'>Accéder au cours</a></div>";
} ?>

<?php
  $content = ob_get_contents();
  ob_get_clean();