<?php
ob_start(); ?>

<div id="parent">
  <div id="red-square">
    <h1 class="texte">Bienvenue sur notre site de formation en ligne<br><br></h1>
    <p class="texte">Nous sommes une plateforme éducative en ligne qui offre des cours dans différents domaines, tels que
      la programmation, le marketing, la finance, etc.<br><br></p>
    <p class="texte">Nous nous engageons à fournir des cours de qualité, dispensés par des experts dans leur domaine, pour
      vous aider à acquérir de nouvelles compétences et à améliorer votre carrière professionnelle.<br><br></p>
    <p class="texte">Nos cours sont conçus pour être interactifs et adaptés à votre rythme d'apprentissage. Vous pouvez
      suivre les cours à votre propre rythme et poser des questions à nos instructeurs en ligne si vous avez besoin
      d'aide.</p>
    <a href="index.php?p=login">
      <button id="get-started-button">Get Started</button>
    </a>
  </div>
  <div id="green-square"></div>
  <div id="image-container">
    <img src="/vue/assets/img/ImgHome.jpg" width="300" height="400" style="border: 1px solid black;" />
  </div>
</div>
<br><br><br><br>
<div id="section2">
  <p id="txt"> ProForma te permet de...<br><br></p>
  <div id="divparent">
    <div id="Troiscarre">
      <p id="txt">Découvrir</p>
      <p><br><br>les cours qui donneront vie à votre carrière, étudiante.</p>
    </div>
    <div id="TroiscarreSpecial">
      <p id="txt">T'inserer</p>
      <p><br><br>dans le monde professionnel en t'offrant des compétences pertinentes et actualisées pour ta futur
        carriere.</p>
    </div>
    <div id="Troiscarre">
      <p id="txt">Te motiver</p>
      <p><br><br>est notre priorité afin que tu puisses atteindre tes objectifs académiques et professionnels avec
        succès.</p>
    </div>

  </div>
</div>

</div>


<?php
$content = ob_get_contents();
ob_get_clean();
// done
