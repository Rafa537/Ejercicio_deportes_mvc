<?php
    session_start();
    function cargarClase($clase) {
        $partes = explode('\\', $clase);
        $archivo = end($partes) . '.php';
        
        if (file_exists("controladores/$archivo")) {
            require_once "controladores/$archivo";
        } elseif (file_exists("modelos/$archivo")) {
            require_once "modelos/$archivo";
        } elseif (file_exists("core/$archivo")) {
            require_once "core/$archivo";
        }
    }
    spl_autoload_register('cargarClase');

    // Enrutamiento básico
    if (isset($_GET['c']) && isset($_GET['a'])) {
        $controller = $_GET['c'];
        $accion = $_GET['a'];
        
        if (class_exists($controller)) {
            $obj = new $controller();
            if (method_exists($obj, $accion)) {
                $obj->$accion();
            } else {
                mostrarMenu();
            }
        } else {
            mostrarMenu();
        }
    } else {
        mostrarMenu();
    }

    function mostrarMenu() {
        if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'c') {
            header("Location: index.php?c=cAdmin&a=menu");
            exit;
        }
        ?>
        <h1>Menu Principal</h1>
        <a href="index.php?c=cUsuario&a=showLogin">Login</a><br>
        <a href="index.php?c=cUsuario&a=showRegistro">Registro</a>
        <?php
    }
?>