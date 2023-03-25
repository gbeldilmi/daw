<?php
  ob_start(); ?>

<div>
  <h1>Bienvenue sur notre site de formation en ligne</h1>
  <p>Nous sommes une plateforme éducative en ligne qui offre des cours dans différents domaines, tels que la programmation, le marketing, la finance, etc.</p>
  <p>Nous nous engageons à fournir des cours de qualité, dispensés par des experts dans leur domaine, pour vous aider à acquérir de nouvelles compétences et à améliorer votre carrière professionnelle.</p>
  <p>Nos cours sont conçus pour être interactifs et adaptés à votre rythme d'apprentissage. Vous pouvez suivre les cours à votre propre rythme et poser des questions à nos instructeurs en ligne si vous avez besoin d'aide.</p>
  <img src="" alt="Bannière du site" style="width:100%">
</div>

<?php
  $content = ob_get_contents();
  ob_get_clean();
