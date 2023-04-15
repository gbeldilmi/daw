<?php
$test = get_test($id); // xml
ob_start();
?>

<h1>Test</h1>

<form action="checktest();">
<?php
    $qcount = 1;
    foreach ($test->question as $question) {
        echo '<div class="question" id="q' . $qcount . '">';
        echo '<p>' . $qcount . '. ' . $question->text . '</p>';
        echo '<ul>';
        foreach ($question->answer as $answer) {
            echo '<li><label><input type="checkbox" ';
            if ($answer['valid'] == 'true') {
                echo 'class="ansv"';
            } else {
                echo 'class="ansf"';
            }
            echo '>' . $answer->text . '</label></li>';
        }
        echo '</ul><p class="ans"></p></div>';
        $qcount = $qcount + 1;
    }
?>
<input type="submit" value="Valider">
</form>

<script src="vue/assets/js/checktest.js"></script>

<?php
  $content = ob_get_contents();
  ob_get_clean();
