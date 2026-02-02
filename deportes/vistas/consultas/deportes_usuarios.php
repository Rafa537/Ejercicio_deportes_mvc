<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportes y Usuarios</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h2>Deportes con Total de Usuarios</h2>
        
        <div style="margin-bottom: 20px;">
            <a href="http://localhost:81/SERVIDOR/deportes/index.php?c=cAdmin&a=menu" class="btn btn-volver">← Volver al Menú</a>
        </div>
        
        <?php if (empty($deportes)): ?>
            <p class="mensaje mensaje-info">No hay deportes registrados</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Deporte</th>
                        <th>Total de Usuarios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($deportes as $d): ?>
                    <tr>
                        <td><?php echo htmlspecialchars(ucfirst($d['nombreDep'])); ?></td>
                        <td><?php echo $d['total']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>