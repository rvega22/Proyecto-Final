<?php
require_once __DIR__.'/../helpers/functions.php';
$pdo = getPDO(); // Obtener conexión a la base de datos.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (!$email || !$password) {
        set_error_message_redirect('Por favor, completa todos los campos.');
    }

    // Validar usuario contra la base de datos
    try {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Inicio de sesión exitoso
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: '.BASE_URL."/../");
            exit;
        } else {
            set_error_message_redirect('Correo o contraseña incorrectos.');
        }
    } catch (PDOException $e) {
        error_log('Error en la base de datos: ' . $e->getMessage());
        set_error_message_redirect('Error interno. Por favor, inténtalo más tarde.');
    }
}
?>