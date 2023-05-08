<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/controller/courses/get_course.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controller/courses/get_course_xml.php";
$id = $_GET['id'];
// $course = get_course($id); // data
$course_xml = get_course_xml($id); // xml
ob_start();
$_POST["idcourse"] = $id;
if (isset($_POST["idcourse"])) {
    echo $_POST["idcourse"];
} else
    echo "non dispo";
if (isset($_FILES["new_ressource"]["name"]))
    echo $_FILES["new_ressource"]["name"];
?>
<style>
    div:first-of-type {

        padding: 10px;
    }

    div:last-of-type {

        padding: 10px;
    }

    form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: rgb(230, 230, 230);
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

    button {
        background-color: rgb(251, 133, 13);
        color: var(--color-4);
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

</style>
<h3>Toute modification apportée sera appliquée à l'ensemble de votre cours. </h3>
<br>
<div>
    <form id="cours" method="post" action="../controller/courses/edit_course.php">
        <div>
            <label for="title">Nouveau nom du cours :</label>
            <input type="text" name="title" id="title" required><br>
        </div>
        <div>
            <label for="description">Nouvelle description:</label>
            <textarea name="description" id="description" rows="4" cols="50" required></textarea>
            <label for="title">Nouveau niveau d'etude :</label>
            <input type="text" name="title" id="title" required><br>
            <br>
        </div>
        <div>
            <input type="submit" value="Enregistrer les modifications">
    </form>



    +
</div>


<br>
<br>

<h3> Associé ici une nouvelle ressouce au prérequis a votre cours </h3>

<br>
<br>

<div>
    <form action="" method="post">
        <div>
            <label for="prerequisites">Prérequis:</label>
            <br>
            <input type="text" name="prerequisites" id="prerequisites"><br>
        </div>
        <div>
            <button type="button" onclick="addPrerequisite()">Ajouter un prérequis</button>

        </div>

        <div>
            <br>
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

        <input type="submit" value="Ajouter au cours">
    </form>
</div>
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

// wissam et feriel

