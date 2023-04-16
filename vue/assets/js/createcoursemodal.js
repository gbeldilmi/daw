const modal = document.getElementById("modal");
const createCourseButton = document.getElementById("create-course");

createCourseButton.addEventListener("click", () => {
  modal.style.display = "block";
});

window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});
