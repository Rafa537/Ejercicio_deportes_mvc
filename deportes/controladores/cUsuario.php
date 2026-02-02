<?php
require_once 'modelos/mUsuario.php';
require_once 'modelos/mDeporte.php';

class cUsuario {
    
    public function showLogin() {
        require 'vistas/login.php';
    }
    
    public function showRegistro() {
        $deporteModel = new mDeporte();
        $deportes = $deporteModel->getTodos();
        require 'vistas/registro.php';
    }
    
    public function login() {
        $usuarioModel = new mUsuario();
        $user = $usuarioModel->login($_POST['usuario'], $_POST['password']);
        
        if ($user) {
            $_SESSION['usuario'] = $user['nombreUsuario'];
            $_SESSION['perfil'] = $user['perfil'];
            
            if ($user['perfil'] == 'c') {
                header("Location: index.php?c=cAdmin&a=menu");
            } else {
                echo "Solo coordinadores<br><a href='index.php'>Volver</a>";
            }
        } else {
            echo "Error<br><a href='index.php'>Volver</a>";
        }
    }
    
    public function registrar() {
        if (!isset($_POST['condiciones'])) {
            echo "Debe aceptar condiciones<br><a href='index.php?c=Usuario&a=showRegistro'>Volver</a>";
            return;
        }
        
        $usuarioModel = new mUsuario();
        if ($usuarioModel->usuarioExiste($_POST['usuario'])) {
            echo "Usuario ya existe<br><a href='index.php?c=Usuario&a=showRegistro'>Volver</a>";
            return;
        }
        
        $datos = [
            'usuario' => $_POST['usuario'],
            'nombre' => $_POST['nombre'],
            'password' => $_POST['password'],
            'correo' => $_POST['correo'],
            'telefono' => $_POST['telefono'] ?? null
        ];
        
        if ($usuarioModel->registrar($datos)) {
            $deporteModel = new mDeporte();
            $idUsuario = $deporteModel->getUltimoId();
            
            if (isset($_POST['deportes'])) {
                $deporteModel->asignarDeportes($idUsuario, $_POST['deportes']);
            }
            
            echo "Usuario añadido<br><a href='index.php'>Volver</a>";
        } else {
            echo "Error<br><a href='index.php'>Volver</a>";
        }
    }
    
    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}
?>