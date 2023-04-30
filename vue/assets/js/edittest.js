var nqnb = 0;

function inittest(num) {
  nqnb = num; // next question number
}

function deletequestion(qid) {
  let dom = $("#q" + qid);
  dom.remove();
}

function addquestion() {
  let qcondom = $("#question-container");
  let nq = $("#question-template").clone();
  let nqdom = "<div class=\"question\" id=\"q" + nqnb + ">" +
  ///////////////////////////////////////////////////////
  "</div>";

  qcondom.append(nqdom);
}
