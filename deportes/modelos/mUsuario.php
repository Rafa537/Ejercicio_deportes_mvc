<?php
    require_once __DIR__ . '/../config/configdb.php';
class mUsuario {
    private $db;
    
    public function __construct() {
        $database = new configdb();
        $this->db = $database->connect();
    }
    
    public function login($usuario, $password) {
        $sql = "SELECT * FROM usuarios WHERE nombreUsuario = ? AND password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
    public function registrar($datos) {
        $sql = "INSERT INTO usuarios (nombreUsuario, apeNombre, password, correo, telefono, perfil) 
                VALUES (?, ?, ?, ?, ?, 'u')";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssss", 
            $datos['usuario'], 
            $datos['nombre'], 
            $datos['password'], 
            $datos['correo'], 
            $datos['telefono']
        );
        return $stmt->execute();
    }
    
    public function usuarioExiste($usuario) {
        $sql = "SELECT idUsuario FROM usuarios WHERE nombreUsuario = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }
    
    public function getUsuariosConDeportes() {
        $sql = "SELECT u.*, GROUP_CONCAT(d.nombreDep) as deportes 
                FROM usuarios u 
                LEFT JOIN usuarios_deportes ud ON u.idUsuario = ud.idUsuario 
                LEFT JOIN deportes d ON ud.idDeporte = d.idDeporte 
                GROUP BY u.idUsuario";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
}
?>