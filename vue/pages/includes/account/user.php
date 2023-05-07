<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/user/get_user.php';
if(!isset($_SESSION))
{
    session_start();
}

$user = get_user($_GET['username']);

$to = 'amenabouhamou@gmail.com';
$subject = 'Subject of the email';
$message = 'Body of the email';
$headers = 'From: sender@example.com' . "\r\n" .
    'Reply-To: sender@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
ob_start();
?>

<h2>Informations de profil</h2>


<form method="post" action="">
    <p>Toute modification apportée à votre nom d'utilisateur ou mot de passe sera appliquée à l'ensemble de votre
        compte. </p>
    <div>
        <label for="username">Nom d'utilisateur :</label>
        <?= '<input type="text" id="username" name="username" value="' . $user['USERNAME'] . '" DISABLED>' ?>
    </div>
    <div>
        <label for="new-username">Nouveau nom d'utilisateur :</label>
        <input type="text" id="new-username" name="new-username" value=<?=$user['USERNAME']?> >
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

<?php
$content = ob_get_contents();
ob_get_clean();
