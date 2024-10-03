<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="assets/session.css">
</head>
<body>
    <div id="menu">
        <ul>
            <li>Home</li>
            <li class="cerrar-sesion"><a href="modelo/cerrarsession.php">Cerrar sesión</a></li>
        </ul>
    </div>

    <section>
        <?php if(isset ($_SESSION['usuario'])): ?>
        <h1>Bienvenido <?php echo $usuario->getUsuario() ;?> </h1>
        <?php else: ?>
            <h1>No hay sesion activa.Por favor , inicie sesión.</h1>
       <?php endif;?>
    </section>
    
</body>
</html>