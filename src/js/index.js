const hamburgerButton = document.querySelector(".nav-toggler");
const navigation = document.querySelector("nav");

hamburgerButton.addEventListener("click", toggleNav);

function toggleNav() {
  hamburgerButton.classList.toggle("active");
  navigation.classList.toggle("active");
}


const edit = document.querySelector(".btn");
const content = document.querySelector(".content");
const content2 = document.querySelector(".content2");

edit.addEventListener("click", () => {
  console.log("clicked");
  content.classList.toggle("active2");
  content2.classList.toggle("view");
});

