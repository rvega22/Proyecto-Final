<?php
require_once __DIR__ . '/../helpers/functions.php'; // Importa funciones auxiliares

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start(); // Asegurarse de que la sesión está iniciada
    clean_post_inputs(); // Limpia las entradas de POST para evitar inyecciones

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    if (!$email || !$password) {
        set_error_message('Por favor, completa todos los campos.');
        redirect_back();
        exit;
    }

    // Conectar a la base de datos
    $pdo = getPDO();
    try {
        $sql = "SELECT id, name, email, password, isAdmin FROM users WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Autenticación exitosa
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            setcookie('user_id', $user['id'], time() + 7200, '/'); 
            setcookie('user_name', $user['name'], time() + 7200, '/');
            if($user["isAdmin"] == 1) {
                header('Location: ' . BASE_URL . '/../products');
                exit;
            } else {
                header('Location: ' . BASE_URL . '/../');
                exit;
            }
            
        } else {
            $queryDebug = $stmt->queryString;
            set_error_message('Correo o contraseña incorrectos. Consulta ejecutada: ' . $queryDebug);
            redirect_back();
            exit;
        }
    } catch (PDOException $e) {
        error_log("Error al autenticar al usuario: " . $e->getMessage());
        set_error_message('Ocurrió un error. Inténtalo de nuevo.');
        redirect_back();
        exit;
    }
}