function checktest() {
  let dom_questions = querySelector(".question");
  let color_true = "var(--color-7)";
  let color_false = "var(--color-8)";

  dom_questions.forEach(elmt => {
    let valid = true;
    elmt.querySelector(".ansv").forEach(e => {
      if (!e.checked) {
        e.parentElement.style.color = color_false;
        valid = false;
      }
    });
    elmt.querySelector(".ansf").forEach(e => {
      if (e.checked) {
        e.parentElement.style.color = color_false;
        valid = false;
      }
    });
    let ans = elmt.querySelector(".ans")[0];
    if (valid) {
      ans.style.color = color_true;
      ans.innerHTML = "Correct";
    } else {
      ans.style.color = color_false;
      ans.innerHTML = "Incorrect";
    }
  });
}
