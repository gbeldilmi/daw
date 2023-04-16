<?php
//$id = $_GET['i'];
$course = get_course($id); // xml
$desc = get_course_desc($id); // txt
if (!is_followed_course($id)) {
  add_to_followed_courses($id);
}
ob_start();
?>

<div>
  <h1>
    <?php echo $course->title; ?>
  </h1>
  <p>
    <?= $desc ?>
  </p>
  <h2>Prérequis :</h2>
  <ul>
    <?php foreach ($course->prerequisite as $prereq) {
      echo '<li>' . $prereq . '</li>';
    } ?>
  </ul>

  <h2>Ressources :</h2>
  <ul>
    <?php foreach ($course->ressource as $ressource) {
      echo '<li>';
      $path = $ressource['path'];
      $type = $ressource['type'];
      $res = $path;
      echo '<button onclick="loadres(' . $path . ',' . $type . ')">' . $res . '</button>';
      echo '</li>';
    } ?>
  </ul>
</div>

<div id="modal"></div>

<script src="vue\assets\js\loadres.js"></script>

<?php
$content = ob_get_contents();
ob_get_clean();
