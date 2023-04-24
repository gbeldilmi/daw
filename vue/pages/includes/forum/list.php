<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/user/get_id.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/ConnectionDb.php';
//print_r($_SESSION);
$username = $_SESSION['username'];
$user_id = get_id($username);

$sql = "SELECT FORUM_DISCUSSION.* FROM FORUM_DISCUSSION
        INNER JOIN FOLLOWED_COURSE ON FORUM_DISCUSSION.COURSE_ID = FOLLOWED_COURSE.COURSE_ID
        WHERE FOLLOWED_COURSE.USER_ID = $user_id
        ORDER BY FORUM_DISCUSSION.CREATED_AT DESC";

$title = "List";
$conn = new ConnectionDb();
$db = $conn->database;
$query = $db->prepare($sql);
$query->execute();

while ($row = $query->fetch()) {
    echo "<p>Titre : " . $row["TITLE"] . "</p>";
    echo '<br>';
    echo "<p>Date de création : " . $row["CREATED_AT"] . "</p>";
}
/////////// ---> passer par les controllers pour les requêtes à la BDD
ob_start();
?>
<div class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form method="post" action='../../../../controller/forum/create_thread.php'>
            <label for="course" class="form-label">Course </label>
            <input type="text" name="course" class="form-input">
            <label for="titre" class="form-label">Titre </label>
            <input type="text" name="titre" class="form-input">
            <label for="contenu" class="form-label">Contenu </label>
            <textarea name="contenu" class="form-textarea"></textarea>
            <button class="buttonlist" onclick="openModal()">Créer un nouveau thread</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_contents();
ob_get_clean();
