<?php
  ob_start(); ?>

<div>
  <a href="index.php?p=course"><button id="show-courses">Afficher mes cours</button></a>
  <a href="index.php?p=forum"><button id="show-courses">Afficher les forums</button></a>
</div>

<?php
  $content = ob_get_contents();
  ob_get_clean();
// done
