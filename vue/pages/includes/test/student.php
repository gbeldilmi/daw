<?php
  $test = get_test($_GET['id']); // xml
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
}

if (empty($_GET['id'])) {
  header('Location: index.php?p=404');
}
ob_start();
?>

<?php
    echo "<h1>Test $testId</h1>";
    echo "<form method='post' action='test.php'>";
    echo "<input type='hidden' name='test_id' value='$testId'>"; // Soumettre l'ID du test avec le formulaire
    echo "<ul>";
    foreach ($test['questions'] as $question) {
        echo "<li>";
        echo "<p>" . $question['text'] . "</p>";
        echo "<ul>";
        foreach ($question['answers'] as $answer) {
            echo "<li>";
            echo "<input type='radio' name='q" . $question['id'] . "' value='" . $answer['id'] . "' required>";
            echo "<label>" . $answer['text'] . "</label>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</li>";
    }
    echo "</ul>";
    echo "<button type='submit'>Soumettre</button>";
    echo "</form>";
    ?>

</form>


<?php
  $content = ob_get_contents();
  ob_get_clean();
