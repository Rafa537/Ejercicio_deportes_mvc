<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Gestión Deportes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        
        <form method="POST" action="index.php?c=cUsuario&a=registrar">
            <div class="form-group">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
            </div>
            
            <div class="form-group">
                <label>Nombre completo:</label>
                <input type="text" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label>Correo electrónico:</label>
                <input type="email" name="correo" required>
            </div>
            
            <div class="form-group">
                <label>Teléfono (opcional):</label>
                <input type="text" name="telefono">
            </div>
            
            <div class="checkbox-group">
                <label>Deportes:</label>
                <?php foreach($deportes as $d): ?>
                <label>
                    <input type="checkbox" name="deportes[]" value="<?= $d['idDeporte'] ?>">
                    <?= $d['nombreDep'] ?>
                </label>
                <?php endforeach; ?>
            </div>
            
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="condiciones" required>
                    Acepto las condiciones
                </label>
            </div>
            
            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" class="btn">Registrar</button>
                <a href="index.php" class="btn btn-volver">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>