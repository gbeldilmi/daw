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
        require_once "../controller/user/is_connected.php";
        if (is_connected()) {
          echo '<a href="index.php?p=logout">Déconnexion</a>';
        } else {
          echo '<a href="index.php?p=login">Connexion</a>';
        }
        ?>
      </li>
    </ul>
  </nav>
  <?php
  if (get_theme() == 'light') {
    echo '<button id="theme" onclick="changeTheme()">' . '
                <img src="assets/img/sun.png" width="50" height="50">' . '
            </button>';
  } else {
    echo '<button id="theme" onclick="changeTheme()">' . '
                <img src="assets/img/moon.png" width="50" height="50">' . '
            </button>';
  }
  ?>
</div>