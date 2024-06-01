// Získanie elementu hamburger podľa ID
var hamburgerMenu = document.getElementById("hamburger");

// Funkcia pre zobrazenie a skrytie hlavného menu
function toggleMenu() {
  var hlavneMenu = document.querySelector(".main-menu");
  hlavneMenu.classList.toggle("responsive"); // Prepnúť triedu "responsive"
}

// Priradenie funkcie toggleMenu k kliknutiu na hamburger menu
hamburgerMenu.onclick = function() { toggleMenu(); };

// Premenná na sledovanie aktuálneho indexu slide
var index = 1;

// Funkcia na zobrazenie slide
function zobrazit(n) {
  var slidy = document.getElementsByClassName("slide");
  if (n > slidy.length) { index = 1; } // Ak je index väčší ako počet slide, začni od prvého
  if (n < 1) { index = slidy.length; } // Ak je index menší ako 1, nastav na posledný slide
  for (var i = 0; i < slidy.length; i++) {
    slidy[i].style.display = "none"; // Skry všetky slidy
  }
  slidy[index-1].style.display = "block"; // Zobraz aktuálny slide
}

// Funkcia pre zmenu slide
function dalsiSlide(n) {
  zobrazit(index += n); // Aktualizuj index a zobraz slide
}

// Inicializácia zobrazenia prvého slide
zobrazit(index);

// Priradenie funkcie predošlého slide k tlačidlu prev
var predosly = document.getElementById("prev");
predosly.addEventListener("click", function() {
  dalsiSlide(-1);
});

// Priradenie funkcie nasledujúceho slide k tlačidlu next
var dalsi = document.getElementById("next");
dalsi.addEventListener("click", function() {
  dalsiSlide(1);
});

// Pridanie event listenera pre akordeón
var akordeon = document.getElementsByClassName('accordion');
for (var prvok of akordeon) {
  prvok.addEventListener("click", function() {
    this.classList.toggle('active'); // Prepnúť triedu "active" pri kliknutí
  });
}

// Inicializácia transformácie produktov pri načítaní DOM
document.addEventListener('DOMContentLoaded', () => {
  const produkty = document.querySelectorAll('.product');
  produkty.forEach(produkt => {
    produkt.addEventListener('mouseover', () => {
      produkt.style.transform = 'rotateY(180deg)'; // Otočenie produktu o 180 stupňov pri prechode myšou
    });
    produkt.addEventListener('mouseout', () => {
      produkt.style.transform = 'rotateY(0deg)'; // Návrat do pôvodného stavu pri opustení myšou
    });
  });
});


