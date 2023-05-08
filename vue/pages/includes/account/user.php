<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/user/get_user.php';
if (!isset($_SESSION)) {
    session_start();
}
$user = get_user($_SESSION['username']);
echo '<input type="text" id="iduser" name="iduser" value="' . $user['ID'] . '" style="display: none">';
ob_start();
?>

<style>
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

        #modalUser {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            left: 25%;
            width: 35rem;
            height: 40rem;
            border: 2px solid grey;
            background-color: rgb(242, 242, 242);
            display: flex;
            flex-direction: column;
        }

        #modalUser div {
            display: flex;
            flex-direction: column;
            margin-bottom: 0.6rem;
        }

        #b {
            display: inline-block;
            flex-direction: column;
            margin-bottom: 0.6rem;
        }

        #modalUser label {
            align-self: flex-start;
            margin-bottom: 0.2rem;


        }

        #modalUser input[type="text"],
        #modalUser textarea {
            width: 100%;
            padding: 9px;
            margin-bottom: 13px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        #modalUser input[type="email"],
        input[type="password"] {

            width: 100%;
            padding: 9px;
            margin-bottom: 13px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;

        }



        #modalUser form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }


        #b {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 0.6rem;
            margin-right: 7px;
        }

        #b input[type="submit"] {
            background-color: rgb(251, 133, 13);
            color: black;
            border-radius: 5px;
            padding: 10px 15px;
            margin-top: 18px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

</style>

<div id="modalUser">
    <form action="update_user.php" method="post">
        <h4>Toute modification sera appliquée à l'ensemble de votre compte.</h4>
        <div>
            <label for="firstname">Prénom :</label>
            <input type="text" name="firstname" id="FIRSTNAME" required>
        </div>
        <div>
            <label for="lastname">Nom :</label>
            <input type="text" name="lastname" id="LASTNAME" required>
        </div>
        <div>


            <label for="email">Email :</label>
            <input type="email" name="email" id="EMAIL ">
        </div>
        <div>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="PASSWORD" required>
        </div>

        <div id="b">
            <input type="submit" value="Enregistrer">
            <input type="submit" id="supprimer" value="Supprimer " onclick="confirmDelete()">
        </div>
    </form>
</div>



<script>
    function confirmDelete() {
        var confirmation = confirm("Etes vous sur de vouloir supprimer votre compte ?");

        if (confirmation) {

            document.querySelector('#modalUser form').submit();
        }
    }
</script>

<?php
$content = ob_get_contents();
ob_get_clean();
