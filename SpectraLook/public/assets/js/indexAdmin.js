let products = [];
let editIndex = null;

const addProductBtn = document.getElementById('addProductBtn');
const productForm = document.getElementById('productForm');
const publishBtn = document.getElementById('publishBtn');
const deleteFormBtn = document.getElementById('deleteFormBtn');
const productList = document.getElementById('productList').querySelector('tbody');
const messageDiv = document.getElementById('message');

// Mostrar formulario para agregar producto
addProductBtn.addEventListener('click', () => {
    editIndex = null; // Reset edición
    productForm.style.display = 'block';
    document.getElementById('formTitle').textContent = 'Agregar Producto';
    clearForm();
});

// Publicar producto
publishBtn.addEventListener('click', () => {
    console.log("hOLA")
    const name = document.getElementById('productName').value;
    const description = document.getElementById('productDescription').value;
    const price = document.getElementById('productPrice').value;
    const thumbnailInput = document.getElementById('thumbnailImage'); // Imagen de miniatura
    const thumbnail = thumbnailInput.files[0]; // Archivo seleccionado
    const recommended = document.getElementById('recommended').checked; // Valor del checkbox

    if (!name || !description || !price || !thumbnail) {
        showMessage('Por favor, completa todos los campos, incluida la imagen.', 'error');
        return;
    }

    const thumbnailURL = URL.createObjectURL(thumbnail); // Crear URL para mostrar la imagen

    if (editIndex !== null) {
        products[editIndex] = { name, description, price, thumbnailURL, recommended };
        showMessage('Producto editado correctamente.', 'success');
    } else {
        products.push({ name, description, price, thumbnailURL, recommended });
        showMessage('Producto publicado correctamente.', 'success');
    }

    updateProductList();
    productForm.style.display = 'none';
});

// Eliminar desde el formulario
deleteFormBtn.addEventListener('click', () => {
    if (editIndex !== null) {
        products.splice(editIndex, 1);
        showMessage('Producto eliminado correctamente.', 'error');
    }
    updateProductList();
    productForm.style.display = 'none';
});

// Actualizar lista de productos
function updateProductList() {
    productList.innerHTML = '';
    products.forEach((product, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.price}</td>
            <td>
                ${product.thumbnailURL ? `<img src="${product.thumbnailURL}" alt="${product.name}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">` : 'No imagen'}
            </td>
            <td>${product.recommended ? 'Sí' : 'No'}</td>
            <td>
                <button class="edit" onclick="editProduct(${index})">Editar</button>
                <button class="delete" onclick="deleteProduct(${index})">Eliminar</button>
            </td>
        `;
        productList.appendChild(row);
    });
}

// Editar producto
window.editProduct = (index) => {
    editIndex = index;
    const product = products[index];
    document.getElementById('productName').value = product.name;
    document.getElementById('productDescription').value = product.description;
    document.getElementById('productPrice').value = product.price;
    document.getElementById('thumbnailImage').value = ''; // No se puede cargar la imagen en un input file
    document.getElementById('recommended').checked = product.recommended; // Actualizar checkbox
    document.getElementById('formTitle').textContent = 'Editar Producto';
    productForm.style.display = 'block';
};

// Eliminar producto
window.deleteProduct = (index) => {
    products.splice(index, 1);
    updateProductList();
    showMessage('Producto eliminado correctamente.', 'error');
};

// Limpiar formulario
function clearForm() {
    document.getElementById('productName').value = '';
    document.getElementById('productDescription').value = '';
    document.getElementById('productPrice').value = '';
}

// Mostrar mensaje
function showMessage(message, type) {
    messageDiv.textContent = message;
    messageDiv.className = `message ${type}`;
    messageDiv.style.display = 'block';
    setTimeout(() => {
        messageDiv.style.display = 'none';
    }, 3000); // Ocultar mensaje después de 3 segundos
}