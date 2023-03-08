<!--
  Si l'utilisateur n'est pas connecter : rediriger vers login.php ou 404.php
  Pour un élève:
  - sans champ ID ou vide : 
  - sinon affiche la liste de ses cours suivi + un bouton pour afficher tous les cours de la plateforme
  - avec ID : affiche le cours en question
  Pour un prof:
  - Sans ID : affiche la liste des créés par le prof connecté
  - Avec ID : édition du cours en question (id) si le prof connecté en est le propriétaire
-->
<?php 
  if (!is_connected()) {
    header('Location: index.php?p=login');
  }
  $title = "Course";
  $id = $_GET['i'];
  if (isset($id) && !course_exists($id)) {
    header('Location: index.php?p=404');
  }
  $user = // get user type or idk
  
  
  
  
  
  
  ob_start(); ?>

<?php
  $content = ob_get_contents();
  ob_get_clean();
