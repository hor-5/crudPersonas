<?php


class Prospecto{
    
    private $id;
    private $nombre; 
    private $telefono;
    private $direccion;
    private $fecha_nac;
    private $sexo;
    private $email;

    public function __construct(){
        
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
        return $this;
    }

    public function cargarFormulario($request){
        $this->id= isset($request["id"]) ? $request["id"] : "";
        $this->nombre = isset($request["txtNombre"]) ? $request["txtNombre"] : "";
        $this->direccion = isset($request["txtDireccion"]) ? $request["txtDireccion"] : "";
        $this->telefono = isset($request["txtTelefono"]) ? $request["txtTelefono"] : "";
        $this->fecha_nac = isset($request["txtFecha_nac"]) ? $request["txtFecha_nac"] : "";
        $this->sexo = isset($request["txtSexo"]) ? $request["txtSexo"] : "";
        $this->email = isset($request["txtEmail"]) ? $request["txtEmail"] : "";
    }

    public function insertar(){

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "INSERT INTO clientes (direccion,
                                  telefono,
                                  nombre,
                                  fecha_nac,
                                  sexo,
                                  email) 
                VALUES ('" .$this->direccion ."',
                        '" .$this->telefono ."',
                         '" .$this->nombre ."',
                         '" .$this->fecha_nac ."',
                          '" .$this->sexo ."' ,
                          '" .$this->email ."')";
        $mysqli->query($sql);
        $this->idprospecto = $mysqli->insert_id;
        $mysqli->close();
    }

    public function actualizar(){

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "UPDATE clientes SET
                direccion = '" . $this->direccion . "',
                telefono = '" . $this->telefono . "',
                nombre = '" . $this->nombre . "',
                fecha_nac = '" . $this->fecha_nac . "',
                sexo =  '" . $this->sexo . "',
                email = '" . $this->email . "'
                WHERE id = " . $this->id;

        $mysqli->query($sql);
        $mysqli->close();
    }

    public function eliminar(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "DELETE FROM clientes WHERE id = " . $this->id;
        //Ejecuta la query
        $mysqli->query($sql);
        $mysqli->close();
    }

    public function obtenerPorId(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "SELECT id, 
                        direccion, 
                        telefono, 
                        nombre, 
                        fecha_nac, 
                        sexo,
                        email
                FROM clientes 
                WHERE id = " . $this->id;
        $resultado = $mysqli->query($sql);

        if ($fila = $resultado->fetch_assoc()) {
            //Convierte el resultado en un array asociativo
            
            $this->direccion = $fila["direccion"];
            $this->telefono = $fila["telefono"];
            $this->nombre = $fila["nombre"];
            $this->fecha_nac = $fila["fecha_nac"];
            $this->sexo = $fila["sexo"];
            $this->email = $fila["email"];
        }
        $mysqli->close();
    }

    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE);
        $sql = "SELECT id,
               direccion,
               telefono,
               nombre,
               fecha_nac,
               sexo,
               email FROM clientes ORDER BY id DESC";
        $resultado = $mysqli->query($sql);

        $aResultado = array();
        if ($resultado) {
            //Convierte el resultado en un array asociativo
            while ($fila = $resultado->fetch_assoc()) {
                $clienteAux = new Prospecto();
                $clienteAux->id = $fila["id"];
                $clienteAux->direccion = $fila["direccion"];
                $clienteAux->telefono = $fila["telefono"];
                $clienteAux->nombre = $fila["nombre"];
                $clienteAux->fecha_nac = $fila["fecha_nac"];
                $clienteAux->sexo = $fila["sexo"];
                $clienteAux->email = $fila["email"];
                $aResultado[] = $clienteAux;
            }
        }
        return $aResultado;
    }

}

?>