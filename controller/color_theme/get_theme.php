<?php
  // get the color theme used
  function get_theme():string{
    $theme = $_COOKIE['theme'];
    if (!isset($theme)) {
      toggle_theme();
      $theme = $_COOKIE['theme'];
    }
    return $theme;
  }
