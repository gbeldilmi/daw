<?php
$title = "Register";
ob_start();
?>

  <style>
    body {
      background-color: grey;
    }
    #divprinc
    {
      position: relative;
      /*top: 50%;*/
      left: 50%;
      /*transform: translate(-50%, -50%);*/
      width: 30rem;
      height: 35rem;
      border: 2px solid grey;
      background-color: white;
    }
    #titre
    {
      text-align: center;
      font-family: "sans-serif";
    }
    input[type="text"],
    input[type="password"] {
      padding: 15px;
      margin-left: 20px;
      border: none;
      margin-bottom: 20px;
      width: 90%;
      font-family: Arial, sans-serif;
      font-size: 14px;
      background-color: #D3D3D3;
    }

    input[type="submit"] {
      background-color: #000000;
      color: white;
      border-radius: 5px;
      padding: 15px;
      margin-left: 5px;
      font-family: Arial, sans-serif;
      font-size: 16px;
      cursor: pointer;
      margin-top: 55px;
      width: 90%;
      margin-left: 25px;
    }
    input[type="submit"]:hover {
      background-color: #FF0000;
    }
    label {
      font-size: 16px;
      font-family: Arial, sans-serif;
      margin-bottom: 10px;
      margin-top: 15px;
      margin-left: 20px;
      text-align: center;
    }
    select {
      margin-left: 20px;
      border: 1px solid ;
      border-radius: 2px;
      padding: 8px;
      font-size: 14px;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
  </style>


  <div id="divprinc">
    <form id="register" method="post" action="../../controller/user/create_user.php">
      <h2 id="titre">Register<br></h2>
      <input type="text" name="r_lastname" id="r_lastname" required placeholder="Nom">
      <input type="text" name="r_firstname" id="r_firstname" required placeholder="Prénom">
      <input type="text" name="r_username" id="r_username" required placeholder="Nom d'utilisateur">
      <input type="password" name="r_password" id="r_password" required placeholder="Mot de passe">
      <label for="r_role">Vous êtes :</label>
      <select name="r_role" id="r_role" required>
        <option value="student">Étudiant</option>
        <option value="teacher">Professeur</option>
      </select>
      <input type="submit" value="Register">
    </form>
  </div>

<?php
$content = ob_get_contents();
ob_get_clean();
