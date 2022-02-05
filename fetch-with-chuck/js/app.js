const btn = document.querySelectorAll("button")[0];

async function request() {
  const res = await fetch("https://api.chucknorris.io/jokes/random", {
    headers: {
      "Access-Control-Allow-Origin": "*",
    },
  });

  const results = await res.json();
  createElem(results);
}

function createElem(datas) {
  const parent = document.querySelector("#App");

  parent.innerHTML = "";

  let joke = `
  <section>
  <div>
      <figure id="icons"><img src="${datas["icon_url"]}" /></figure>
      <article id="joke"><p>${datas["value"]}</p></article>
  </div>
  </section>
 `;

  parent.innerHTML = joke;
}

window.addEventListener("load", () => {
  request();

  btn.addEventListener("click", () => {
    request();
  });
});
