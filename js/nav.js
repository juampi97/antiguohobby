const navMenu = document.getElementById("navMenu");
const closeMenu = document.getElementById("closeMenu");
const toggleMenu = document.getElementById("toggleMenu");

toggleMenu.addEventListener("click", () => {
  navMenu.classList.add("nav_show");
});

closeMenu.addEventListener("click", () => {
  navMenu.classList.remove("nav_show");
});

