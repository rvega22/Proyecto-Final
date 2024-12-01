        <?php
            include_once '../src/views/layouts/header.php';
            
        ?>


        <main>
            <div class="box_main">
                <div class="ofertas_info">
                    <h2>Ofertas especiales</h2>
                    <p id="tamaño_de_letra">Aprovecha las ofertas excepcionales en nuestros mejores lentes para este regreso a clases.</p>
                    <a href=""><button class="button_info">Ver mas</button></a>
                    <img class="imagen_descuento" src="assets/img/Imagen_rebajas.png" alt="Imagen de una etiqueta de descuento"> 
                </div>
                
                <div class="ofertas_info">
                    <img class="imagen_main" src="assets/img/imagen_main.png" alt="Imagen Joven con lentes de sol">
                </div>
            </div>
        </main>
    
        <?php
            include_once '../src/views/layouts/recomendation.php';
        ?>

        <div class="seccion_imagenes">
            <div class="bloque">
                <p class="texto">LENTES TRANSPARENTES GRADUADOS</p>
                <a href="#" class="button_base" id="button_info">Ver más</a>
            </div>
        
            <div class="bloque">
                <p class="texto">MÁS ÚNICOS QUE NUNCA</p>
                <a href="#" class="button_base" id="button_info">Ver más</a>
            </div>
        </div>

        <?php
            include_once '../src/views/layouts/footer.php';
        ?>
    </body>
</html>