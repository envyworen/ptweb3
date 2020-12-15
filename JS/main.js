
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
    let select = document.createElement("select");
    let force = document.createElement("option");
    force.value = "force"
    force.innerHTML = "force"
    let inconcevable = document.createElement("option");
    inconcevable.value = "inconcevable"
    inconcevable.innerHTML = "inconcevable"
    let profils = document.createElement("option");
    profils.value = "profils"
    profils.innerHTML = "profils"
    let silence = document.createElement("option");
    silence.value = "silence"
    silence.innerHTML = "silence"
    let surveillance = document.createElement("option");
    surveillance.value = "surveillance"
    surveillance.innerHTML = "surveillance"
    let enfant = elt.querySelectorAll(".parag");
    let type = elt.querySelector(".type");
    let truc = elt.querySelector(".modifier");
    select.name = "type";
    for (let i = 0; i < enfant.length; i++) {
      var textarea = document.createElement("textarea");
      elt.appendChild(textarea);
      textarea.innerHTML = enfant[i].innerHTML;
      textarea.name = enfant[i].getAttribute('name');
      enfant[i].style.display = "none";
      console.log();
    }
    elt.appendChild(select);
    select.appendChild(force);
    select.appendChild(inconcevable);
    select.appendChild(surveillance);
    select.appendChild(profils);
    select.appendChild(silence);
    truc.style.display = "none";
    type.style.display = "none";
  }
  
function modifycomp(n) {
  let elt = n.parentElement;
  let select = document.createElement("select");
  elt.appendChild(select);

  Tableau.forEach(function(comp){
    let option = document.createElement("option");
    option.value = comp.id_art
    option.innerHTML = comp.h1_art
    select.appendChild(option);
  });

  let enfant = elt.querySelectorAll(".parag");
  let type = elt.querySelector(".type");
  let truc = elt.querySelector(".modifier");
  select.name = "type";
  for (let i = 0; i < enfant.length; i++) {
    var textarea = document.createElement("textarea");
    elt.appendChild(textarea);
    textarea.innerHTML = enfant[i].innerHTML;
    textarea.name = enfant[i].getAttribute('name');
    enfant[i].style.display = "none";
    console.log();
  }

  truc.style.display = "none";
  type.style.display = "none";
}
