articles.forEach(function(article) {
    console.log(article);
    
    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min)) + min;
    }
    
    let tous = document.querySelector(".tous");
    let block = document.createElement("div");
    block.style.width = "250px";
    block.style.height = "250px";
    block.style.backgroundColor = "green";
    tous.appendChild(block);
    
    let point = document.createElement("span");
    point.style.marginTop = getRandomInt(0, 200)+"px";
    point.style.marginLeft = getRandomInt(0, 200)+"px";
    block.appendChild(point);
  });