<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer.php"); //Necesita estos dos archivos para furrular
require ("SMTP.php");      // este en concreto es por si queremos utilizar un server smtp para sendMail no hace falta.
require ("Exception.php");

class Send {


 
    public function sendMail() {
        $mail = new PHPMailer(); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores.
    
        $mail->IsSMTP(); // Se especifica a la clase que se utilizará SMTP

    try {
    //------------------------------------------------------
        $name=$_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $correo_emisor="good4youcorreo@gmail.com";     //Correo a utilizar para autenticarse
        //con Gmail o en caso de GoogleApps utilizar con @tudominio.com
        $nombre_emisor= $name;               //Nombre de quien envía el correo
        $contrasena="good4you90.";          //contraseña de tu cuenta en Gmail
        $correo_destino="good4yougestordecorreo@gmail.com";      //Correo de quien recibe
        $nombre_destino="Good4You";                //Nombre de quien recibe
        $send ="De: $name \n";
        $send .="con e-mail: $email \n";
        $send .="teléfono $phone \n";
        $send .="y mensaje: $message";
            
        //--------------------------------------------------------                   // Habilita información SMTP (opcional para pruebas)
                                                    // 1 = errores y mensajes
                                                    // 2 = solo mensajes
        $mail->SMTPAuth   = true;                  // Habilita la autenticación SMTP
        $mail->SMTPSecure = "ssl";                 // Establece el tipo de seguridad SMTP
        $mail->Host       = "smtp.gmail.com";      // Establece Gmail como el servidor SMTP
        $mail->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail
        $mail->Username   = $correo_emisor;         // Usuario Gmail
        $mail->Password   = $contrasena;           // Contraseña Gmail
        //A que dirección se puede responder el correo
        $mail->AddReplyTo($correo_emisor, $nombre_emisor);
        //La direccion a donde mandamos el correo
        $mail->AddAddress($correo_destino, $nombre_destino);
        //De parte de quien es el correo
        $mail->SetFrom($correo_emisor, $nombre_emisor);
        //Asunto del correo
        $mail->Subject = 'El usuario  '. $email . ' contacta con nosotros';
        //Mensaje alternativo en caso que el destinatario no pueda abrir correos HTML
        $mail->AltBody = 'para ver el mensaje necesita un cliente de correo compatible con HTML.';
        //El cuerpo del mensaje, puede ser con etiquetas HTML
        $mail->MsgHTML($send);
        //Enviamos el correo
        $mail->Send();
        echo "El mensaje se ha enviado correctamente";
        } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Errores de PhpMailer
        } catch (Exception $e) {
        echo $e->getMessage(); //Errores de cualquier otra cosa.
        }
    }   
}
 ?>
