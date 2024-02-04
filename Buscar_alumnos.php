<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Buscar Alumno</title>
    <style>
        body{
            padding: 10px;
        }
    </style>
</head>

<body>
    <h1>Buscar Alumno</h1><br>
    <form action="Buscar_alumnos.php" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>
        <button type="submit">Buscar</button>
    </form>

    <?php
    include 'accesomongo.php';
    buscar();
    ?>
    <br>
    <a href="Mostrar_alumnos.php"><button>Volver al listado</button></a>
</body>

</html>