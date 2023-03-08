<div>
  <img src="assets/img/logo.svg" alt="" width="20" height="20">
  <span>StudUb</span>
</div>

<div>
  <nav>
    <ul>
      <li>
        <a href="index.php?p=home">Retour à l'accueil</a>
      </li>
      <li>
        <?php 
          if (is_connected()) {
            echo '<a href="index.php?p=logout">Déconnexion</a>'
          } else {
            echo '<a href="index.php?p=login">Connexion</a>'
          }
        ?>
      </li>
      </ul>
  </nav>
  <button id="theme-switcher">
    <?php
      if (get_theme() == 'light') {
        echo '🌞';
      } else {
        echo '🌜';
      }
    ?>
  </button>
</div>
