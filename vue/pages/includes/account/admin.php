<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/controller/user/get_users.php";
  $users = get_users(); // array ofusers
  ob_start(); ?>

<!--barre de rechercher avec options pour filtrer les utilisateurs par nom,
prénom,niveau,role,username ou par date de création -->

<form id="search-form">
  <input type="text" id="search-input">
  <select id="filter-select">
    <option value="all">Tous</option>
    <option value="lastname">Nom</option>
    <option value="firstname">Prénom</option>
    <option value="niveau">Niveau</option>
    <option value="role">Rôle</option>
    <option value="username">Username</option>
    <option value="created_at">Date de création</option>
  </select>
  <button type="submit">Rechercher</button>
  <button type="button" id="reset-button">Réinitialiser</button>
</form>


<h1>Listes des utilisateurs</h1>

<table id="user-table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Email</th>
      <th>Niveau</th>
      <th>Username</th>
      <th>Role</th>
      <th>Créé le</th>
    </tr>
  </thead>

<?php
  foreach ($users as $user) {
?>

<!--tableau qui va contenir la liste des utilisateurs afin de pouvoir sélection avec du js une ligne-->
   <tr id="user-<?= $user['ID'] ?>"  onclick="selectUser(<?= $user['ID'] ?>)">
        <td><?= $user['LASTNAME'] ?></td>
        <td><?= $user['FIRSTNAME'] ?></td>
        <td><?= $user['EMAIL'] ?></td>
        <td><?= $user['NIVEAU'] ?></td>
        <td><?= $user['USERNAME'] ?></td>
        <td><?= $user['ROLE'] ?></td>
        <td><?= $user['CREATED_AT'] ?></td>
  </tr>
      <?php
  }
    ?>
 </table>

<!--Fenêtre modale pour modifier/supprimer-->

 <div id="myModal" class="modal"></div>

<script src="vue\assets\js\modalForm.js"></script>


<?php
  $content = ob_get_contents();
  ob_get_clean();
