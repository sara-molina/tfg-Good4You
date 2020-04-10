<?php

require ("conexion.php");
session_start();



if($GLOBALS['conn']){

   class Products{

    public function showProducts(){

        $q="SELECT * FROM products";
        $request = mysqli_query($GLOBALS['conn'],$q); 
        while ($fila = mysqli_fetch_assoc($request)){
            echo " <div class=\"row\">
            <div class = \"col span-1-of-3 meal \">
                <figure class =\"meal-photo clearfix\">" .  "<img src=\"resources/src/".$fila['img']."\" alt=\"Ensalada de tallarines fríos con huevo, kikos y langostinos\">
            </figure>   
        </div>
        <div class = \"col span-2-of-3 meal\">
            <h3>".$fila['name']."</h3>
            <p class=\"meal-description\">".$fila['description']."</p>
            <p class=\"meal-price\">".$fila['price']."€</p>
        </div>
    </div>";
        }
        
    }

   }
        
}else{
    echo "no conectado";
}
?>
