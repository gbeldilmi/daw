var nqnb = 0;

function inittest(num) {
  nqnb = num; // next question number
}

function deletequestion(qid) {
  let dom = document.querySelector("#q" + qid);
  dom.remove();
}

function addquestion() {
  let qcondom = document.querySelector("#question-container");
  let nqdom = '<div class="question" id="q' + nqnb + '">' +
  '<button type="button" onclick="deletequestion(' + nqnb + ')">Supprimer</button>' +
  '<textarea id="q' + nqnb + 'qt" name="q' + nqnb + 'qt" >Question</textarea><ul>';
  for (let ia = 1; ia <= 4; ia++) {
    nqdom += '<li><input id="q' + nqnb + 'a' + ia + 'v" name="q' + nqnb + 'a' + ia + 'v" type="checkbox" checked >' +
    '<input id="q' + nqnb + 'a' + ia + 't" name="q' + nqnb + 'a' + ia + 't" type="text" value="réponse"></li>';
  }
  nqdom += "</div>";
  nqnb++;
  qcondom.innerHTML += nqdom;
}
