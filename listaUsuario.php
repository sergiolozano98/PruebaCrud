<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista usuario</title>
  </head>
  <body>
    <?php
    //incluimos la bd
    include 'db.php';
    $nba=new db();
    //devolvemos los equipos
   $tabla=$nba->devolverusuarios();
   foreach ($tabla as $fila) {
     echo $fila["nombre"];
     echo "<br>";
     echo "<a href='borrar.php?nombre=".$fila["nombre"]."'>Borrar Registro</a>";
     echo "<br>";
   }
     ?>
  </body>
</html>
