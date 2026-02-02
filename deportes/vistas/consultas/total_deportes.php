<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Deportes</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h2>Total de Deportes con Alumnos</h2>
        
        <div style="margin-bottom: 20px;">
            <a href="http://localhost:81/SERVIDOR/deportes/index.php?c=cAdmin&a=menu" class="btn btn-volver">← Volver al Menú</a>
        </div>
        
        <div style="text-align: center; padding: 40px;">
            <h3><?php echo $total; ?></h3>
            <p>deportes tienen alumnos inscritos</p>
        </div>
    </div>
</body>
</html>