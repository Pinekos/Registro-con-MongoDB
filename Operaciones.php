<?php

require 'vendor/autoload.php';

use MongoDB\Client;

function buscar()
{
    $cliente = new MongoDB\Client("mongodb://localhost:27017");
    //$cliente = new MongoDB\Client("mongodb+srv://bpilar12:mongoDB@cluster0.z3ddxdf.mongodb.net/?retryWrites=true&w=majority");
    //$cliente = new MongoDB\Client("mongodb+srv://bpilar12:mongoDB@cluster0.z3ddxdf.mongodb.net/agenda?retryWrites=true&w=majority")
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
                echo "<li>{$documento['nombre']} {$documento['apellido']}</li>";
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
            echo "<li>{$documento['nombre']} {$documento['apellido']}</li>";
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

        $documento = [
            'nombre' => $nombre,
            'apellido' => $apellido,
        ];

        $coleccion->insertOne($documento);

        echo "<br><br>Alumno insertado correctamente";
    }
}
?>