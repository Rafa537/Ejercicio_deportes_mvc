<?php
class cAdmin {
    
    private function checkAdmin() {
        if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != 'c') {
            header("Location: index.php");
            exit;
        }
    }
    
    public function menu() {
        $this->checkAdmin();
        require 'vistas/menu_admin.php';
    }
    
        public function consulta1() {
            $this->checkAdmin();
            require_once 'modelos/mUsuario.php';
            $usuarioModel = new mUsuario();
            $usuarios = $usuarioModel->getUsuariosConDeportes();
            require 'vistas/consultas/usuarios_deportes.php';  
        }

        public function consulta2() {
            $this->checkAdmin();
            require_once 'modelos/mDeporte.php';
            $deporteModel = new mDeporte();
            $total = $deporteModel->getTotalDeportesConAlumnos();
            require 'vistas/consultas/total_deportes.php';  
        }

        public function consulta3() {
            $this->checkAdmin();
            require_once 'modelos/mDeporte.php';
            $deporteModel = new mDeporte();
            $deportes = $deporteModel->getDeportesConUsuarios();
            require 'vistas/consultas/deportes_usuarios.php'; 
        }
    }
?>