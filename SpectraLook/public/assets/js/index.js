console.log("Archivo index.js cargado correctamente");


// Detener el envío por defecto del formulario
function validatePassword(event) {
    event.preventDefault();

    // Obtener los valores de los campos de contraseña
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var errorMsg = document.getElementById("error-message"); // Mensaje de error en HTML

    console.log("Validando contraseñas...");

    // Verificar si las contraseñas coinciden
    if (password !== confirmPassword) {
        // Mostrar mensaje de error
        errorMsg.innerHTML = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        console.log("Contraseñas no coinciden");

        // Añadir clases de error a los campos si lo deseas
        document.getElementById("password").classList.add("error");
        document.getElementById("confirm-password").classList.add("error");
        return false; // Evitar el envío del formulario
    }

    // Si coinciden, limpiar el mensaje de error y proceder
    errorMsg.innerHTML = "";
    document.getElementById("password").classList.remove("error");
    document.getElementById("confirm-password").classList.remove("error");

    console.log("Contraseñas coinciden. Formulario enviado.");
    // Ahora permitimos el envío del formulario
    return true;
}

// Función para cargar productos en index.html y ventas.html
function loadProducts() {
    const productList = document.getElementById("product-list");
    if (!productList) return;

    products.forEach(product => {
        const productDiv = document.createElement("div");
        productDiv.classList.add("product");

        productDiv.innerHTML = `
          <img src="${product.image}" alt="${product.title}" />
          <h3>${product.title}</h3>
          <p>${product.price}</p>
          <button onclick="viewDetails(${product.id})">Ver Detalles</button>
        `;

        productList.appendChild(productDiv);
    });
}

// Función para mostrar detalles del producto en details.html
function showProductDetails() {
    const productId = parseInt(getProductIdFromURL());
    const product = products.find(p => p.id === productId);

    if (!product) {
        document.getElementById("product-container").innerHTML = "<p>Producto no encontrado.</p>";
        return;
    }
   
}

// Función para actualizar la cantidad
let quantity = 1;
function updateQuantity(change) {
    quantity = Math.max(1, quantity + change); // Asegura que la cantidad sea al menos 1
    document.getElementById("quantity").textContent = quantity;
}

const carrusel = document.querySelector('.carrusel');
const items = document.querySelectorAll('.carrusel-item');
const prevBtn = document.querySelector('.carrusel-btn.prev');
const nextBtn = document.querySelector('.carrusel-btn.next');

let currentIndex = 0;
const visibleItems = 5; // Cantidad de elementos visibles
const totalItems = items.length;

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
    carrusel.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
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

// Inicializar carrusel
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
window.addEventListener('resize', initializecarrusel);

// Iniciar el carrusel
initializecarousel();


