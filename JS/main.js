var button = document.querySelector(".btn");
var content = document.querySelector(".content");

button.addEventListener("click", function () {
  var valeur = document.querySelector(".input").value;
  var supr = document.querySelectorAll(".texte");
  for (let i = 0; i < supr.length; i++) {
    supr[i].remove();
  }
  if (valeur !== "") {
    for (let i = 0; i < valeur; i++) {
      var pp = document.createElement("p");
      pp.className = "texte";
      pp.innerText = "wsh la zone";
      content.appendChild(pp);
    }
  }
});

/* parag 1 */

let paragraphe = document.querySelector(".parag");
let modif = document.querySelector(".modifier");
let valider = document.querySelector(".valider");
let cadre = paragraphe.innerText;
/*
modif.addEventListener("click", function () {{
  valider.style.display = "inline";
  modif.style.display = "none";
  paragraphe.innerHTML = "<textarea>";
  let txttextarea = document.querySelector("textarea");
  txttextarea.setAttribute("name", "article");
  txttextarea.innerHTML = cadre;
  }
});

let txttextarea = paragraphe.innerText;
valider.addEventListener("click", function () {
  valider.style.display = "none";
  modif.style.display = "inline";
  paragraphe.innerHTML = txttextarea;
});*/

// test

function modify(n) {
  var textarea = document.createElement("textarea");
  let elt = n.parentElement;
  elt.appendChild(textarea);
  let enfant = elt.querySelector("p");
  let truc = elt.querySelector("button");
  textarea.innerHTML = enfant.innerHTML;
  console.log(truc);
  truc.style.display = "none";
  enfant.style.display = "none";
}
