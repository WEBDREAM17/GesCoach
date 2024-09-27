<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Request-Method: POST');
header('Content-Type: application/json');
include 'jwt.php';

// verification des champs obligatoires
if(!isset($_POST['username'])){err('username not set', __LINE__);}
if(!isset($_POST['password'])){err('password not set', __LINE__);}

//Connection à la base
require_once(__DIR__.'/protected/database.php');
require_once(__DIR__.'/protected/salt.php');
 
//On récupère le user
try{
			
    $sql = 'SELECT * FROM utilisateurs WHERE username=:username LIMIT 1';	
    $q = $db->prepare($sql);
    
    $q->bindValue(':username', $_POST['username']);

    //on execute la requête
    $q->execute();
	$row = $q->fetchAll();
	
	if(!$row){
		//Si la requête ne retourne pas d'utilisateurs
		echo '{"status":0, "message":"authentification échouée"}';
		exit();
	}
	
	//Comme les username sont uniques, on peut prendre directement la première ligne
	//On récupère le mot de passe crypté stocké dans la base
	$hashed_password = $row[0]['password'];
			
	//On compare le mot de passe avec le mot de passe saisi par l'utilisateur		
	if (hash_equals($hashed_password, crypt($_POST['password'], $hashed_password))) {	
	
		//$token = generateJWT($row[0]['id']);		
		//setAuthCookie($token);
		
		//On utilise les session en environnement de développement
		//session_start();
		//$_SESSION['user_id'] = '1';//$row[0]['id'];
		//$_SESSION['user_name'] = 'Ribault';//$row[0]['nom'];
		//$_SESSION['user_role'] = '2';//$row[0]['id_statut'];;
		
		echo '{"status":1, "data":'.json_encode($row).'}';
	}
	else	
	{
		echo '{"status":0, "message":authentification échouée}';
	}
	
    exit();
}
catch(PDOException $ex)
{
    err('error executing query', __LINE__);
}
 
// Fonction qui retourne l'erreur
function err($message, $debug)
{
    echo '{ "status":0,
            "message":"'.$message.'",
            "debug":'.$debug.'}';
 
    exit();
}
function debugPDOStatement($sql, $params) {
    foreach ($params as $key => $value) {
        $sql = str_replace($key, "'$value'", $sql);
    }
    return $sql;
}

function setAuthCookie($token) {
    // Détecter si l'application est en mode développement ou production
    //$isLocalhost = ($_SERVER['HTTP_HOST'] === 'localhost');

    // Configuration des cookies pour les deux environnements
    //if ($isLocalhost) {
        // Mode développement: Pas de Secure, SameSite=Strict
		
        setcookie('auth_token', $token, [
            'expires' => time() + 3600, // Expire dans 1 heure
            'path' => '/',
            'domain' => 'localhost',   // Spécifique à localhost
            'httponly' => true,        // Empêche l'accès via JavaScript
            'samesite' => 'None'        // Relaxé pour que le cookie soit envoyé sur les requêtes de même site
        ]);
    //} else {
        // Mode production: Utiliser Secure et SameSite=None
      //  setcookie('auth_token', $token, [
        //    'expires' => time() + 3600, // Expire dans 1 heure
          //  'path' => '/',
            //'domain' => 'gescoach.com',  // Remplacez par votre domaine
            //'secure' => true,          // Utiliser HTTPS
            //'httponly' => true,        // Empêche l'accès via JavaScript
            //'samesite' => 'None'       // Requis pour partager le cookie entre domaines
        //]);
    //}
}