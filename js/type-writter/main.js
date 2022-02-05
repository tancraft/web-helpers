const parent = document.querySelector("#write");
const params = {
  timer: 200,
  indexWord: 0,
  sentence:
    "Ceci est un script pour un effet de Machine a écrire! Hésiter pas à le dire si sa vous plait",
};

/**
 * classe permettant de creer des effets de machine a ecrire
 * {params} un objet regroupant des informations pour creer l effet
 * {parent} un element de DOM ou attacher l effet
 *
 */

class TypeWriter {
  constructor(parent, params) {
    this.parent = parent;
    this.timer = params.timer;
    this.indexWord = params.indexWord;
    this.sentence = params.sentence.split("");
  }

  createElemDom(domElem, letter) {
    let elem = document.createElement(domElem);
    elem.innerText = letter != undefined ? letter : "";
    return elem;
  }

  show(i) {
    this.parent.appendChild(this.createElemDom("span", this.sentence[i]));
    if (this.sentence[i] == "!") {
      this.parent.appendChild(this.createElemDom("br"));
    }
    if (i < this.sentence.length - 1) {
      setTimeout(() => this.show(++i), this.timer);
    } else {
      clearTimeout(this.timer);
    }
  }
}

const domElem = new TypeWriter(parent, params);
domElem.show(0);
