<?php
$test = get_test($_GET['id']); // xml
ob_start();
?>

<h1>Test</h1>

<form method='post' action='test.php'>
  
<?php
    echo "<input type='hidden' name='test_id' value='" . $id . "'>"; // Soumettre l'ID du test avec le formulaire
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
?>

</ul>
<button type='submit'>Soumettre</button>
</form>


<?php
  $content = ob_get_contents();
  ob_get_clean();
