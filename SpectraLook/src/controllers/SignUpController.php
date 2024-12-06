<?php
require_once __DIR__ . '/../helpers/functions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    clean_post_inputs(); // Limpia los datos enviados por el formulario

    // Recibir y validar datos del formulario
    $name = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if (!$name || !$email || !$phone || !$password || !$confirmPassword) {
        set_error_message('Por favor, completa todos los campos.');
        redirect_back();
        exit;
    }

    if ($password !== $confirmPassword) {
        set_error_message('Las contraseñas no coinciden.');
        redirect_back();
        exit;
    }

    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $pdo = getPDO();
    try {
        // Verificar si el correo ya existe
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            set_error_message('El correo ya está registrado.');
            redirect_back();
            exit;
        }

        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO users (name, phone_number, email, password) VALUES (:name, :phone, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        // Éxito en el registro
        set_success_message('Registro exitoso. ¡Ahora puedes iniciar sesión!');
        header('Location: ' . BASE_URL . '/../login');
        exit;
    } catch (PDOException $e) {
        error_log("Error al registrar usuario: " . $e->getMessage());
        set_error_message('Error al registrar el usuario. Inténtalo de nuevo.');
        redirect_back();
        exit;
    }
}
?>