
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
  
    let enfant = elt.querySelectorAll(".parag");
    console.log(enfant);
    let truc = elt.querySelector(".modifier");
    for (let i = 0; i < enfant.length; i++) {
      var textarea = document.createElement("textarea");
      elt.appendChild(textarea);
      textarea.innerHTML = enfant[i].innerHTML;
      textarea.name = enfant[i].name;
      enfant[i].style.display = "none";
    
      console.log(enfant[i].getAttribute('name'));
    }
    truc.style.display = "none";
  }
  