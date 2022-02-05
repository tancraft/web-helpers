const base = document.querySelector(".base");

const boxes = document.querySelectorAll(".case");

base.addEventListener("dragstart", dragStart);
base.addEventListener("dragend", dragEnd);

function dragStart(e) {
  e.target.classList.add("tenu");
  setTimeout(() => (e.target.className = "invisible"), 0);
}

function dragEnd() {
  this.className = "base";
}

for (let box of boxes) {
  box.addEventListener("dragover", dragOver);
  box.addEventListener("dragenter", dragEnter);
  box.addEventListener("dragleave", dragLeave);
  box.addEventListener("drop", dragDrop);
}

function dragOver(e) {
  e.preventDefault();
}

function dragEnter(e) {
      e.preventDefault();
    this.classList.add('hovered');
}

function dragLeave() {
    this.className = 'case';
}

function dragDrop() {
    this.className = 'case';
    this.append(base);
}
