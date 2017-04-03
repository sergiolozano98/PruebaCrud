<html>
  <head>
    <meta charset="utf-8">
    <title>Borrar Usuario</title>
  </head>
  <body>
  <?php
  //Incluir la clase de conexion
  include "db.php";
  $user=new db();
  //insertar un usuario
  $resultadoBorrar=$user->borrarusuario($_GET["nombre"]);
  //Devolver el usuario insertado
  if($resultadoBorrar==false){
    echo "Nombre".$_GET["nombre"]." borrado";
  }else{
    echo "Error en el borrado";
  }
  ?>
  </body>
</html>
