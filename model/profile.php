<?php

require ("conexion.php");
session_start();

$_SESSION['user']= $_POST['user'];
$_SESSION['pass'] =  $_POST['pass'];
$_SESSION['modifyData'] = "

<div class =\"row\">
<div class=\"login-form\">
    <p>Añade o modifica tus datos: </p> <br>
    <form id =\"forumarioDatos\" action=\"../view/showProfile.php\"  onsubmit = \"return validateData()\" method=\"POST\">
    <input name = \"user\" type=\"hidden\" value='".$_SESSION['user']."'>
    <input name = \"pass\" type=\"hidden\" value='".$_SESSION['pass']."'>
        <div class=\"form-group\">
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"name\">Nombre</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"name\" type=\"text\" class=\"form-control\" id=\"name\">
                 </div>
            </div>
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"lastname\">Apellidos</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"lastname\" type=\"text\" class=\"form-control\" id=\"street\">
                 </div>
            </div>
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"street\">Calle</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"street\" type=\"text\" class=\"form-control\" id=\"street\">
                 </div>
            </div>  
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"number\">Número</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"number\" type=\"text\" class=\"form-control\" id=\"street\">
                 </div>
            </div>  
            <div class =\"row\">
                <div class=\"col span-1-of-3\">
                    <label for=\"flat\">Piso</label>
                </div>
                <div class=\"col span-2-of-3\">
                    <input name = \"flat\" type=\"text\" class=\"form-control\" id=\"street\">
                 </div>
            </div>  
            <div class =\"row\">
            <div class=\"col span-1-of-3\">
                <label for=\"letter\">Letra</label>
            </div>
            <div class=\"col span-2-of-3\">
                <input name = \"letter\" type=\"text\" class=\"form-control\" id=\"street\">
             </div>
             <div class =\"row\">
            <div class=\"col span-1-of-3\">
                <label for=\"otherdata\">Otros datos</label>
            </div>
            <div class=\"col span-2-of-3\">
                <input name = \"otherdata\" type=\"text\" class=\"form-control\" id=\"street\">
             </div>
             <div class =\"row\">
             <div class=\"col span-1-of-3\">
                 <label for=\"phone\">Teléfono</label>
             </div>
             <div class=\"col span-2-of-3\">
                 <input name = \"phone\" type=\"text\" class=\"form-control\" id=\"street\">
              </div>                       
            <input id =\"guarda\" name = \"guarda\" type=\"submit\" class=\"btn btn-primary\" value=\"Guardar\"></input>
        </form>
    </div>   
</div>
</div>";

            


if($GLOBALS['conn']){
 
   class Registro{
    
    public function muestraDatos(){
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
            <div class="data-form">
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
                </div>' .      
                '<div class ="row">
                <div class="col span-1-of-3">
                    <p> Otros datos: 
                </div>
                <div class="col span-2-of-3">
                '. $array['other_address_data'] . '<br>' .
                '</div>
                </div>
                </div>'         
                    ;
                       

        }     
    }
    public function login(){
       $q="SELECT COUNT(*) as contar FROM users WHERE user_id =  '".$_SESSION['user']."' AND pass = '".$_SESSION['pass']."'";
        $request = mysqli_query($GLOBALS['conn'],$q);  
        $array = mysqli_fetch_array($request);
            if($array['contar']>0){
                $registro = new Registro();
                $registro->muestraDatos(); 
                echo $_SESSION['modifyData'];

                
            }
            if ($array['contar'] == 0 ) {
                echo '<p>No estás registrado o tus datos son incorrectos</p>'; 
            }
    }  
    public function registrar(){
        $q="SELECT COUNT(*) as count FROM users WHERE user_id = '".$_SESSION['user']."'";
        $request = mysqli_query($GLOBALS['conn'],$q); 
        $array = mysqli_fetch_array($request);

        if($array['count']>0){
            echo "<p> <span> Usuario ya registrado </span></p>";
        }else{
            $q="INSERT INTO users (user_id,pass) VALUES ('".$_SESSION['user']."','".$_SESSION['pass']."')";
            $request = mysqli_query($GLOBALS['conn'],$q);  
            echo "<p> <span>Te hemos registrado, ¡Gracias! </span> <br><br></p><br>";    
            echo $_SESSION['modifyData'];                
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
        $registro = new Registro();
        
        $q="SELECT COUNT(*) as count FROM user_detail WHERE user_id = '".$_SESSION['user']."'";
        $request = mysqli_query($GLOBALS['conn'],$q); 
        $array = mysqli_fetch_array($request);

        if($array['count']>0){
            $registro->updateUserData();
            echo("tienedatos");
        }else{
            $registro->saveUserData();
        }
        echo "<p> <span>" . "Gracias " . $_SESSION['name'] . ", " ."
        hemos guardado tus datos. <br></span><p>
        <form action=\"../view/showProfile.php\" method=\"POST\">
            <input name = \"user\" type=\"hidden\" value='".$_SESSION['user']."'>
            <input name = \"pass\" type=\"hidden\" value='".$_SESSION['pass']."'>
            <input id =\"profile\" name = \"profile\" type=\"submit\" class=\"btn btn-primary\" value=\"Volver a mi perfil\"></input>
        <form>";
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
    }

}else{
    echo "no conectado";
}
?>
