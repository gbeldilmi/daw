<!--
  Si l'utilisateur n'est pas connecter : rediriger vers login.php ou 404.php
Pour un élève:
  - sans champ ID ou vide : ==> 404
  - avec ID : affiche le test en question
Pour un prof:
  - Sans ID : ==> 404
  - Avec ID : édition du qcm en question (id) si le prof connecté est le propriétaire du cours

-->
<?php
  if (!is_connected()) {
    header('Location: index.php?p=login');
  }
  $title = "Test";
  $id = $_GET['i'];
  if (isset($id) && !test_exists($id)) {
    header('Location: index.php?p=404');
  }
  ob_start(); ?>

<?php
  $content = ob_get_contents();
  ob_get_clean();
