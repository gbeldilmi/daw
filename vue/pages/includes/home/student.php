<?php
  ob_start(); ?>


<style>


body {
  background-color: var(--color-4);
  color: var(--color-1);
}

button {
  background-color: var(--color-3);
  color: var(--color-4);
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

a {
  color: var(--color-2);
  text-decoration: none;
}
</style>

<div>
  <a href="index.php?p=course"><button id="show-courses">Afficher mes cours</button></a>
  <a href="index.php?p=forum"><button id="show-courses">Afficher les forums</button></a>
</div>

<?php
  $content = ob_get_contents();
  ob_get_clean();
// done
