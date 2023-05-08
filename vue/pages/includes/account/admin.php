<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/controller/user/get_users.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controller/user/is_admin.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controller/user/is_connected.php";
if (!is_connected())
    header("Location: http://localhost/vue/index.php?p=home");
if (!is_admin())
    header("Location: http://localhost/vue/index.php?p=logout");
$users = get_users(); // array of users
$title = "Admin Page";
ob_start();
?>
<style>
    #modal {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        left: 30%;
        width: 30rem;
        height: 40rem;
        border: 2px solid grey;
        background-color: rgb(242, 242, 242);
        display: flex;
        flex-direction: column;
    }

    #modal div {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
    }

    #modal label {
        align-self: flex-start;
        margin-bottom: 0.2rem;

    }

    #modal input[type="text"],
    #modal textarea {
        width: 100%;
        padding: 7px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 19px;
    }


    #modal input[type="submit"] {

        background-color: rgb(251, 133, 13);
        color: black;
        border: none;

        padding: 12px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 3px;
        cursor: pointer;

    }

    #modal input[type="submit"]:hover {
        background-color: #000000;
        color: white;
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

    #modal input[type="file"] {
        align-self: center;
        margin-top: 1rem;
    }


    button {
        background-color: rgb(251, 133, 13);
        color: black;
        border: none;
        border-radius: 5px;
        padding: 12px 30px;
        font-size: 16px;
        font-family: Arial, sans-serif;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
        margin-right: 20px;
    }

    button:hover {
        background-color: #000;
        color: white;
    }



    /* Style pour le formulaire de recherche */
    #search-form {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    #search-input {
        flex-grow: 1;
        margin-right: 10px;
        padding: 5px;
        border: 1px solid #ccc;
    }

    #filter-select {
        margin-right: 10px;
        padding: 5px;
        border: 1px solid #ccc;
    }

    /* Style pour les boutons du formulaire */
    button {
        background-color: rgb(251, 133, 13);
        color: black;
        border: none;
        padding: 10px;
        cursor: pointer;

    }

    button:hover {
        background-color: #555;
        color: white;
    }

    /* Style pour la table des utilisateurs */
    #user-table {
        border-collapse: collapse;
        width: 100%;
    }

    #user-table th,
    #user-table td {
        border: 1px solid #ccc;
        padding: 5px;
    }

    #user-table th {

        background-color: rgb(242, 242, 242);
        ;
        text-align: center;
    }

    .user-row {
        transition: background-color 0.3s ease;
    }

    .user-row:hover {
        background-color: #f5f5f5;
    }

    #user-table th,
    #user-table tbody tr:first-child th {

        background-color: rgb(251, 133, 13);
        color: black;

        padding: 5px;
    }

</style>



<form id="search-form">
    <input type="text" id="search-input">
    <select id="filter-select">
        <option value="all">Tous</option>
        <option value="lastname">Nom</option>
        <option value="firstname">Prénom</option>
        <option value="niveau">Niveau</option>
        <option value="role">Rôle</option>
        <option value="username">Username</option>
        <option value="created_at">Date de création</option>
    </select>
    <button type="submit">Rechercher</button>
    <button type="button" id="reset-button">Réinitialiser</button>
</form>


<h1>Listes des utilisateurs</h1>


<table id="user-table">
    <thead>
        <tr id="user1">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Niveau</th>
            <th>Username</th>
            <th>Role</th>
            <th>Créé le</th>
            <th>Modifier</th> <!-- Ajout du bouton Modifier -->

        </tr>
    </thead>
    <tbody>
        <tr id="user2" class="user-row">
            <td>Doe</td>
            <td>John</td>
            <td>john.doe@example.com</td>
            <td>Avancé</td>
            <td>johndoe</td>
            <td>Admin</td>
            <td>2021-08-20</td>
            <td><button class="edit-button">Modifier</button></td> <!-- Bouton Modifier -->
        </tr>
        <tr id="user3" class="user-row">
            <td>Smith</td>
            <td>Jane</td>
            <td>jane.smith@example.com</td>
            <td>Débutant</td>
            <td>janesmith</td>
            <td>Utilisateur</td>
            <td>2021-09-01</td>
            <td><button class="edit-button">Modifier</button></td> <!-- Bouton Modifier -->
        </tr>
        <tr id="user2" class="user-row">
            <td>Williams</td>
            <td>Robert</td>
            <td>robert.williams@example.com</td>
            <td>Intermédiaire</td>
            <td>robertwilliams</td>
            <td>Admin</td>
            <td>2021-09-15</td>
            <td><button class="edit-button">Modifier</button></td> <!-- Bouton Modifier -->
        </tr>
    </tbody>
</table>

