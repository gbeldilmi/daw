<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/controller/courses/get_courses.php";
  $courses = get_all_courses(); // array of courses
  ob_start();
  ?>

<style>

.course-card {
  background-color:rgb(242, 242, 242);
  border: 1px solid #dddddd;
  border-radius: 5px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
  padding: 20px;
}

.course-card h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.course-card p {
  font-size: 16px;
  margin-bottom: 20px;
}

.course-card a {
  background-color: rgb(251, 133, 13);
  border: none;
  border-radius: 5px;
  color: white;
  display: inline-block;
  font-size: 16px;
  padding: 10px 20px;
  text-decoration: none;
}

.course-card a:hover {
  background-color: black;
  color: white;
}
body {
  background-color: rgb(242, 242, 242);
  font-family: Arial, sans-serif;
}

h1 {
  font-size: 28px;
  font-weight: bold;
  margin-top: 40px;
}

h2 {
  font-size: 24px;
  font-weight: bold;
  margin-top: 30px;
}

p {
  font-size: 16px;
  line-height: 1.5;
  margin-bottom: 20px;
}

a {

  color: orange;

  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

</style>

<?php
  if (empty($courses)) {
    echo '<h1>Vous n\'avez pas encore créé de cours.</h1>';
  } else {
    echo '<h1>Cours créés :</h1>';
  }
  foreach ($courses as $course) {
    echo '<div class="course-card"><h2>' . $course['NAME'] . '</h2>';
    echo '<p>' . $course['DESCRIPTION'] . '</p>';
    echo '<a href=http://localhost/vue/index.php?p=courseOneT&id=' . $course['ID'] . '>Voir le cours</a> </div>';
  } ?>

<?php
  $content = ob_get_contents();
  ob_get_clean();
// done
