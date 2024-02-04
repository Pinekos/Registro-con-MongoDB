<?php

require 'vendor/autoload.php';

use MongoDB\Client;

function buscar()
{
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    $coleccion = $cliente->escuela->alumnos;

    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        $filtro = ['nombre' => $nombre];
        $resultados = $coleccion->find($filtro);

        $resultadosArray = iterator_to_array($resultados);
        echo '<br>';
        if (count($resultadosArray) > 0) {
            echo "<ul>";
            foreach ($resultadosArray as $documento) {
                echo "<li>{$documento['nombre']} {$documento['apellido']} | Teléfono: {$documento['telefono']}</li>";
            }
            echo "</ul>";
        } else {
            echo "No hay alumnos con ese nombre.";
        }
    }
}


function mostrar()
{
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    $coleccion = $cliente->escuela->alumnos;

    $resultados = $coleccion->find();

    $resultadosArray = iterator_to_array($resultados);

    if (count($resultadosArray) > 0) {
        echo "<ul>";
        foreach ($resultadosArray as $documento) {
            echo "<li>{$documento['nombre']} {$documento['apellido']} | Teléfono: {$documento['telefono']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay alumnos.";
    }
}


function registrar()
{
    if (isset($_POST['nombre']) && isset($_POST['apellido'])) {
        $cliente = new Client("mongodb://localhost:27017");
        $coleccion = $cliente->escuela->alumnos;

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['number'];

        $documento = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono,
        ];

        $coleccion->insertOne($documento);

        echo "<br><br>Alumno insertado correctamente";
    }
}
?>