<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar</title>
  </head>
  <body>
<?php
include 'db.php';
echo "Se ha insetado correctamente:";
$equipo=new db();
$equipo->actualizarUsuario($_POST["nombre"],$_POST["apellidos"],$_POST["edad"]);
$devolver = $equipo->ultimoUsuario($_POST["nombre"]);
while ($fila = $devolver->fetch_assoc()){
  echo "<br>";
  echo $fila["nombre"];
  echo "<br>";
  echo $fila["apellidos"];
  echo "<br>";
  echo $fila["edad"];
}
echo "<br>";
echo "<a href='actualizar.php?nombre=".$fila["nombre"]."&apellidos=".$fila["apellidos"]."&edad=".$fila["edad"]."'>Actualizar Registro</a></br>";
echo "<a href='listaUsuario.php?nombre=".$fila["nombre"]."'>Borrar Registro</a>";

 ?>
  </body>
</html>
