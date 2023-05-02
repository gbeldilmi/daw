<?php
  ob_start(); ?>

  <style>

    #red-square {
      background-color: var(--color-0);
      width: 60%;
      height: 35rem;
      float: left;
      top: 0px;
      word-wrap: break-word;
      white-space: normal;
    }
    #green-square {
      background-color: var(--color-0);
      display:flex;
      flex-direction: row;
      margin-top: 23px;
      width: 23%;
      height: 33rem;
      position: relative;
      top: 15px;
      left: 0rem;
    }
      #image-container {

      position: absolute;
      top: 65%;
      left: 63%;
      transform: translate(-50%, -50%);
      z-index: 1;
    }

    #parent {
      flex-wrap: wrap;
      position: relative;

    }

    #texte {
      margin-right:14rem;

    }
    #get-started-button {
  background-color: var(--color-4);
  color: var(--color-0);
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

#get-started-button:hover {
  background-color: var(--color-6);
}
#txt {
  text-align: center;
  font-size: 16px;
  font-family: sans-serif;
  color:var(--color-3);
}
#Troiscarre {
  background-color:var(--color-0);
width: 20rem;
height: 10rem;

}
#TroiscarreSpecial {

  background-color: var(--color-0);
width: 20rem;
height: 10rem;
margin-top:5rem;
}
#divparent {
  display:flex;
  justify-content: space-between;
}
#txtDeux {
  text-align: center;
  font-size: 25px;
  font-family: sans-serif;
  font-weight: bold;
  color:black;
}
#button-basdepage {
background-color: var(--color-4);
color: var(--color-0);
font-weight: bold;
border:none;
text-align: center;
width:40rem;
height:5rem;
font-size: 18px;
cursor: pointer;
border-radius: 1px;
position: relative;
  left: 50%;
  transform: translate(-50%, 15%);

}

#button-basdepage:hover {
background-color: var(--color-0);
}

  </style>
  <div id="parent">
  <div id="red-square">
<h1 id="texte">Bienvenue sur notre site de formation en ligne<br><br></h1>
<p id="texte">Nous sommes une plateforme éducative en ligne qui offre des cours dans différents domaines, tels que la programmation, le marketing, la finance, etc.<br><br></p>
<p id="texte">Nous nous engageons à fournir des cours de qualité, dispensés par des experts dans leur domaine, pour vous aider à acquérir de nouvelles compétences et à améliorer votre carrière professionnelle.<br><br></p>
<p id="texte">Nos cours sont conçus pour être interactifs et adaptés à votre rythme d'apprentissage. Vous pouvez suivre les cours à votre propre rythme et poser des questions à nos instructeurs en ligne si vous avez besoin d'aide.</p>
<button id="get-started-button">Get Started</button>
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
  <p><br><br>les cours qui donneront vie à votre carrière, étudiante.</p></div>
<div id="TroiscarreSpecial">
  <p id="txt">T'inserer</p>
  <p><br><br>dans le monde professionnel en t'offrant des compétences pertinentes et actualisées pour ta futur carriere.</p></div>
<div id="Troiscarre">
  <p id="txt">Te motiver</p>
  <p><br><br>est notre priorité afin que tu puisses atteindre tes objectifs académiques et professionnels avec succès.</p></div>

</div>
</div>



</div>


<?php
  $content = ob_get_contents();
  ob_get_clean();
