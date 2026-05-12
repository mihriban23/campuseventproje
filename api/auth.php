<?php
session_start();
require_once '../includes/db.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

if ($action === 'register') {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Lütfen tüm alanları doldurun.']);
        exit;
    }

    // SHA-256 Hashing as required by IBP course
    $hashedPassword = hash('sha256', $password);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $surname, $email, $hashedPassword]);
        echo json_encode(['success' => true, 'message' => 'Kayıt başarılı! Giriş yapabilirsiniz.']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'E-posta adresi zaten kullanımda.']);
    }
}

if ($action === 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $hashedPassword = hash('sha256', $password);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->execute([$email, $hashedPassword]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        echo json_encode(['success' => true, 'message' => 'Giriş başarılı!', 'user' => $user['name']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'E-posta veya şifre hatalı.']);
    }
}
?>
