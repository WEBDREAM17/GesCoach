<?php
include 'database.php';
include 'jwt.php';

$input = json_decode(file_get_contents('php://input'), true);
$username = $input['username'];
$password = $input['password'];

$stmt = $pdo->prepare('SELECT id, password FROM users WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $token = generateJWT($user['id']);
    setcookie('auth_token', $token, [
        'expires' => time() + 3600,
        'path' => '/',
        'domain' => 'yourdomain.com',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'None'
    ]);
    echo json_encode(['message' => 'Authentication successful']);
} else {
    http_response_code(401);
    echo json_encode(['message' => 'Invalid credentials']);
}
?>
