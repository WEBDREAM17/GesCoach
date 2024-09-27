<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Request-Method: POST');
header('Content-Type: application/json');
 
 // verification des champs obligatoires
 if(!isset($_POST['username'])){err('username not set', __LINE__);}
 if(!isset($_POST['password'])){err('password not set', __LINE__);}


//Connection à la base
require_once(__DIR__.'/protected/database.php');
require_once(__DIR__.'/protected/salt.php');
 
//On ajoute le user
try{
	
	//on crypte le mot de passe avant de l'insérer dans la base
	$hashed_password = crypt($_POST['password'], $salt);
	
    $q = $db->prepare('INSERT INTO `utilisateurs`(`id`, `username`, `password`, `date_creation`, `date_modification`, `id_personne`) VALUES (null,:username,:password,NOW(),NOW(),:id_personne)');
    $q->bindValue(':username', $_POST['username']);
    $q->bindValue(':password', $hashed_password);
	$q->bindValue(':id_personne', $_POST['id_personne']);
    
    //on execute la requête
    $q->execute();
 
    $userId = $db->lastInsertId();
   
    echo '{"status":1, "message":"user created", "id":"'.$userId.'"}';
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