<script>

    // Récupère la table et tous les lignes de la table
    var table = document.getElementById("user-table");
    var rows = table.getElementsByTagName("tr");

    // Ajoute un événement contextmenu pour chaque ligne de la table
    for (var i = 0; i < rows.length; i++) {
        rows[i].addEventListener("contextmenu", function (event) {
            // Empêche l'action par défaut du clic droit
            event.preventDefault();

            // Récupère les informations de la ligne sélectionnée
            var cells = this.getElementsByTagName("td");
            var nom = cells[0].innerText;
            var prenom = cells[1].innerText;
            var email = cells[2].innerText;
            var niveau = cells[3].innerText;
            var username = cells[4].innerText;
            var role = cells[5].innerText;
            var dateCreation = cells[6].innerText;

            // Crée la fenêtre modale avec les boutons Modifier et Supprimer
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            modal.innerHTML = "<div id='modalUser'>" +
                "<form action='update_user.php' method='post'>" +
                "<button id='closeModal' onclick='closeModal()'>&times;</button>" +
                "<h4>Toute modification sera appliquée à l'ensemble de votre compte.</h4>" +
                "<div>" +
                "<label for='nom'>Nom :</label>" +
                "<input type='text' name='nom' id='nom' value='" + nom + "' required>" +
                "</div>" +
                "<div>" +
                "<label for='email'>Email :</label>" +
                "<input type='email' name='email' id='email' value='" + email + "'>" +
                "</div>" +
                "<div>" +
                "<label for='niveau'>Niveau :</label>" +
                "<input type='text' name='niveau' id='niveau' value='" + niveau + "' required>" +
                "</div>" +
                "<div>" +
                "<label for='username'>Username :</label>" +
                "<input type='text' name='username' id='username' value='" + username + "' required>" +
                "</div>" +
                "<div>" +
                "<label for='password'>Mot de passe :</label>" +
                "<input type='password' name='password' id='password' required>" +
                "</div>" +
                "<div>" +
                "<label for='confirmPassword'>Confirmer le mot de passe :</label>" +
                "<input type='password' name='confirmPassword' id='confirmPassword' required>" +
                "</div>"

        });
    }


    function closeModal() {
        let modal = document.getElementById("myModal");
        modal.style.display = "none";
        modal.innerHTML = "";
    }

    const searchForm = document.getElementById("search-form");
    const filterSelect = document.getElementById("filter-select");
    const searchInput = document.getElementById("search-input");
    const resetButton = document.getElementById("reset-button");
    const userTable = document.getElementById("user-table");

    searchForm.addEventListener("submit", (event) => {
        event.preventDefault(); // empêche le rechargement de la page lors de la soumission du formulaire

        const filterValue = filterSelect.value;
        const searchTerm = searchInput.value.trim().toLowerCase();

        // itérer sur toutes les lignes du tableau
        for (let i = 0; i < userTable.rows.length; i++) {
            const row = userTable.rows[i];

            // si la ligne est une ligne d'utilisateur (classe "user-row")
            if (row.classList.contains("user-row")) {
                let cell = row.querySelector(`td:nth-child(${getColumnIndex(filterValue)})`);
                if (cell) {
                    let cellValue = cell.textContent.trim().toLowerCase();
                    if (cellValue.includes(searchTerm) || searchTerm === "") {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            }
        }
    });

    function getColumnIndex(columnName) {
        // retourne l'indice de colonne correspondant au nom de colonne
        switch (columnName) {
            case "lastname":
                return 1;
            case "firstname":
                return 2;
            case "niveau":
                return 4;
            case "role":
                return 6;
            case "username":
                return 5;
            case "created_at":
                return 7;
            default:
                return -1; // colonne non valide
        }
    }

    resetButton.addEventListener("click", () => {
        filterSelect.value = "all";
        searchInput.value = "";
        // itérer sur toutes les lignes du tableau et afficher chaque ligne
        for (let i = 0; i < userTable.rows.length; i++) {
            const row = userTable.rows[i];
            row.style.display = "";
        }
    });
    // Ajouter un écouteur d'événement au formulaire
    document.getElementById("user-form").addEventListener("submit", function (event) {
        event.preventDefault(); // empêche la soumission par défaut du formulaire

        // Récupérer les valeurs des champs de formulaire
        var nom = document.getElementById("nom").value;
        var email = document.getElementById("email").value;
        var niveau = document.getElementById("niveau").value;
        var username = document.getElementById("username").value;
        var role = document.getElementById("role").value;
        var dateCreation = document.getElementById("dateCreation").value;

        // Effectuer la modification des données de l'utilisateur ici avec les valeurs récupérées
    });


</script>
<?php
$content = ob_get_contents();
ob_get_clean();
