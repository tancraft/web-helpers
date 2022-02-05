document.querySelector('#close').addEventListener('click', function(){
    const visiter = document.getElementById('visiter');
    console.log(visiter);
    visiter.style.opacity = 0;
    visiter.style.visibility = 'hidden';
})

const ratio = 0.8;
const options = {
  root: null,
  rootMargin: "0px",
  threshold: ratio
};

 function surveille(entrees, observer) {
  entrees.forEach(function (e) {
    if (e.intersectionRatio > ratio) {
      e.target.classList.add("active");
      observer.unobserve(e.target);
    }
  });
};

document.documentElement.classList.add(".active");
window.addEventListener("DOMContentLoaded", function () {
  const observer = new IntersectionObserver(surveille, options);
  document.querySelectorAll(".reveal").forEach(function (e) {
    observer.observe(e);
  });
});
