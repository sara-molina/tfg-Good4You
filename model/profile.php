<?php

require ("conection.php");
session_start();

$_SESSION['user']= $_POST['user'];
$_SESSION['pass'] =  $_POST['pass'];

$_SESSION['modifyData'] = "
<div class =\"row\">
<div class=\"profile-form\">
    <p>Añade o modifica tus datos: </p> <br>
    <form id =\"forumarioDatos\" action=\"../view/showProfile.php\"  method=\"POST\">
    <input name = \"user\" type=\"hidden\" value='".$_SESSION['user']."'>
    <input name = \"pass\" type=\"hidden\" value='".$_SESSION['pass']."'>
        <div class= \"save-data-form\">
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"name\">Nombre</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"name\" type=\"text\" class=\"form-control\" id=\"name\" required>
                 </div>
            </div>
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"lastname\">Apellidos</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"lastname\" type=\"text\" class=\"form-control\" id=\"last-name\" required>
                 </div>
            </div>
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"street\">Calle</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"street\" type=\"text\" class=\"form-control\" id=\"street\" required>
                 </div>
            </div>  
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"number\">Número</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"number\" type=\"text\" class=\"form-control\" id=\"number\" required>
                 </div>
            </div>  
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"flat\">Piso</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"flat\" type=\"text\" class=\"form-control\" id=\"flat\" required>
                 </div>
            </div>  
            <div class =\"row\">
            <div class=\"col span-1-of-3\">
                <label for=\"letter\">Letra</label>
            </div>
            <div class=\"col span-2-of-3\">
                <input name = \"letter\" type=\"text\" class=\"form-control\" id=\"letter\" required>
             </div>
             <div class =\"row\">
            <div class=\"col span-1-of-3\">
                <label for=\"otherdata\">Otros datos</label>
            </div>
            <div class=\"col span-2-of-3\">
                <input name = \"otherdata\" type=\"text\" class=\"form-control\" id=\"otherdata\" required>
             </div>
             <div class =\"row\">
             <div class=\"col span-1-of-3\">
                 <label for=\"phone\">Teléfono</label>
             </div>
             <div class=\"col span-2-of-3\">
                 <input name = \"phone\" type=\"text\" class=\"form-control\" id=\"phone\" required>
              </div>                       
            <input id =\"guarda\" name = \"guarda\" type=\"submit\" class=\"btn btn-primary\" value=\"Guardar\"/>
        </form>
    </div>   
</div>
</div>";

$_SESSION['returnToProfile'] = "<form action=\"../view/showProfile.php\" method=\"POST\">
                                    <input name = \"user\" type=\"hidden\" value='".$_SESSION['user']."'>
                                    <input name = \"pass\" type=\"hidden\" value='".$_SESSION['pass']."'>
                                    <input name = \"profile\" type=\"submit\" class=\"btn \" value=\"Volver a mi perfil\"/>
                                </form>";           


