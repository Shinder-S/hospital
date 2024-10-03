<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/registro.css">
</head>
<body>
    <h1>Registro de Nuevo Usuario</h1>
    <form action="../modelo/guardar_usuario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        
        <input type="submit" value="Registrar">
    </form>
</body>
</html>