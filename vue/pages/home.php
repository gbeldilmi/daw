<!--
si utilisateur inconnu:
- Description fictive du site (marketing fictif)
si prof: 
- Bouton Affichage de ses cours
- Bouton Créer un nouveau cours ==> modal
si élève:
- bouton affichage de ses cours
- bouton affichage de tous les cours
-->
<?php 
  $title = "Home";
  ob_start(); ?>

<?php
  $content = ob_get_contents();
  ob_get_clean();
