<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insertar Usuario</title>
  </head>
  <body>
<?php
if (isset($_POST["nombre"])&&!empty($_POST['nombre'])&&(isset($_POST["apellidos"]))&&!empty($_POST['apellidos'])&&(isset($_POST["edad"]))&&(!empty($_POST['edad']))){
include 'db.php';
echo "Se ha insetado correctamente:";
//creamos un nuevo usuario
$usuario=new db();
//le pasamos a la funcion insertar usuario los parametros anteriormente introducidos en el index.php
$usuario->insertarUsuario($_POST["nombre"],$_POST["apellidos"],$_POST["edad"]);
//le pasamos el nombre del usuario insertado para que la funcion pueda pasarle a la consulta el nombre y asi sacar el ultimo nombre insertado
$devolver = $usuario->ultimoUsuario($_POST["nombre"]);
$fila = $devolver->fetch_assoc();
  echo "<br>";
  echo $fila["nombre"];
  echo "<br>";
  echo $fila["apellidos"];
  echo "<br>";
  echo $fila["edad"];
  echo "<br>";
echo "<a href='actualizar.php?nombre=".$fila["nombre"]."&apellidos=".$fila["apellidos"]."&edad=".$fila["edad"]."'>Actualizar Registro</a></br>";
echo "<a href='listaUsuario.php?nombre=".$fila["nombre"]."'>Borrar Registro</a>";
}
 ?>
  </body>
</html>
