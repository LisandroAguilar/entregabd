<?php
//Utilizar la misma base de datos bdagenda
//Método de Conexión usando PDO
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bdagendalis');
// Ahora, establecemos la conexión.
try {
    // Ejecutamos las variables y aplicamos UTF8
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    echo "Conexión Satisfactoria";
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>