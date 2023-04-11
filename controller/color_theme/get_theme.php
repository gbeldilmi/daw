<?php
// get the color theme used
require_once "toggle_theme.php";
function get_theme(): string
{
  $theme = "light";
  if (!isset($_COOKIE['theme'])) {
    toggle_theme();
    $theme = $_COOKIE['theme'];
  }
  return $theme;
}
