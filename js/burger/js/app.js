const burger = document.querySelector('#burger');
const navbar = document.querySelector("#navbar");
const trait = document.querySelector(".trait");


burger.addEventListener('click', ()=>{
    trait.classList.toggle('active');
    navbar.classList.toggle("open");
    
})