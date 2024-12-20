<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Contactos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])) {
            //Create an instance; passing `true` enables exceptions
            if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
                $mensaje = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = HOST_SMTP;                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = USER_SMTP;                     //SMTP username
                    $mail->Password   = PASS_SMTP;                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = PUERTO_SMTP;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('erikquisnia@gmail.com', TITLE);
                    $mail->addAddress($_POST['email']);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $_POST['nombre'] . 'Mensaje desde la tienda virtual de : ' . TITLE;
                    $mail->Body    = $_POST['mensaje'];
                    $mail->AltBody = 'Gracias por la preferencia';

                    $mail->send();
                    $mensaje = array('msg' => 'Correo enviado, revisa tu bandeja de entrada o spam', 'icono' => 'success');
                } catch (Exception $e) {
                    $mensaje = array('msg' => 'Error al enviar correo electrónico: ' . $mail->ErrorInfo, 'icono' => 'error');
                }
            }
        } else {
            $mensaje = array('msg' => 'Error fatal: ', 'icono' => 'error');
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }
}
