
  // Récupère la table et tous les lignes de la table
  var table = document.getElementById("user-table");
  var rows = table.getElementsByTagName("tr");
  
  for (var i = 0; i < rows.length; i++) {
    rows[i].addEventListener("contextmenu", function(event) {
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
      modal.innerHTML ="<button id='closeModal' onclick='closeModal();'>&times;</button>" +
                  "<h2>" + nom + " " + prenom + "</h2>" +
                  "<label for='nom'>Nom:</label>" +
                  "<input type='text' id='nom' value='" + nom + "'><br><br>" +
                  "<label for='email'>Email:</label>" +
                  "<input type='text' id='email' value='" + email + "'><br><br>" +
                  "<label for='niveau'>Niveau:</label>" +
                  "<input type='text' id='niveau' value='" + niveau + "'><br><br>" +
                  "<label for='username'>Username:</label>" +
                  "<input type='text' id='username' value='" + username + "'><br><br>" +
                  "<label for='role'>Role:</label>" +
                  "<input type='text' id='role' value='" + role + "'><br><br>" +
                  "<label for='dateCreation'>Date de création:</label>" +
                  "<input type='text' id='dateCreation' value='" + dateCreation + "'><br><br>" +
                 
                  "<button id='edit-user-btn'>Modifier</button>" +
                  "<button id='delete-user-btn'>Supprimer</button>";
    });
  }
 
  // permet de fermer le modal
  function closeModal() {
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
    modal.innerHTML = "";
  }


  const searchForm = document.getElementById("search-form");
  const filterSelect = document.getElementById("filter-select");
  const searchInput = document.getElementById("search-input");
  const userTable = document.getElementById("user-table");
  
  searchForm.addEventListener("submit", (event) => {
    event.preventDefault(); 

    const filterValue = filterSelect.value;
    const searchTerm = searchInput.value.trim().toLowerCase();
  
    //traiter toutes les lignes du tableau qui contient tous les utilisateurs
    for (let i = 0; i < userTable.rows.length; i++) {
      const row = userTable.rows[i];
  
      
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
  

   // retourne l'indice de colonne correspondant au nom de colonne sélectionnée pour la recherche 
  function getColumnIndex(columnName) {
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
        return -1; 
    }
  }
  
  //Pour réinitialiser la recherche 
  resetButton.addEventListener("click", () => {
    filterSelect.value = "all";
    searchInput.value = "";
    for (let i = 0; i < userTable.rows.length; i++) {
      const row = userTable.rows[i];
      row.style.display = "";
    }
  });