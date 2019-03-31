
<?php 

 foreach($matrizProductos as $fila){
        	$id=$fila["id_articulo"];
        	           
         	     echo "<tr><td><input name='[ida][$id]' value='".$fila["id_articulo"]."' size='6' readonly='readonly'></td><td>
        	      <input name='des[$id]' value='" .$fila['descripcion']."'size='30'</td><td>
        	      <input name='sec[$id]' value='" .$fila['seccion']."'size='12'</td><td>
        	      <input name='pre[$id]' value='" .$fila["precio"]."'size='10'</td><td>"
        	                     ."<a href='javascript:grabar(1,$id);'>modificar</a>"."</td><td>"
        	                   
        	                    ."<a href='javascript:grabar(3,$id);'>borrar</a>"."</td></tr>";
        	                   
                       }
  
           echo"</table>";  
           echo"</form>";
     ?>
     
     
     
     
  <!-- Moduo de paginacion. -->
    
     
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
      
   
   </div>
   </div>
   </div>
    <!-- Optional JavaScript -->
    
    <script type="text/javascript" >
       function ordenar(ordnar) {
       	if (ordnar==2)
        		document.f.ordnar.value = "vn";
         else if (ordnar==3) 
            document.f.ordnar.value = "nn";
           else if (ordnar==4)
            document.f.ordnar.value = "gd"; 
            else 	  
            document.f.ordnar.value = "of";		
        
        document.f.submit();
       } 
              
        function grabar(gra1,id) {
       	if (gra1==1)
        		document.f1.gra1.value = "gd";
         else if(gra1==2)   
            document.f1.gra1.value = "bd";	
          else if (gra1==3) {
          	
          	   if (confirm("Desea borrar el registro con id  " + id + " ?")){
          	   	alert('El registro ha sido eliminado correctamente!!!');
               document.f1.gra1.value = "borrar";    }      	
          }  	
        document.f1.id.value = id;
        document.f1.submit();
       } 
      
      
       
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>