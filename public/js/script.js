
// alert('Fichier JS chargé !');

// init et sélection de : la table et ses lignes
let table = document.querySelector('table.table');
let row = table.querySelectorAll('tr')

// boucle dans le tableau de ligne
row.forEach(row => {
  // ecouteur event a l'entrée de la souris de la ligne
  row.addEventListener('mouseenter', () => {
    
    // Sélection de tout les élement posseddant la class : hovered de LA LIGNE
    let rows = row.querySelectorAll('.hovered');
      rows.forEach(row => {
        // Ajout d'une class sur la ligne
        row.classList.add('is-hover');
      });
  });

  // ecouteur event a la sortie de la souris de la ligne
  row.addEventListener('mouseleave', () => {

    // Sélection de tout les élement posseddant la class : hovered de LA LIGNE
    let rows = table.querySelectorAll('.hovered');
      rows.forEach(row => {
        // Ajout d'une class sur la ligne
        row.classList.remove('is-hover');
    });
  
  });

  // Au clique sur la ligne, JS renvoie vers la page PHP pour éditer l'article
  let articleId = row.id;

  row.addEventListener('click', () => {
    let rows = row.querySelectorAll('.hovered');
    rows.forEach(row => {
      window.location.href = "/admin-panel/articles/edit?id=" + articleId + ""
    });
  })


});

let navbar = document.getElementById("stickyNav");
let title = document.getElementById("title");

let sticky = navbar.offsetTop+11;
window.onscroll = function() {myFunction()};

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position

function myFunction() {
  if (window.scrollY >= sticky) {
    navbar.classList.add("sticky")
    title.classList.add('reduce');
  } else {
    navbar.classList.remove("sticky");
  }
};


