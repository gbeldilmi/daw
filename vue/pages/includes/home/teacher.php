<?php
ob_start(); ?>


<div>
  <a href="index.php?p=course"><button id="show-courses">Afficher mes cours</button></a>
  <button id="create-course">Créer un nouveau cours</button>
</div>

<div id="modal">
  <form action="create_course.php" method="post">
    <h1>Créer un nouveau cours</h1>
    <label for="course-name">Nom du cours :</label>
    <input type="text" name="course-name" id="course-name" required placeholder="Nom du cours">
    <label for="course-desc">Description du cours :</label>
    <textarea name="course-desc" id="course-desc" rows="3" maxlength="65535"
      placeholder="Description du cours"></textarea>
    <input type="submit" value="Créer">
  </form>
</div>

<script src="vue/assets/js/createcoursemodal.js"></script>

<?php
$content = ob_get_contents();
ob_get_clean();
// done

