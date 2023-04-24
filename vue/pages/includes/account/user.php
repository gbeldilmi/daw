<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/sql-request.php';
session_start();

$user = get_user($_SESSION['username']);
ob_start();
?>

<h2>Informations de profil</h2>


<form method="post" action="">
    <p>Toute modification apportée à votre nom d'utilisateur ou mot de passe sera appliquée à l'ensemble de votre
        compte. </p>
    <div>
        <label for="username">Nom d'utilisateur :</label>
        <?= '<input type="text" id="username" name="username" value="' . $user['USERNAME'] . '">' ?>
    </div>
    <div>
        <label for="password">Mot de passe actuel :</label>
        <?= '<input type="password" id="password" name="password" value="' . $user['PASSWORD'] . '">' ?>
    </div>
    <div>
        <label for="new-username">Nouveau nom d'utilisateur :</label>
        <input type="text" id="new-username" name="new-username">
    </div>
    <div>
        <label for="new-password">Nouveau mot de passe :</label>
        <input type="password" id="new-password" name="new-password">
    </div>
    <div>
        <label for="confirm-password">Confirmer le nouveau mot de passe :</label>
        <input type="password" id="confirm-password" name="confirm-password">
    </div>
    <div>
        <input type="submit" value="Enregistrer les modifications">
    </div>
</form>

<div>
    <button >Supprimer le compte</button>
</div>

<?php
$content = ob_get_contents();
ob_get_clean();
