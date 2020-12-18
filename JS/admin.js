let liste = document.querySelectorAll(".sous");
console.log(tabjson);
tabjson.forEach(function(drop) {
    let menu = document.createElement('a');
    let mi = document.createElement('li');
    mi.appendChild(menu);
    menu.innerText = drop.h1_art;
    if (drop.titre_art == 'surveillance') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;
        liste[0].appendChild(mi);
    }
      if (drop.titre_art == 'force') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;
        liste[4].appendChild(mi);
    }
      if (drop.titre_art == 'profils') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;
        liste[2].appendChild(mi);
    }
      if (drop.titre_art == 'silence') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;
        liste[1].appendChild(mi);
    }
          if (drop.titre_art == 'inconcevable') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;
        liste[3].appendChild(mi);
    }
});