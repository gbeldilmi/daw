<?php
ob_start(); ?>

<style>
  main>div {
    background-color: var(--color-4);
    color: var(--color-1);
    padding: 2rem;
  }

  main>div>a {
    color: var(--color-2);
    text-decoration: none;
  }

  .show-courses {
    background-color: var(--color-3);
    color: var(--color-4);
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin: 1rem;
  }

  .show-courses:hover {
    background-color: var(--color-1);
    color: var(--color-4);
  }

  #modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 9999;
  }

  #modal form {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    margin: auto;
    max-width: 500px;
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
  }

  #modal h1 {
    margin-top: 0;
  }

  #modal label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  #modal input[type="text"],
  #modal textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
  }

  #modal input[type="submit"] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 3px;
    cursor: pointer;
  }

  #modal input[type="submit"]:hover {
    background-color: #3e8e41;
  }

  #close-modal {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 25px;
    font-weight: bold;
    color: #050505;
    cursor: pointer;
  }

  #close-modal:hover {
    color: #000;
  }


  form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: rgb(242, 242, 242);
    border-radius: 5px;
    box-shadow: 0 0 5px #ccc;
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  input[type="text"],
  [type="file"] textarea,
  select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    margin-top: 10px;
  }

  button[type="button"],
  input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 7px;
    background-color: rgb(251, 133, 13);
    color: #fff;
    cursor: pointer;
    transition: background-color 0.2s;
    margin-top: 10px;
  }

  button[type="button"]:hover,
  input[type="submit"]:hover {
    background-color: #000000;
    color: white;
  }

  .resource {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px #ccc;
  }


  +button {
    background-color: rgb(251, 133, 13);
    color: var(--color-4);
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  }

</style>

<div>
  <a href="index.php?p=course"><button class="show-courses">Afficher mes cours</button></a>
  <!--<a><button id="create-course" class="show-courses">Créer un nouveau cours</button></a>-->
</div>

<h3>Création d'un nouveau cours <h3>
    <form action="" method="post">
      <div>
        <label for="title">Titre du cours :</label>
        <input type="text" name="title" id="title" required><br>
      </div>
      <div>
        <label for="description">Description :</label>
        <textarea name="description" id="description" rows="4" cols="50" required></textarea>
        <br>
      </div>
      <div>
        <label for="prerequisites">Prérequis:</label>
        <br>
        <input type="text" name="prerequisites" id="prerequisites"><br>
      </div>
      <div>
        <button type="button" onclick="addPrerequisite()">Ajouter un prérequis</button><br>
      </div>
      <div>
        <label for="resources">Ressources :</label><br>
      </div>
      <div id="resources-container">
        <div class="resource">
          <br>
          <label for="resource-type-1">Type de ressource :</label>
          <select name="resource-type-1" id="resource-type-1" required>
            <option value="">Choisissez un type de ressource</option>
            <option value="video">Vidéo</option>
            <option value="slide">Diapositive</option>
          </select>
          <br>
          <label for="resource-path-1">Chemin de la ressource :</label>
          <input type="file" name="resource-path-1" id="resource-path-1" required><br>
        </div>
      </div>
      <button type="button" onclick="addResource()">Ajouter une ressource</button><br>
      <input type="submit" value="Créer le cours">
    </form>
    </div>
    <script>

      let prerequisiteCount = 1;
      let resourceCount = 1;

      function addPrerequisite() {
        prerequisiteCount++;
        const prerequisites = document.getElementById("prerequisites");
        const newPrerequisite = document.createElement("input");
        newPrerequisite.type = "text";
        newPrerequisite.name = "prerequisite-" + prerequisiteCount;
        newPrerequisite.id = "prerequisite-" + prerequisiteCount;
        prerequisites.parentNode.insertBefore(newPrerequisite, prerequisites.nextSibling);
      }

      function addResource() {
        resourceCount++;
        const container = document.getElementById("resources-container");
        const newResource = document.createElement("div");
        newResource.className = "resource";
        newResource.innerHTML = `
        <label for="resource-type-${resourceCount}">Type de ressource :</label>
        <select name="resource-type-${resourceCount}" id="resource-type-${resourceCount}" required>
          <option value="">Choisissez un type de ressource</option>
          <option value="video">Vidéo</option>
          <option value="slide">Diapositive</option>
        </select>
        <br>
        <label for="resource-path-${resourceCount}">Chemin de la ressource :</label>
        <input type="file" name="resource-path-${resourceCount}" id="resource-path-${resourceCount}" required><br>
      `;
        container.appendChild(newResource);
      }
    </script>
    <?php
    $content = ob_get_contents();
    ob_get_clean();
    // done
    
