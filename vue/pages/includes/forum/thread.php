
$thread_id = $_GET['id'];

//a voir si ID ou DISCUSSION_ID dans table.sql
$sql = "SELECT * FROM FORUM_MESSAGE WHERE ID = $thread_id ORDER BY CREATED_AT ASC";
$result = mysqli_query($conn, $sql);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($rows as $row) {
echo "<p>Date de création : " . $row["CREATED_AT"] . "</p>";
echo '<br>';
echo "<p>Contenu : " . $row["CONTENT"] . "</p>";
}


<form class="form-thread" method="post" action="thread.php">
    <h4 class="centretitre" >Nouveau message</h4>
    <label class="form-label" for="nom">Nom :</label>
    <input class="form-input" type="text" id="nom" name="nom"><br>
    <label class="form-label" for="message">Message :</label>
    <textarea class="form-textarea"id="message" name="message"></textarea><br>
    <input class="buttonlist" type="submit" value="Poster">
</form>
