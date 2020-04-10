<?php

require ("conexion.php");
session_start();

$_SESSION['user']= $_POST['user'];

$_SESSION['returnToProfile'] = "<form action=\"../view/showProfile.php\" method=\"POST\">
                                    <input name = \"user\" type=\"hidden\" value='".$_SESSION['user']."'>
                                    <input name = \"pass\" type=\"hidden\" value='".$_SESSION['pass']."'>
                                    <input name = \"profile\" type=\"submit\" class=\"btn \" value=\"Volver a mi perfil\"></input>
                                <form>";  


if($GLOBALS['conn']){
 
   class Order{

    public function showOrders(){
        $q="SELECT COUNT(*) as count FROM orders WHERE user_id = '".$_SESSION['user']."'";
        $request = mysqli_query($GLOBALS['conn'],$q); 
        $array = mysqli_fetch_array($request);

        if($array['count']>0){
            $q="SELECT * FROM orders WHERE user_id = '".$_SESSION['user']."'";
            $peticion = mysqli_query($GLOBALS['conn'],$q);           
        
            echo '<div class ="row">
                         <h3> Tus órdenes </h3>
                  </div>
                <div class ="row orders-div">
                    <table>
                        <tr>
                            <th>Nº de pedido</th>
                            <th>Productos</th>
                        </tr>';
                        while($row=mysqli_fetch_array($peticion)){
                            echo '<tr>' . '<td>'.$row['order_id'].'</td>';
                            echo '<td>'.$row['product_id'].'</td></tr>'; 
                        };
                echo '
                    </table>
                    </div>
                ' ."
                <div class =\"row\">";
                echo $_SESSION['returnToProfile'];

                echo "<form>
            </div>
            </div>";
        }else {
            echo "<p class =\"info-p-button\">No has hecho ningún pedido.</p>";
            echo $_SESSION['returnToProfile'];
        }
    }

   }
}else{
    echo "no conectado";
}
?>
