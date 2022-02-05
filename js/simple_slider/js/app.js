const parent = document.querySelector(".slideshow-container");
const previous = document.querySelector(".prev");
const next = document.querySelector(".next");

// cette constante est un tableau d objet dans lequel chacun a la source de l image et le texte a afficher 
// possible d ajouter autant d objet que tu veut sous le format {src: "source de l image", texte: "texte a afficher"}
const slides = [
  {
    src: "https://via.placeholder.com/1200x400/32e0c4/eeeeee ?Text=image 1",
    texte: "Bague-5€",
  },
  {
    src: "https://via.placeholder.com/1200x400/828282/eeeeee ?Text=image 2",
    texte: "Bague-5€",
  },
  {
    src: "https://via.placeholder.com/1200x400/32e0c4/eeeeee ?Text=image 3",
    texte: "Bague-5€",
  },
  {
    src: "https://via.placeholder.com/1200x400/828282/eeeeee ?Text=image 4",
    texte: "Plat-2€",
  },
  {
    src: "https://via.placeholder.com/1200x400/32e0c4/eeeeee ?Text=image 5",
    texte: "Plat-2€",
  },
  {
    src: "https://via.placeholder.com/1200x400/828282/eeeeee ?Text=image 6",
    texte: "Plat-2€",
  },
  {
    src: "https://via.placeholder.com/1200x400/32e0c4/eeeeee ?Text=image 7",
    texte: "Boite a secret-10€",
  },
  {
    src: "https://via.placeholder.com/1200x400/828282/eeeeee ?Text=image 8",
    texte: "Boite a secret-10€",
  },
];

// tableau des elements de dom creer
const cards = [];
//position actuelle dans le tableau des elements de la galerie
let index = 0;

// fonction permettant de creer les slides
function createSlide(src, texte, key) {
  let mySlide = createElem("div", "mySlide fade");
  let entete = createElem("div", "numberTextPorcelaine");
  let image = createElem("img");
  let txt = createElem("p", "text");

  entete.innerText = key + 1 + "/" + slides.length;
  txt.innerText = texte;
  image.src = src;

  mySlide.appendChild(entete);
  mySlide.appendChild(image);
  mySlide.appendChild(txt);

  return mySlide;
}

// fonction permettant la creation d un element de dom
function createElem(tagDom, addClass) {
  let domElem = document.createElement(tagDom);
  if (typeof addClass !== "undefined") {
    domElem.setAttribute("class", addClass);
  }
  return domElem;
}

// fonction permettant de parcourir le tableau d element de dom
function nextSlide(sens) {
  cards[index].classList.remove("active");
  index = index + sens;
  if (index < 0) {
    index = cards.length - 1;
  } else if (index > cards.length - 1) {
    index = 0;
  }
  cards[index].classList.add("active");
}

// execution du code au chargement de la page
window.addEventListener("load", () => {
  slides.forEach((elt, key) => {
    let node = createSlide(elt.src, elt.texte, key);
    parent.appendChild(node);
    cards.push(node);
  });
  cards[index].classList.add("active");
  next.addEventListener("click", () => nextSlide(1));
  previous.addEventListener("click", () => nextSlide(-1));
});
