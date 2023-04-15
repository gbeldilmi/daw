function loadres(path,type)
{
 let mod = $("#modal");
 let content = "<button onclick='closeModal();'>&times;</button>";
 if(type==="video"){
   content += '<video src="' + path + '"></video>';
 }else if(type==="slide"){
    content +='<iframe src="' + path + '"></iframe>';
 } else {
   content +='<a href="' + path + '">Télécharger</a>';
 }
 mod.innerHTML = content;
 mod.style.display = "block";
  }

  function closeModal() {
    var modal = document.getElementById("modal");
    modal.style.display = "none";
    modal.innerHTML =  "";
  }
