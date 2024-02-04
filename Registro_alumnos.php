<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Insertar Alumno</title>
  <style>
        body{
            padding: 10px;
        }
    </style>
</head>

<body>
  <h1>Insertar Alumno</h1><br>
  <form action="Registro_alumnos.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <br><br>
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" required>
    <br><br>
    <label for="number">Teléfono:</label>
    <input type="text" name="number" required>
    <br><br>
    <button type="submit">Insertar</button>
  </form>
  <br>
  <a href="Mostrar_alumnos.php"><button>Volver al listado</button></a>

  <?php
    include 'accesomongo.php';
    registrar();
  ?>

</body>

</html>
