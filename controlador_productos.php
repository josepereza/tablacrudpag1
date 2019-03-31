<?php 

require "modelo_productos.php";

require "vista_cabezera_productos.html";

      
  $model2=new Crud();
    
     if(isset($_POST['ordnar']))
        {
        	if($_POST['ordnar']=="vn"){
           	$ordnar2="descripcion";}
           	
         elseif($_POST['ordnar']=="nn"){
           	$ordnar2="seccion";}  	
           	
        	elseif($_POST['ordnar']=="gd"){
        		$ordnar2="precio";}
        		
        	else 	
        	 {$ordnar2="id_articulo";}
        }else {
                      
         $ordnar2="id_articulo";
        }
     
        
        
        
       if(isset($_POST['gra1']))
        {
        	if($_POST['gra1']=="gd"){
        		$id=$_POST['id']; 
        		
        		$model2->actualizarDatos($id,$_POST['des'][$id],$_POST['sec'][$id],$_POST['pre'][$id]);
        		
        		
                }
        	else if($_POST['gra1']=="bd")
        	{
        		
        		
        		$model2->insertarDatos($_POST['des'][0],$_POST['sec'][0],50,$_POST['pre'][0]);
    
        	
        	}
        	
        	else if($_POST['gra1']=="borrar")
        	
        	{
        		$id=$_POST['ida'];
        		$model2->borrarDatos($_POST['id']);
        		
    echo "Record deleted successfully";        	
        	
        	}
        }  
        
        
        
        
         echo "<form name='f' action='controlador_productos.php' method='post'>";
        	       echo "<input name='ordnar' type='hidden'>";
        	       echo "</form>";  	       

       echo "<form name='f1' action='controlador_productos.php' method='post'>";
        	       echo "<input name='gra1' type='hidden'>";
        	       echo "<input name='id' type='hidden'>";
        	       
        	$por_pagina=10;
        	
        if (isset($_GET['pagina'])){
            $pagina=$_GET['pagina'];
            $ordnar2=$_GET['ordnar3'];
        }else{
          $pagina=1;
         
        }
        $empieza=($pagina-1)*$por_pagina;      
        	      
        	     
     
        require "vista_productos.php";
        
        	                 
         $matrizProductos=$model2->leerDatos9($ordnar2,$por_pagina,$empieza);
         
         
         //segunda forma de hacerlo seria:
         
         //   $model2->leerDatos8($ordnar2,$por_pagina,$empieza);
          
         //   $matrizProductos=$model2->rows;
                  
         
       
          require "vista2_productos.php";
          
?>
     