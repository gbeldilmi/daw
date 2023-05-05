<?php
ob_start(); ?>

  <style>

    .red-square {
      background-color: rgb(179, 179, 179);
      width: 60%;
      min-width: 8rem;
      max-height: 40rem;
      float: left;
      word-wrap: break-word;
      white-space: normal;
      border-radius: 1.5%;
    }

    .green-square {
      background-color: rgb(248, 153, 55);
      margin-top: 23px;
      width: 30%;
      position: relative;
      top: 1.5rem;
      border-radius: 1.5%;
    }
    .image-container {
      position: absolute;
      top: 65%;
      left: 63%;
      transform: translate(-50%, -50%);
      z-index: 1;
      max-width: 100%;
    }

    .parent {
      display:flex;
      flex-direction: row;
      flex-wrap: wrap;
      position: relative;



    }

    .texte {
      margin-right:14rem;
      color:rgb(0, 0, 0);
      font-family: system-ui;

    }
    .texte::selection{
      color: white;
      background: orange;
    }
    .get-started-button {
      background-color: rgb(248, 153, 55);
      color: black;
      border:none;
      padding: 10px 20px;
      text-align: center;
      width:12rem;
      height:4rem;
      font-size: 16px;
      margin: 8rem 5rem;
      cursor: pointer;
      border-radius: 1px;
    }

    .get-started-button:hover {
      background-color: black;
      color: white;
    }
    .txt {
      text-align: center;
      font-size: 1.5rem;
      font-family: system-ui;
      color:black;
    }
    .txt2 {
      font-family: system-ui;
      color:black;
    }
    .Troiscarre {
      background-color: white;
      width: 20rem;
      height: 10rem;
      border-radius: 3.5%;
      background-color: rgb(217, 217, 217);

    }
    .TroiscarreSpecial {

      background-color: rgb(217, 217, 217);
      width: 20rem;
      height: 10rem;
      margin-top:5rem;
      border-radius: 3.5%;

    }
    .divparent {
      display:flex;
      justify-content: space-between;

    }
    .txtDeux {
      text-align: center;
      font-size: 25px;
      font-family: system-ui;
      font-weight: bold;
      color:black;
    }
    .button-basdepage {
      background-color: rgb(248, 153, 55);
      color: black;
      font-weight: bold;
      border:none;
      text-align: center;
      width:40rem;
      height:5rem;
      font-size: 18px;
      cursor: pointer;

      position: relative;
      left: 50%;
      transform: translate(-50%, 15%);
      border-radius: 3.5%;

    }

    .button-basdepage:hover {
      background-color: black;
      color: white;
    }

    body,body > main {
      background-color: #e6e6e6;
    }
  </style>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Page Title</title>
  </head>
  <body>
  <div class="parent">
    <div class="red-square">
      <h1 class="texte">Bienvenue sur notre site de formation en ligne<br><br></h1>
      <p class="texte">Nous sommes une plateforme éducative en ligne qui offre des cours dans différents domaines, tels que la programmation, le marketing, la finance, etc.<br><br></p>
      <p class="texte">Nous nous engageons à fournir des cours de qualité, dispensés par des experts dans leur domaine, pour vous aider à acquérir de nouvelles compétences et à améliorer votre carrière professionnelle.<br><br></p>
      <p class="texte">Nos cours sont conçus pour être interactifs et adaptés à votre rythme d'apprentissage. Vous pouvez suivre les cours à votre propre rythme et poser des questions à nos instructeurs en ligne si vous avez besoin d'aide.</p>
      <button class="get-started-button" onclick="window.location='./../index.php?p=login'">Get Started</button>
    </div>
    <div class="green-square"></div>
    <div class="image-container">
      <img src="/vue/assets/img/ImgHome.jpg" width="300" height="400" style="border: 1px solid black;" />
    </div>
  </div>
  <br><br><br><br>
  <div class="section2">
    <p class="txt"> ProForma te permet de...<br><br></p>
    <div class="divparent">
      <div class="Troiscarre">
        <p class="txt">Découvrir</p>
        <p class="txt2"><br>les cours qui donneront vie à votre carrière, étudiante.</p></div>
      <div class="TroiscarreSpecial">
        <p class="txt">T'inserer</p>
        <p class="txt2"><br>dans le monde professionnel en t'offrant des compétences pertinentes et actualisées pour ta futur carriere.</p></div>
      <div class="Troiscarre">
        <p class="txt">Te motiver</p>
        <p class="txt2"><br>est notre priorité afin que tu puisses atteindre tes objectifs académiques et professionnels avec succès.</p></div>

    </div>
  </div>

  <div class="section3">
    <p class="txtDeux"> Bienvenue chez ProForma<br></p>
    <button class="button-basdepage" onclick="window.location='./../index.php?p=login'">Découvrez nos formations</button>

  </div>
  </body>
  </html>

<?php
$content = ob_get_contents();
ob_get_clean();
