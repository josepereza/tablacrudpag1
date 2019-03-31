
 
<?php

class Conexion{
     
   public function conectar(){
   	
       try {
       
           $conexion=new PDO('mysql:host=localhost; dbname=ejemplo', 'root', '3266root');
           $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $conexion->exec("SET CHARACTER SET UTF8");

     
         
       } catch (Exception $e)   {	
   	  
   	    die("Error" . $e->getMessage());
   	    echo "Linea del error" . $e->getLine();
   	
   	}
   	return $conexion;

}
}



class Crud{
	
	public $rows;
	public $conexion;
	
function __construct(){
	
	$model = new Conexion;
	$this->conexion = $model->conectar();


}	
	



function borrarDatos($id) {
   $sql = "DELETE FROM articulos WHERE id_articulo=$id";
  try {
    $this->conexion->exec($sql);
   
     echo "Record deleted successfully";       
      
      
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}





function leerDatos6($ordenar) {
	
	 echo "<h3>LISTADO 6 - leerDatos6</h3>";
	
			
  $sql = "select *  FROM articulos order by $ordenar"; // where nombre like 'to%'
  try {
    $sentencia = $this->conexion->query($sql);
    
       
    $row=$sentencia->fetchAll();
    
    foreach   ($row as $fila) {
           
      $this->rows[] =$fila;
     
    }
   $sentencia = null;
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}


function leerDatos7($ordenar,$por_pagina,$empieza) {
	 
  $sql = "select *  FROM articulos order by  $ordenar limit $empieza, $por_pagina";
  try {
    $sentencia = $this->conexion->query($sql);
    
        
    while   ($fila=$sentencia->fetch()){
     
     $id=$fila["id_articulo"];
        	           
         	     echo "<tr><td><input name='[ida][$id]' value='".$fila["id_articulo"]."' size='6' readonly='readonly'></td><td>
        	      <input name='des[$id]' value='" .$fila[descripcion]."'size='35'></td><td>
        	      <input name='sec[$id]' value='" .$fila[seccion]."'size='12'></td><td>
        	      <input name='pre[$id]' value='" .$fila[precio]."'size='10'></td><td>"
        	                     ."<a href='javascript:grabar(1,$id);'>modificar</a>"."</td><td>"
        	                   
        	                    ."<a href='javascript:grabar(3,$id);'>borrar</a>"."</td></tr>";
        	                   
                       }
  
           echo"</table>";  
           echo"</form>";
         
   
     
   $sentencia = null;
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}

function leerDatos8($ordenar,$por_pagina,$empieza)  {
	 
  $sql = "select *  FROM articulos order by  $ordenar limit $empieza, $por_pagina";
  try {
    $sentencia = $this->conexion->query($sql);
    
        
    while   ($fila=$sentencia->fetch()){
     
      $this->rows[]=$fila;
         
    }
     
   $sentencia = null;
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
  
 
}



function leerDatos9($ordenar,$por_pagina,$empieza)  {
	 
  $sql = "select *  FROM articulos order by  $ordenar limit $empieza, $por_pagina";
  try {
    $sentencia = $this->conexion->query($sql);
    
    $matrizProductos=array();    
    while   ($fila=$sentencia->fetch()){
     
      $matrizProductos[]=$fila;
         
    }
     
   $sentencia = null;
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
  
 return $matrizProductos;
}

function insertarDatos($descripcion, $seccion, $stock, $precio) {
	

	  $sql="insert into articulos(descripcion,seccion,stock,precio) value(:descripcion,:seccion, :stock,:precio)";
try {
    $sentencia = $this->conexion->prepare($sql);
    
    
    $sentencia->bindValue(':descripcion', $descripcion); 
    $sentencia->bindValue(':seccion', $seccion); 
     $sentencia->bindValue(':stock', $stock); 
    $sentencia->bindValue(':precio', $precio);   
    
    $sentencia->execute();
    
   $sentencia = null;
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}



function actualizarDatos ($id,$descripcion,$seccion,$precio){

	
	$sql="update articulos set 
    		 
    descripcion=:descri,
    seccion=:sec,
    precio=:pre
    
        
    where id_articulo=$id";   
	  
  try {
    $sentencia = $this->conexion->prepare($sql);
   
    $sentencia->bindValue(":descri", $descripcion);
    $sentencia->bindValue(":sec", $seccion);
    $sentencia->bindValue(":pre",$precio);
   
    $sentencia->execute();
    
    
   $sentencia = null;
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}
}
?>