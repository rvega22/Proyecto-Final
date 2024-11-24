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


