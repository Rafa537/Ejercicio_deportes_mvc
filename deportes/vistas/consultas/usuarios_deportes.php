<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios y Deportes</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h2>Usuarios y sus Deportes</h2>
        
        <div style="margin-bottom: 20px;">
            <a href="http://localhost:81/SERVIDOR/deportes/index.php?c=cAdmin&a=menu" class="btn btn-volver">← Volver al Menú</a>
        </div>
        
        <?php if (empty($usuarios)): ?>
            <p class="mensaje mensaje-info">No hay usuarios registrados</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Deportes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $u): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($u['nombreUsuario']); ?></td>
                        <td><?php echo htmlspecialchars($u['apeNombre']); ?></td>
                        <td><?php echo htmlspecialchars($u['correo']); ?></td>
                        <td><?php echo $u['telefono'] ?: 'No registrado'; ?></td>
                        <td><?php echo $u['deportes'] ?? 'Sin deportes'; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>