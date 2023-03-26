<?php
  ob_start(); ?>


<div>
  <button id="show-courses"><a href="index.php?p=course">Afficher mes cours</a></button>
  <button id="create-course">Créer un nouveau cours</button>
</div>

<script>
  const modal = document.getElementById("modal");
  const createCourseButton = document.getElementById("create-course");

  createCourseButton.addEventListener("click", () => {
    modal.style.display = "block";
  });

  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
</script>

<div id="modal" style="display: none;">
<form action="" method="post">
  <h1>Créer un nouveau cours</h1>
  <label for="course-name">Nom du cours :</label>
  <input type="text" name="course-name" id="course-name" required placeholder="Nom du cours">
  <label for="course-desc">Description du cours :</label>
  <textarea name="course-desc" id="course-desc" rows="3" maxlength="65535" placeholder="Description du cours"></textarea>
</form>
</div>

<?php
  $content = ob_get_contents();
  ob_get_clean();
