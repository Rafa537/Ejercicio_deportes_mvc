<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestión Deportes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Inicio de Sesión</h2>
        
        <form method="POST" action="index.php?c=cUsuario&a=login">
            <div class="form-group">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
            </div>
            
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            
            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" class="btn">Entrar</button>
                <a href="index.php" class="btn btn-volver">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>