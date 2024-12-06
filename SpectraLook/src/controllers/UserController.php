<?php 
require_once __DIR__.'/../helpers/functions.php';

function getUsers() 
    {
        $pdo = getPDO();

        try {
            // Consulta para obtener todos los usuarios
            $sql = "SELECT id, name, phone_number, email FROM users";
            $stmt = $pdo->query($sql);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $users;
        } catch (PDOException $e) {
            error_log("Error al consultar los usuarios: " . $e->getMessage());
            return [];
        }
    }

    function deleteUsers($userId) {
        $pdo = getPDO();

        try {
            //Consulta para borrar un usuario usando su id
            $sql = "DELETE FROM users WHERE users.id = $userId";
            $stmt = $pdo->query($sql);
        } catch (PDOException $e) {
            error_log("Error al eliminar el usuario: " . $e->getMessage());
        }
    }

    function updateUser($userId, $name, $phone_number, $email) {
        $pdo = getPDO();

        try {
            //Consulta para editar un usuario usando su id
            $sql = "UPDATE users SET name='$name', phone_number = '$phone_number', email = '$password' users WHERE users.id = $userId";
            $stmt = $pdo->query($sql);
        } catch (PDOException $e) {
            error_log("Error al actualizar al usuario: " . $e->getMessage());
        }
    }

    function createUser($name, $phone_number, $email, $password) {
        $pdo = getPDO();
        $encryp_password = password_hash($password, PASSWORD_DEFAULT);
        try {
            $sql = "INSERT INTO users (name, phone_number, email, password) VALUES '$name', '$phone_number', '$email', '$encryp_password'";
            $stmt = $pdo->query($sql);
        } catch (PDOException $e) {
            error_log("Error al crear usuario: " . $e->getMessage());
        }
    }