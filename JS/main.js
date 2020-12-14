
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
 
  let elt = n.parentElement;

  let enfant = elt.querySelector("p");
  let truc = elt.querySelector(".modifier");
  for (let i = 0; i < enfant.length; i++) {
    var textarea = document.createElement("textarea");
    elt.appendChild(textarea);
    textarea.innerHTML = enfant[i].innerHTML;
    enfant[i].style.display = "none";
  }
  console.log(truc);
  console.log(elt);
  console.log(enfant);
  console.log(textarea);
  truc.style.display = "none";
  enfant.style.display = "none";
}
