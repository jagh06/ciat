<?php
//load environment variables
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    // read env
    $envVariables = parse_ini_file($envFile);

    // set environment variables
    foreach ($envVariables as $key => $value) {
        putenv("$key=$value");
    }
	$dbHost = getenv('MYSQL_ROOT_HOST');
	$dbUser = getenv('MYSQL_ROOT_USER');
	$dbPassword = getenv('MYSQL_ROOT_PASSWORD');
	$dbName = getenv('MYSQL_DATABASE');
}else{
	echo('error in the conection' . $envFile);
}

$servername = $dbHost;
$username = $dbUser;
$password = $dbPassword;
$dbname = $dbName;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
