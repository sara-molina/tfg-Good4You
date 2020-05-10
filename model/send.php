<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer/PHPMailer.php"); 
require ("PHPMailer/SMTP.php");      
require ("PHPMailer/Exception.php");

class Send {
 
    public function sendMail() {
        $mail = new PHPMailer(); 
    
        $mail->IsSMTP(); 
    try {
    //------------------------------------------------------
        $name=$_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $correo_emisor="good4youcorreo@gmail.com";     
        $nombre_emisor= $name;               
        $contrasena="good4you90.";          
        $correo_destino="good4yougestordecorreo@gmail.com";     
        $nombre_destino="Good4You";               
        $send ="De: $name \n";
        $send .="con e-mail: $email \n";
        $send .="teléfono $phone \n";
        $send .="y mensaje: $message";
            
        
        $mail->SMTPAuth   = true;                  
        $mail->SMTPSecure = "ssl";                
        $mail->Host       = "smtp.gmail.com";      
        $mail->Port       = 465;                  
        $mail->Username   = $correo_emisor;         
        $mail->Password   = $contrasena;           
        $mail->AddReplyTo($correo_emisor, $nombre_emisor);

        $mail->AddAddress($correo_destino, $nombre_destino);
      
        $mail->SetFrom($correo_emisor, $nombre_emisor);

        $mail->Subject = 'El usuario  '. $email . ' contacta con nosotros';
       
        $mail->AltBody = 'para ver el mensaje necesita un cliente de correo compatible con HTML.';
        
        $mail->MsgHTML($send);
 
        $mail->Send();
        echo "
        <section>
        <div class=\"mail-send-div\">
        <div class=\"info-p-div\">
        <p class =\"info-p\">Mensaje enviado</p>";
        echo "<a class=\"btn btn-full\" href=\"index.html\">Ir al inicio</a>";
        echo "</div></div></section>";
        } catch (phpmailerException $e) {
        echo $e->errorMessage(); 
        } catch (Exception $e) {
        echo $e->getMessage(); 
        }
    }   
}
 ?>
