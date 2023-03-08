<!DOCTYPE html>
<html>
<?php
require_once "../controller/color_theme/get_theme.php";
?>

<head>
  <meta charset="utf-8" />
  <title><?= $title ?></title>
  <!-- CSS -->
  <?= '<link href="assets/css/' . get_theme() . '.css" rel="stylesheet" />' ?>
  <link href="assets/css/main.css" rel="stylesheet" />
  <!-- SVG favicon -->
  <link rel="icon" href="assets/img/logo.svg" />
</head>

<body>
  <header>
    <?php require_once('pages/includes/header.php'); ?>
  </header>
  <main>
    <?= $content ?>

  </main>
  <footer>
    <?php require_once('pages/includes/footer.php'); ?>
  </footer>
</body>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script>
  function changeTheme() {
    var theme;
    if (getCookie('theme') == "light") {
      $("#theme img").attr("src", "assets/img/moon.png");
      theme = "dark";
    } else {
      $("#theme img").attr("src", "assets/img/sun.png");
      theme = "light";
    }
    document.cookie = "theme=" + theme + "; path=/";
    location.reload();
    console.log(getCookie('theme'));
  }

  function getCookie(name) {
    // split cookies by semicolon
    var cookies = document.cookie.split(';');
    // loop through each cookie
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i].trim();
      // check if the cookie name matches
      if (cookie.indexOf(name + '=') === 0) {
        // return the cookie value
        return cookie.substring(name.length + 1);
      }
    }
    // cookie not found
    return null;
  }
</script>
<?php
$theme = 'light';
if (isset($_COOKIE['theme'])) {
  $theme = $_COOKIE['theme'];
}
?>

</html>