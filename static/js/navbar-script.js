const navbarButton = document.querySelector("#navbar-button");
const navbarView = document.querySelector("#navbar-view");

navbarButton.addEventListener("click", function () {
  navbarView.classList.toggle("show");
});
