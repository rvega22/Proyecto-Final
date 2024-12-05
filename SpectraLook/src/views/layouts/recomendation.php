<div class="centrarTitulo">
    <h2>Recomendados</h2>
  </div>
  <div class="carousel-container">
    <button class="carousel-btn prev" aria-label="Previous">&#9664;</button>
    <div class="carousel">
        <div class="carousel-item">
        <a href="<?=BASE_URL?>/../src/views/public/products/details.php">
          <img class="target_img" src="<?=ASSETS_URL?>/img/Imagen_lentes_2.png" alt="Imagen de lentes" width="100%">
          <h2 class="letra" id="tamanio">SPECTRA ROAD METAL</h2>
          <p class="alinear_texto">$ 4200</p>
        </div>
        </a>

        <div class="carousel-item">
        <a href="<?=BASE_URL?>/../src/views/public/products/details.php">
          <img class="target_img" src="<?=ASSETS_URL?>/img/Imagen_lentes_2.png" alt="Imagen de lentes" width="100%">
          <h2 class="letra" id="tamanio">WAYFARER OVAL CHANGE</h2>
          <p class="alinear_texto">$ 3299</p>
          </div>
        </a>

      <div class="carousel-item">
        <a href="<?=BASE_URL?>/../src/views/public/products/details.php">
          <img class="target_img" src="<?=ASSETS_URL?>/img/Imagen_lentes_3.png" alt="Imagen de lentes" width="100%">
          <h2 class="letra" id="tamanio">LOOK BASE-HOT</h2>
          <p class="alinear_texto">$ 3200</p>
        </a>
      </div>

      <div class="carousel-item">
        <a href="<?=BASE_URL?>/../src/views/public/products/details.php">
          <img class="target_img" src="<?=ASSETS_URL?>/img/Imagen_lentes_4.png" alt="Imagen de lentes" width="100%">
          <h2 class="letra" id="tamanio">X8 SPECTRA MODERN</h2>
          <p class="alinear_texto">$ 2299</p>
        </a>
      </div>

      <div class="carousel-item">
        <a href="<?=BASE_URL?>/../src/views/public/products/details.php">
          <img class="target_img" src="<?=ASSETS_URL?>/img/Imagen_lentes_5.png" alt="Imagen de lentes" width="100%">
          <h2 class="letra" id="tamanio">WAYFARER ONE</h2>
          <p class="alinear_texto">$ 4499</p>
        </a>
      </div>

      <div class="carousel-item">
        <a href="<?=BASE_URL?>/../src/views/public/products/details.php">
          <img class="target_img" src="<?=ASSETS_URL?>/img/Imagen_lentes_5.png" alt="Imagen de lentes" width="100%">
          <h2 class="letra" id="tamanio">WAYFARER ONE</h2>
          <p class="alinear_texto">$ 4499</p>
        </a>
      </div>
      
      <div class="carousel-item">
        <a href="<?=BASE_URL?>/../src/views/public/products/details.php">
          <img class="target_img" src="<?=ASSETS_URL?>/img/Imagen_lentes_2.png" alt="Imagen de lentes" width="100%">
          <h2 class="letra" id="tamanio">SPECTRA ROAD METAL</h2>
          <p class="alinear_texto">$ 4200</p>
        </a>
      </div>

      <div class="carousel-item">
        <a href="<?=BASE_URL?>/../src/views/public/products/details.php">
          <img class="target_img" src="<?=ASSETS_URL?>/img/Imagen_lentes_2.png" alt="Imagen de lentes" width="100%">
          <h2 class="letra" id="tamanio">SPECTRA ROAD METAL</h2>
          <p class="alinear_texto">$ 4200</p>
        </a>
      </div>
    </div>
    <button class="carousel-btn next" aria-label="Next">&#9654;</button>
  </div>

<script>
const carousel = document.querySelector('.carousel');
const items = document.querySelectorAll('.carousel-item');
const prevBtn = document.querySelector('.carousel-btn.prev');
const nextBtn = document.querySelector('.carousel-btn.next');

window.addEventListener('resize', changeScreen);
let visibleItems; // Declarar fuera para usarlo globalmente en la función
let currentIndex = 0;
const totalItems = items.length;
changeScreen();
function changeScreen() {

  if (window.innerWidth > 980) {
    visibleItems = 5;
  } else if (window.innerWidth > 580 && window.innerWidth <= 980) {
    visibleItems = 3;
  } else if(window.innerWidth <= 580) {
    visibleItems = 1;
  }

  console.log(`Visible items: ${visibleItems}`);
}

// Calcular el tamaño de cada elemento incluyendo el gap
const calculateItemWidth = () => {
    const itemStyle = getComputedStyle(items[0]);
    const itemWidth = items[0].clientWidth;
    const gap = parseFloat(itemStyle.marginRight || 0);
    return itemWidth + gap; // Ancho del elemento más el gap
};

// Actualizar la posición del carousel
const updatecarousel = () => {
    const itemWidth = calculateItemWidth();
    carousel.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
};

// Ocultar elementos que no están visibles
const hideOverflowItems = () => {
    items.forEach((item, index) => {
        if (index < currentIndex || index >= currentIndex + visibleItems) {
            item.style.display = 'none'; // Ocultar los elementos fuera de la vista
        } else {
            item.style.display = 'inline-block'; // Mostrar solo los visibles
        }
    });
};

// Inicializar carousel
const initializecarousel = () => {
    hideOverflowItems();
    updatecarousel();
};

// Eventos para botones
nextBtn.addEventListener('click', () => {
    if (currentIndex < totalItems - visibleItems) {
        currentIndex++;
        hideOverflowItems();
        updatecarousel();
    }
});

prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        hideOverflowItems();
        updatecarousel();
    }
});

// Ajustar el tamaño del carousel en caso de cambios de ventana
window.addEventListener('resize', initializecarousel);

// Iniciar el carousel
document.addEventListener("DOMContentLoaded", e => {
    initializecarousel();
})
</script>