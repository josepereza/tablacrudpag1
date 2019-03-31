
<?php
         $query = $model2->conexion->query ("select * from articulos");
         $total_registros=$query->rowCount();
         $total_paginas=ceil($total_registros / $por_pagina);
         echo "<a href='controlador_productos.php?pagina=1"."&ordnar3=".$ordnar2."'>".'Primera '. "</a>";
         for ($i=1; $i <=$total_paginas; $i++){

             echo "<a href='controlador_productos.php?pagina=".$i."&ordnar3=".$ordnar2."'>".$i." "."</a>";
       }

             echo "<a href='controlador_productos.php?pagina=".$total_paginas."&ordnar3=".$ordnar2."'>".' Ultima '. "</a>";
          ?>
      