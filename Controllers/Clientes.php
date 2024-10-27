<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Clientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Tu Perfil';
        $this->views->getView('principal', "perfil", $data);
    }
    public function registroDirecto()
    {
        if (isset($_POST['nombre']) && isset($_POST['clave'])) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $token = md5($correo);
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            $data = $this->model->registroDirecto($nombre, $correo, $hash, $token);
            if ($data > 0) {
                $_SESSION['correo'] =$correo;
                $_SESSION['nombre'] =$nombre;

                $mensaje = array('msg' => 'registro con exito', 'icono' => 'success', 'token' => $token);
            } else {
                $mensaje = array('msg' => 'error al registrarse', 'icono' => 'error');
            }
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
    public function enviarCorreo()
    {
        if (isset($_POST['correo']) && isset($_POST['token'])) {
            //Create an instance; passing `true` enables exceptions
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
                $mail->setFrom('digitalcraftecu@gmail.com', TITLE);
                $mail->addAddress($_POST['correo']);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Mensaje desde la: ' . TITLE;
                $mail->Body    = 'Para verificar tu correo en nuestra tienda <b href ="' . BASE_URL . 'clientes/verificarCorreo/' . $_POST['token'] . '">Click aquí</b>';
                $mail->AltBody = 'Gracias por la preferencia';

                $mail->send();
                $mensaje = array('msg' => 'Correo enviado, revisa tu bandeja de entrada o spam', 'icono' => 'success');
            } catch (Exception $e) {
                $mensaje = array('msg' => 'Error al enviar correo electrónico: ' . $mail->ErrorInfo, 'icono' => 'error');
            }
        } else {
            $mensaje = array('msg' => 'Error fatal: ', 'icono' => 'error');
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Verificar el correo
    public function verificarCorreo($token)
    {
        $verificar = $this->model->getToken($token);
        if (!empty($verificar)) {
            $data = $this->model->actualizarVerify($verificar['id']);
            header('Location: ' . BASE_URL . 'clientes');
        }
    }

    //login directo
    /* public function loginDirecto()
    {
        if (isset($_POST['correoLogin']) && isset($_POST['claveLogin'])) {
            if(empty($_POST['correoLogin']) || empty($_POST['claveLogin'])){
                $mensaje = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            }
            $correo = $_POST['correoLogin'];
            $clave = $_POST['claveLogin'];
            $verificar = $this->model->getVerificar($correo);
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            $data = $this->model->registroDirecto($nombre, $correo, $hash);
            if($data > 0){
                $mensaje = array('msg' => 'registro con exito', 'icono' => 'success');
            }else{
                $mensaje = array('msg' => 'error al registrarse', 'icono' => 'error');
            }
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }
    }*/
}
