<?php
  $id = $_GET['i'];
  $course = get_course($id); // data
  $course_xml = get_course_xml($id); // xml
  ob_start(); ?>

<!-- 
  modifier un course
-->

<form method="post" action="">
<p>Toute modification apportée  sera appliquée à l'ensemble de votre cours. </p>
<label for="title">Titre Cours:</label>
        <?= '<input type="text" id="title" name="title" value="' . $course['NAME'] . '">' ?>
<label for="author_id">Auteur:</label>
        <?= '<input type="text" id="author_id" name="author_id" value="' . $course['AUTHOR_ID'] . '">' ?>
<label for="description">Description:</label>
        <?= '<input type="text" id="description" name="description" value="' . $course['DESCRIPTION'] . '">' ?>
<label for="title">Titre Cours:</label>
        <?= '<input type="text" id="title" name="title" value="' . $course['NIVEAU'] . '">' ?> 

<h3> Ressource du cours </h3> 

<?php
     $rcount=1;
     foreach($course_xml->ressource as $ressource){
                echo '<div class="ressource" id="r' . $rcount .'>';
                echo '<p> ressource N°' . $rcount . '. ' . $ressource . '</p>'; 
                echo'<input type="text" placeholder="Modifier ici cette ressource">';
                echo '<button onclick="delete_ressource(' . $rcount . ')">Supprimer </button>';
                echo '<button onclick="update_ressource(' . $rcount . ')">Modifier </button>';              
}
?> 

<h3> Prérequis </h3>

<?php
     $pcount=1;
     foreach($course_xml->prerequis as $prerequis){
                echo '<div class="prerequis" id="p' . $pcount .'>';
                echo '<p> prérequis N°' . $pcount . '. ' . $prerequis . '</p>'; 
                echo'<input type="text" placeholder="Modifier ici le prérequis">';
                echo '<button onclick="delete_prerequis(' . $pcount . ')">Supprimer </button>';
                echo '<button onclick="update_prerequis(' . $pcount . ')">Modifier </button>';              
}
?> 

<input type="submit" value="Enregistrer les modifications">



</form>

<h3> Associé ici une nouvelle ressouce a votre cours </h3>

<from method="post" action="">
<label for="path">Ajouter le chemin vers la ressource:</label>
<input type="file" name="new_ressource">
<label for="type">Type :</label>
      <select id="type" name="type">
        <option value="video">Vidéo</option>
        <option value="slide">Diaporama</option>
      </select>
      <input type="submit" value="Ajouter">
</form>

<h3> Associé  ici un nouveau prérequis a ce cours </h3>

<from method="post action=">
<label for="desc_prerequis">Ajouter :</label>
<input type="text" name="new_prerequis">
<input type="submit" value="Ajouter">
</form>



<?php
  $content = ob_get_contents();
  ob_get_clean();
  
// wissam et feriel
