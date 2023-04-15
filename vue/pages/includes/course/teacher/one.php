<?php
  $course = get_course($id); // xml
  ob_start(); ?>

<!-- 
  Edit course
-->

<?php
  $content = ob_get_contents();
  ob_get_clean();
