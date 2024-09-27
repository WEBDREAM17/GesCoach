<?php
// Clé secrète utilisée pour signer les JWT
$secretKey = 'jhglBTvSQQ1453140543248àç)_*FQFZcqzeFQvzv42421;';

// Fonction pour générer un JWT
function generateJWT($userId) {
    global $secretKey;

    // Header de la JWT
    $header = json_encode([
        'alg' => 'HS256',
        'typ' => 'JWT'
    ]);

    // Payload de la JWT (données à inclure dans le token, par ex. l'ID utilisateur)
    $payload = json_encode([
        'userId' => $userId,
        'exp' => time() + 3600, // Expiration dans 1 heure
        'iat' => time()         // Issued At: moment où le token est généré
    ]);

    // Encodage du header et du payload en base64
    $base64UrlHeader = base64UrlEncode($header);
    $base64UrlPayload = base64UrlEncode($payload);

    // Création de la signature avec HMAC-SHA256
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secretKey, true);

    // Encodage de la signature en base64
    $base64UrlSignature = base64UrlEncode($signature);

    // Construction du token en collant header, payload et signature
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

    return $jwt;
}

// Fonction pour vérifier et décoder un JWT
function verifyJWT($jwt) {
    global $secretKey;

    // Séparer les différentes parties du token
    $tokenParts = explode('.', $jwt);
    if (count($tokenParts) !== 3) {
        return false; // Le JWT doit avoir 3 parties : header, payload, signature
    }

    $header = $tokenParts[0];
    $payload = $tokenParts[1];
    $providedSignature = $tokenParts[2];

    // Recalculer la signature basée sur le header et le payload
    $signature = hash_hmac('sha256', "$header.$payload", $secretKey, true);
    $base64UrlSignature = base64UrlEncode($signature);

    // Comparer la signature calculée avec celle fournie dans le token
    if ($base64UrlSignature !== $providedSignature) {
        return false; // La signature est invalide
    }

    // Décoder le payload
    $payloadDecoded = json_decode(base64UrlDecode($payload), true);

    // Vérifier si le token a expiré
    if (isset($payloadDecoded['exp']) && time() > $payloadDecoded['exp']) {
        return false; // Le token est expiré
    }

    // Retourner les données du payload si tout est correct
    return $payloadDecoded;
}

// Fonction pour encoder en base64 de manière compatible avec les URL (sans padding)
function base64UrlEncode($data) {
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
}

// Fonction pour décoder un encodage base64 compatible avec les URL
function base64UrlDecode($data) {
    $base64 = str_replace(['-', '_'], ['+', '/'], $data);
    $padding = strlen($base64) % 4;
    if ($padding > 0) {
        $base64 .= str_repeat('=', 4 - $padding);
    }
    return base64_decode($base64);
}
