<?php
    require_once __DIR__ . '/../config/configdb.php';
class mDeporte {
    private $db;
    
    public function __construct() {
        $database = new configdb();
        $this->db = $database->connect();
    }
    
    public function getTodos() {
        return $this->db->query("SELECT * FROM deportes")->fetch_all(MYSQLI_ASSOC);
    }
    
    public function asignarDeportes($idUsuario, $deportes) {
        foreach ($deportes as $idDeporte) {
            $sql = "INSERT INTO usuarios_deportes (idUsuario, idDeporte) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ii", $idUsuario, $idDeporte);
            $stmt->execute();
        }
    }
    
    public function getTotalDeportesConAlumnos() {
        $sql = "SELECT COUNT(DISTINCT idDeporte) as total FROM usuarios_deportes";
        return $this->db->query($sql)->fetch_assoc()['total'];
    }
    
    public function getDeportesConUsuarios() {
        $sql = "SELECT d.*, COUNT(ud.idUsuario) as total 
                FROM deportes d 
                LEFT JOIN usuarios_deportes ud ON d.idDeporte = ud.idDeporte 
                GROUP BY d.idDeporte";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getUltimoId() {
        return $this->db->insert_id;
    }
}
?>