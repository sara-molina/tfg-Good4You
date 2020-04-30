<?php

require ("conexion.php");
session_start();

$_SESSION['user']= $_POST['user'];

$_SESSION['form-counter']=0;


$_SESSION['returnToProfile'] = "<form action=\"../view/showProfile.php\" method=\"POST\">
                                    <input name = \"user\" type=\"hidden\" value='".$_SESSION['user']."'>
                                    <input name = \"pass\" type=\"hidden\" value='".$_SESSION['pass']."'>
                                    <input name = \"profile\" type=\"submit\" class=\"btn \" value=\"Volver a mi perfil\"></input>
                                <form>";  


if($GLOBALS['conn']){
 
   class Order{

   }
}else{
    echo "no conectado";
}
?>
