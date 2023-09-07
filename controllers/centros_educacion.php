<?php

// CF = centro de formación

    class Elemento  {
        private $conexion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function agregarCF($nombre, $descripcion, $precio) {
            $query = "INSERT INTO centros_educacion (name_cta, direccion, id_municipio) VALUES (?, ?, ?)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("ssd", $nombre, $descripcion, $precio);
            return $stmt->execute();
           
        }

        public function obtenerCF() {
            $query = "SELECT name_cta, direccion, id_municipio FROM centros_educacion";
            $result = $this->conexion->query($query);
            $elementos = array();

            while ($row = $result->fetch_assoc()) {
                $elementos[] = $row;
            }

            return $elementos;
        }

        public function eliminarCF($id){
                $query = "DELETE FROM centros_educacion where id = $id";
                $result = $this->conexion->query($query);
        }
    }

 
    $elemento = new Elemento($conn);

    // Agregar elemento si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];

        $elemento->agregarCF($nombre, $descripcion, $precio);
    }

    // Obtener elementos
    $elementos = $elemento->obtenerCF();
   
    ?>