<?php
require('conexion2.php');
/*define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'bd_agenda');
// Ahora, establecemos la conexión.
try {
    // Ejecutamos las variables y aplicamos UTF8
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    echo "Conexión Satisfactoria";
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}*/
$message = '';
$nom_usuario = $_POST['usuario_txt'];
$nom_clave = trim($_POST['pass_txt']);
$opciones = ['cost' => 12,];
if (!empty($nom_usuario) && !empty($nom_clave)) {
    $sql = "INSERT INTO t_usuarios(usuario,clave) VALUES (:usuario, :clave)";
    $sql = $conn->prepare($sql);

    $sql->bindParam(':usuario', $nom_usuario, PDO::PARAM_STR, 40);
    $sql->bindParam(':clave', $nom_clave, PDO::PARAM_STR, 72);
    $pass_criptado = password_hash($nom_clave, PASSWORD_BCRYPT, $opciones);
    $sql->bindParam(':clave', $pass_criptado);

    if ($sql->execute()) {
        header("Location: ../../index.php");
    } else {
    
        $message= 'Ocurrió un Problema';
        print_r($sql->errorInfo());
    }
} else {
    ?>
    <h2>Ocurrió un Problema</h2>
<?php
}
?>