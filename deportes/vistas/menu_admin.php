<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Gestión Deportes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="usuario-info">
            <p>Usuario: <?php echo $_SESSION['usuario']; ?> | Perfil: Coordinador</p>
        </div>
        
        <h2>Panel de Administración</h2>
        
        <div class="menu">
            <a href="index.php?c=cAdmin&a=consulta1">Usuarios con Deportes</a>
            <a href="index.php?c=cAdmin&a=consulta2">Total de Deportes</a>
            <a href="index.php?c=cAdmin&a=consulta3">Deportes con Usuarios</a>
            <a href="index.php?c=cUsuario&a=logout" class="btn-salir">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>