if($GLOBALS['conn']){
 
   class Registry{
    
    public function showData(){
       $q="SELECT COUNT(*) as count FROM user_detail WHERE user_id = '".$_SESSION['user']."'";
        $request = mysqli_query($GLOBALS['conn'],$q); 
        $array = mysqli_fetch_array($request);

        if($array['count']>0){
  
            $q="SELECT * FROM user_detail WHERE user_id = '".$_SESSION['user']."'";
            $request = mysqli_query($GLOBALS['conn'],$q); 
            $array = mysqli_fetch_array($request);
    
            echo '
            <div class ="row">
                 <h2> Tus datos </h2>
            </div>
            <div class="data-container">
                <div class ="row">
                    <div class="col span-1-of-3">
                        <p> Nombre: 
                    </div>
                    <div class="col span-2-of-3">
                    '. $array['name'] . '<br>' .
                    '</div>
                </div>' . 
                '<div class ="row">
                <div class="col span-1-of-3">
                    <p> Apellido: 
                </div>
                <div class="col span-2-of-3">
                '. $array['last_name'] . '<br>' .
                '</div>
                </div>' .
                '<div class ="row">
                <div class="col span-1-of-3">
                    <p> Dirección: 
                </div>
                <div class="col span-2-of-3">
                '. $array['street'] . " " . $array['number'] . " " . $array['flat'] . " " . $array['letter'] . '<br>' .
                '</div>
                </div>' .  
                '<div class ="row">
                <div class="col span-1-of-3">
                    <p> Teléfono: 
                </div>
                <div class="col span-2-of-3">
                '. $array['phone'] . '<br>' .
                '</div>
                </div>';
                if($array['other_address_data'] != 0 ){
                    echo '<div class ="row">
                    <div class="col span-1-of-3">
                        <p> Otros datos: 
                    </div>
                    <div class="col span-2-of-3">
                    '. $array['other_address_data'] . '<br>' .
                    '</div>';
                };      
                 echo
                "</div>
                <form action=\"../view/showProfile.php\" method=\"POST\">
                    <input name = \"user\" type=\"hidden\" value='".$_SESSION['user']."'>
                    <input name = \"pass\" type=\"hidden\" value='".$_SESSION['pass']."'>
                    <input id =\"orders\" name = \"orders\" type=\"submit\" class=\"btn btn-primary\" value=\"Ver mis pedidos\"/>
                 </form>
                 </div>";
        }     
    }
    public function login(){
       $q="SELECT COUNT(*) as contar FROM users WHERE user_id =  '".$_SESSION['user']."' AND pass = '".$_SESSION['pass']."'";
        $request = mysqli_query($GLOBALS['conn'],$q);  
        $array = mysqli_fetch_array($request);
            if($array['contar']>0){
                $registry = new Registry();
                $registry->showData(); 
                echo $_SESSION['modifyData'];
            }
            if ($array['contar'] == 0 ) {
                echo "<div class=\"info-p-div\">
                <p class =\"info-p\">No estás registrado o tus datos son incorrectos</p>";
                echo "<a class=\"btn btn-full\" href=\"login.html\">Volver</a>";
                echo "</div>";
            }
    }  
    public function register(){
        $q="SELECT COUNT(*) as count FROM users WHERE user_id = '".$_SESSION['user']."'";
        $request = mysqli_query($GLOBALS['conn'],$q); 
        $array = mysqli_fetch_array($request);

        if($array['count']>0){
            echo "<div class=\"info-p-div\">
            <p class =\"info-p\"> Usuario ya registrado</p>
            </div>";
        }else{
            $q="INSERT INTO users (user_id,pass) VALUES ('".$_SESSION['user']."','".$_SESSION['pass']."')";
            $request = mysqli_query($GLOBALS['conn'],$q);  
            echo "<div class=\"info-p-div\"><p  class =\"info-p\">Te hemos registrado, ¡Gracias!<br><br><br></p>";    
            echo $_SESSION['returnToProfile'] . "</div>";                
                    }
    }

    public function saveOrUpdateUserData(){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['street'] = $_POST['street'];
        $_SESSION['number'] = $_POST['number'];
        $_SESSION['flat'] = $_POST['flat'];
        $_SESSION['letter'] = $_POST['letter'];
        $_SESSION['otherdata'] = $_POST['otherdata'];
        $_SESSION['phone'] = $_POST['phone'];
        $registry = new Registry();
        
        $q="SELECT COUNT(*) as count FROM user_detail WHERE user_id = '".$_SESSION['user']."'";
        $request = mysqli_query($GLOBALS['conn'],$q); 
        $array = mysqli_fetch_array($request);

        if($array['count']>0){
            $registry->updateUserData();
        }else{
            $registry->saveUserData();
        }
        echo "<div class=\"info-p-div\">
        <p class=\"info-p\"> Gracias " . $_SESSION['name'] . ", 
        hemos guardado tus datos. <br><p>";
        echo $_SESSION['returnToProfile'] . "</div>";
    }

    public function saveUserData( ){
        $q="INSERT INTO user_detail (user_id,name,last_name,street,number,flat,letter,other_address_data,phone) 
        VALUES ('".$_SESSION['user']."','".$_SESSION['name']."','".$_SESSION['lastname']."','".$_SESSION['street']."','".$_SESSION['number']."'
        ,'".$_SESSION['flat']."','".$_SESSION['letter']."','".$_SESSION['otherdata']."','".$_SESSION['phone']."')";
        $request = mysqli_query($GLOBALS['conn'],$q);  
       
    }

    public function updateUserData(){
        $q= "UPDATE user_detail SET
        user_id = '".$_SESSION['user']."',
        name = '".$_SESSION['name']."',
        last_name = '".$_SESSION['lastname']."',
        street ='".$_SESSION['street']."',
        number = '".$_SESSION['number']."',
        flat = '".$_SESSION['flat']."',
        letter = '".$_SESSION['letter']."',
        other_address_data = '".$_SESSION['otherdata']."',
        phone = '".$_SESSION['phone']."'
        WHERE
        user_id = '".$_SESSION['user']."'
        " ;
        $request = mysqli_query($GLOBALS['conn'],$q);  
       
    }

    public function showOrders(){
        $q="SELECT COUNT(*) as count FROM orders WHERE user_id = '".$_SESSION['user']."'";
        $request = mysqli_query($GLOBALS['conn'],$q); 
        $array = mysqli_fetch_array($request);

        if($array['count']>0){
            $q="SELECT * FROM orders o
            INNER JOIN order_products op on o.order_id = op.order_id 
            INNER JOIN products p on op.product_id = p.product_id
            WHERE user_id = '".$_SESSION['user']."'";
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
                            echo '<td>'.$row['name'].'</td></tr>'; 
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
            echo "<div class=\"info-p-div\">
            <p class =\"info-p\">No has hecho ningún pedido.</p>"
            . $_SESSION['returnToProfile'] .  "</div>";
        }
    } 

    }

}else{
    echo "no conectado";
}
?>
