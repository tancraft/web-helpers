
/*Merci a Forth d'avoir perfectionner mon code initial*/

const txt = document.querySelector("#write");
const listeMots = ["Web Dev", "Web Designer", "HTML/CSS", "Javascript"];

let timerLettre = 300;
let timerWords = 500;
let timerDelete = 100;
let timerDelWords = 1000;

let indexWord = 0;
let motSplit = listeMots[indexWord].split("");

function createSpan(letter){
	const span = document.createElement("span");
	span.innerText = letter;
	return span;
};

function changeWord(){
	indexWord = (indexWord + 1) % listeMots.length;
	motSplit = listeMots[indexWord].split("");
	setTimeout(() => {
		showLetter(0);
	}, timerWords);
};

function showLetter(i){
	txt.appendChild(createSpan(motSplit[i]));
	if (i < motSplit.length - 1) {
		setTimeout(() => showLetter(++i), timerLettre);
	}
	else {
		setTimeout(deleteLetter, timerDelWords)
		 };
};

function deleteLetter(){
	if (txt.firstChild) {
		txt.removeChild(txt.lastChild);
		setTimeout(deleteLetter, timerDelete);
	} else {
		changeWord()
	};
};

showLetter(0);