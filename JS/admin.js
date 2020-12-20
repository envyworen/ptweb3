let liste = document.querySelectorAll(".sous");

tabjson.forEach(function(drop) {
    let menu = document.createElement('a');
    console.log(liste);
  
    menu.innerText = drop.h1_art;
    if (drop.titre_art == 'surveillance') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;

        liste[0].appendChild(menu);
    }
      if (drop.titre_art == 'force') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;

        liste[4].appendChild(menu);
    }
      if (drop.titre_art == 'profils') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;
      
        liste[2].appendChild(menu);
    }
      if (drop.titre_art == 'silence') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;
   
        liste[1].appendChild(menu);
    }
          if (drop.titre_art == 'inconcevable') {
        menu.href = "detail-" + drop.titre_art + "-" + drop.id_art;

        liste[3].appendChild(menu);
    }
});