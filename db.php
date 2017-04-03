<?php
/**
 * Permitir la conexion contra la base de datos
 */
class db
{
  //Atributos necesarios para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="usuario";
  //Conector
  private $conexion;
  //Propiedades para controlar errores
  private $error=false;
  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }
  //Funcion para saber si hay error en la conexion
  function hayError(){
    return $this->error;
  }
  //Funciones para la devolucion de resultados
  public function devolverusuarios(){
    $tabla=[];
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT * FROM usuario ");
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }
  public function devolverEquiposConf(){
    if($this->error==false){
      $resultado = $this->conexion->query("SELECT nombre,conferencia FROM equipos");
      return $resultado;
    }else{
      return null;
    }
  }
  //la funcion insertarUsuario le pasamos los datos introducidos anteriormente en el index y con el insert into introducimos los valor en la tabla
  function insertarUsuario($nombre,$apellidos,$edad){
  $sqlinsert="INSERT INTO usuario(nombre,apellidos,edad) VALUES ('".$nombre."','".$apellidos."','".$edad."')";
  if (!$this->conexion->query($sqlinsert)) {
   echo "Fallo en la creacion de la tabla:".$this->conexion->connect_errno;
   return False;
  }
  }
  function actualizarUsuario($nombre,$apellidos,$edad){
  $sqlinsert="UPDATE usuario set nombre='".$nombre."',apellidos='".$apellidos."',edad='".$edad."' where nombre='".$nombre."'";
  if (!$this->conexion->query($sqlinsert)) {
   echo "Fallo en la creacion de la tabla:".$this->conexion->connect_errno;
   return False;
  }
  }
  //con esta funcion estamos pasando el nombre ultimo insertado, y en la consulta le pasamos en el where el nombre del usuario
  public function ultimoUsuario($nombre){
    if($this->error==false){
      $resultado3 = $this->conexion->query("SELECT * FROM usuario where nombre='".$nombre."'");
      return $resultado3;
    }else{
      return null;
    }
  }
  function borrarusuario($usuario){
  $sqlinsert="DELETE FROM usuario WHERE nombre='".$usuario."'";
  if (!$this->conexion->query($sqlinsert)) {
   echo "Fallo en la creacion de la tabla:".$this->conexion->connect_errno;
   return False;
  }
  }
}
 ?>
