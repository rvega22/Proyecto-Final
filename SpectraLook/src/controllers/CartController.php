<?php

function createCart($userId, $productId)
    {
        $pdo = getPDO();
        $jsonProductsId = json_encode([$productId]);
        $jsonAmount = json_encode([1]);
        $product = getProductData($productId);
        try {
            // Consulta para insertar el carrito del usuario
            $sql = "INSERT INTO carrito (id_usuario, id_producto, cantidad, isPagado) VALUES (:userId, :productId, :jsonAmount, :isPagado)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':userId' => $userId,
                ':productId' => $productId,
                ':jsonAmount' => $jsonAmount,
                ':isPagado' => false
            ]);
            $sql2 = "UPDATE carrito SET total = total + :precio WHERE id_usuario = :userId";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([
                ':precio' => $product["precio"],
                ':userId' => $userId
            ]);
            
        } catch (PDOException $e) {
            error_log("Error al crear el carrito: " . $e->getMessage());
        }
    }

    function getCart($userid) 
    {
        $pdo = getPDO();

        try {
            // Consulta para obtener los datos del carrito
            $sql = "SELECT * FROM carts WHERE carts.id_user = $userId";
            $stmt = $pdo->query($sql);
            $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $cart;
        } catch (PDOException $e) {
            error_log("Error al consultar el carrito: " . $e->getMessage());
            return [];
        }
    }

    function addNewItemToCart($userId, $productId)
    {
        $pdo = getPDO();
        $cart = getCart();

        try {
            $sql = "UPDATE carrito SET id_producto = JSON_ARRAY_APPEND(id_producto, '$', :productoNuevo), cantidad = JSON_ARRAY_APPEND(cantidad, '$', :cantidadProducto) WHERE carrito.id_usuario = :idUsuario";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':productoNuevo' => $productId,
                ':cantidadProducto' => 1,
                ':idUsuario' => $userId
            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar el producto al carrito: " . $e->getMessage());
        }
    }

    function deleteCartItem($userid, $productId) 
    {
        $pdo = getPDO();

        try {
            // Consulta para obtener los datos del carrito
            $sql = "SELECT  FROM carts WHERE carts.id_user = $userId";
            $stmt = $pdo->query($sql);
            $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $cart;
        } catch (PDOException $e) {
            error_log("Error al consultar el carrito: " . $e->getMessage());
            return [];
        }
    }