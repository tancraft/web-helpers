console.log("it's work");class ToggleMenu {
  constructor(burger, navbar) {
    this.burger = document.getElementById(burger);
    this.navbar = document.getElementById(navbar);
    this.navlinks = document.querySelectorAll(`#${navbar} li a`);
    this.burger.addEventListener("click", () => {
      this.burger.classList.toggle("active");
      this.navbar.classList.toggle("open");
    });
  }
  closLinks() {
    this.navlinks.forEach((item) => {
      item.addEventListener("click", () => {
        this.burger.classList.toggle("active");
        this.navbar.classList.toggle("open");
      });
    });
  }
}

window.addEventListener("DOMContentLoaded", () => {
  const burger = new ToggleMenu("burger", "navbar");
  burger.closLinks();
});