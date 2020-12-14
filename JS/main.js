
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
  let elt = n;
  elt.appendChild(textarea);
  let enfant = elt.querySelector("p");
  let truc = elt.querySelector("button");
  textarea.innerHTML = enfant.innerHTML;
  console.log(truc);
  console.log(elt);
  console.log(enfant);
  console.log(textarea);
  truc.style.display = "none";
  enfant.style.display = "none";
}
