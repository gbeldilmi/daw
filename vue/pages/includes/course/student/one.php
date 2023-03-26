<?php
  $id = $_GET['id'];
  $course = get_course($id); // xml
  if (!is_followed_course($id)) { add_to_followed_courses($id); }
  ob_start(); ?>
<div>
<h1><?php echo $course->title; ?></h1>
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
    if ($ressource->attributes()->type == 'video') {
      echo '<video src="' . $ressource->attributes()->path . '"></video>';
    } else if ($ressource->attributes()->type == 'slide') {
      echo '<iframe src="' . $ressource->attributes()->path . '"></iframe>';
    }
    echo '</li>';
  } ?>
</ul>
</div>

<?php
  $content = ob_get_contents();
  ob_get_clean();