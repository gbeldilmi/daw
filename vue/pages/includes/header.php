<style>

#MonLogo {
  transform: scale(2);
  margin-top:39px;
  margin-left:35px;
  margin-bottom: -40px;
}

#boutons {
  float: right;
}

#boutons ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: row;
  justify-content: flex-end;
}

#boutons li {
  margin-left: 1rem;
}

#header-button{
  background-color: #FFFFFF;
  color: black;

  border:none;
  text-align: center;
  width:10rem;
  height:3rem;
  font-size: 18px;
  cursor: pointer;
  border-radius: 1px;
  font-family: sans-serif;
}

#header-button:hover {
  background-color: #FF0000;
}



</style>

<div id="MonLogo"><img src="/vue/assets/img/logodark.svg" alt="logo" height= "100px" width="auto" /></div>
<div id="boutons">
  <nav>
    <ul>
    <li><button id="theme" onclick="changeTheme()"><?= '<img src="assets/img/' . get_theme() . '.png" width="15" height="15">' ?></button></li>
    <li><button id="header-button">Edudiant</button></li>
    <li><button id="header-button">Professeur</button></li>
    <li><button id="header-button">Connexion</button></li>
    </ul>

</nav>

</div>
