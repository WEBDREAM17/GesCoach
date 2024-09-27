<?php
header("Access-Control-Allow-Origin: *"); // Autoriser les requêtes de localhost
header("Access-Control-Allow-Credentials: true"); // Autoriser l'envoi de cookies
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Autoriser les méthodes HTTP appropriées

include 'database.php';
include 'jwt.php';

/*if (isset($_COOKIE['auth_token'])) {
    $jwt = $_COOKIE['auth_token'];
	
	echo 'mon jwt : '.$jwt;
	
    $payload = verifyJWT($jwt);

    if ($payload) {
        // Token valide, retournez les données protégées
        echo json_encode(['message' => 'Accès autorisé', 'data' => 'Données sécurisées ici...']);
    } else {
        http_response_code(401); // Token invalide ou expiré
        echo json_encode(['message' => 'Token invalide ou expiré']);
    }
} else {
    http_response_code(402); // Aucun token fourni
    echo json_encode(['message' => 'Aucun token fourni']);
}*/

	session_start(); // Reprendre la session pour accéder aux variables de session

	// Vérifier si l'utilisateur est authentifié
	if (isset($_SESSION['user_id'])) {
		// Utilisateur authentifié
		echo '{"status":1, "message":"user authentifié", "id":"1"}';
		// Vous pouvez aussi afficher d'autres données ou autoriser l'accès à la page protégée
	} else {
		// Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
		echo '{"status":0, "message":"user non authentifié", "id":"1"}';
		exit;
	}
?>