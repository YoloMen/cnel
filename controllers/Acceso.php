<?php

class Acceso extends Controller{
    
    public function __construct() {
        parent::__construct();
    }
    //Cargamos la vista login
    public function login(){

        /*if(Session::getValue("idASP")){
            $this->view->render('Aspirante', 'perfil');
        }*/

        $this->view->render($this, "index"); 
    }

    //Set View
    public function setView($id=0){

        switch ($id) {
            case 'login':
                $this->view->render($this, 'login');
            break;

            case 'register':
                $this->view->render($this, 'register');
            break;

            case 'restore-password':
                $this->view->render($this, 'restore-password');
            break;
            
            default:
            break;
        } 
    }

    //Controller Requests
    public function controller($id=0){
        $output = null;

        switch ($_POST['ID']) {
            case 'login':

                $_POST['email']     = trim($_POST['email']);
                $_POST['password']  = trim($_POST['password']);

                if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $output = ["STATUS" => "FAIL", "MSG" => "ERROR: Datos incorrectos"];
                    $output = json_encode($output);
                }

                $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

                $output = $this->model->login($_POST["email"], $_POST['password']);

            break;

            case 'register':

                if(isset($_POST["g-recaptcha-response"]) && $_POST["g-recaptcha-response"]){
                    $gRecaptcha = $this->validateGoogleRecaptcha();

                    if($gRecaptcha["success"]){  
                        $_POST['email']      = trim($_POST['email']);
                        $_POST['password1']  = trim($_POST['password1']);
                        $_POST['password2']  = trim($_POST['password2']);

                        $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                        $_POST['password1'] = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
                        $_POST['password2'] = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);



                        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || $_POST['password1']!==$_POST['password2']){
                            $output = ["STATUS" => "FAIL", "MSG" => "ERROR: Datos incorrectos"];
                            return json_encode($output);
                        }


                        $hashed_password = password_hash($_POST["password1"], PASSWORD_DEFAULT);
                     
                        $data = [
                            "ASP_EMAP" => "'".$_POST["email"]."'",
                            "ASP_PASS" => "'".$hashed_password."'",
                            "ASP_FCRE" => "now()",        
                            "ASP_FMOD" => "now()"
                        ];

                        $query = $this->model->registerCandidate($data, $_POST["email"]);

                        if($query["S"]){
                            $id = rand()."::".$query["D"][0][1]."::".rand(0,1000)."JVJP-::".$query["D"][0][0]."::".rand();
                            $token= hash('sha256', $id);

                            $id = urlencode($id);                   
                            $linkMail = URL."Acceso/a/?service=5733a1f6969d01e6fa75f07566574de2324b9cf5&id=$id&token=$token&_id=".rand(); 

                            //print_r($linkMail);
                            $sendEmail = EmailGenerator::sendEmail('activate-account', $linkMail, [$_POST["email"]]);

                            if($sendEmail){
                               $output = ["STATUS" => "SUCCESS", "MSG"=> "<i class=\"material-icons green-text\">done</i> &nbsp; Registro exitoso"];
                            }else{
                               $output = ["STATUS" => "IMCOMPLETE", "MSG"=> "<i class=\"material-icons white-text\">info</i> &nbsp; Usted ha sido registrado"];
                            }
                 
                        }else{
                            $output = ["STATUS" => "FAIL", "MSG"=> "<i class=\"material-icons red-text\">error</i> &nbsp; ".$query["D"]];
                        }

                        $output = json_encode($output);
                    }
                }     
            break;

            case 'restore-password':  

                if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $output = ["STATUS" => "FAIL", "MSG" => "ERROR: Datos incorrectos"];
                    return json_encode($output);
                }

                $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                $query = $this->model->checkCandidate($_POST['email']);

                if($query){
                    //'ASP_ID, ASP_FCRE','SSP_ASPIRANTE'
                    $id = rand()."trZ::idUx".rand(0,100)."TYGF".rand(0,100)."GdCvBDfg".rand(0,10000)."::".rand(0,1000)."qw".rand(0,100)."XCjs".rand(0,100)."ksl::".rand(10,99)."AwpRY".$query[0][0].rand(10,99)."HTwIy::".rand()."48sdsRTWXCB-idZDs".rand();
                    $token= hash('sha256', $id);

                    $id = urlencode($id);                   
                    $linkMail = URL."Acceso/a/?service=20649c1f55f26367460960760b689351df031676&id=$id&token=$token&_id=".rand(); 

                    $sendEmail = EmailGenerator::sendEmail('restore-password', $linkMail, [$_POST["email"]]);

                    if($sendEmail){
                       $output = ["STATUS" => "SUCCESS", "MSG"=> "<i class=\"material-icons green-text\">done</i> &nbsp; Se ha enviado un correo electrónico"];
                    }else{
                       $output = ["STATUS" => "IMCOMPLETE", "MSG"=> "<i class=\"material-icons white-text\">info</i> &nbsp; No es posible enviar el email. Por favor, intentalo más tarde..."];
                    }

                }else{
                    $output = ["STATUS" => "FAIL", "MSG"=> "<i class=\"material-icons\">email</i> &nbsp; Correo electrónico no registrado."];
                }

                $output = json_encode($output);


            break;


            default:
            break;
        }



        echo $output;
    }

    public function a(){
        
        if (isset($_GET["service"])) {
            switch ($_GET["service"]) {
            //activate-accountJVJP                     sha1
                case '5733a1f6969d01e6fa75f07566574de2324b9cf5':
                    if(empty($_GET["id"]) && empty($_GET["token"])){
                        return false;
                    }

                    $id = urldecode($_GET["id"]);
                    $token= hash('sha256', $id);

                    if($token===$_GET["token"]){
                        $explodeID = explode("::", $id);

                        $checkStatus = $this->model->getStatusCandidate($explodeID[3]);


                        if(count($checkStatus)==1){
                            if($checkStatus[0][0]==='A'){
                                $status = "OK";
                            }elseif ($checkStatus[0][0]==='B') {
                                $status = "INVALID";
                            }else{
                                $datetime1 = new DateTime($explodeID[1]);
                                $datetime2 = new DateTime('now');

                                $since_start = $datetime1->diff($datetime2);

                                if(($since_start->d) < 5){
                                    $output = $query = $this->model->updateStatusCandidate($explodeID[3], 'A');
                                    if($output){
                                        $status = "SUCCESS";
                                    }else{
                                        $status = "FAIL";
                                    }
                                    
                                }else{
                                    $status = "TIMEOUT";
                                }

                            }
                        }else{
                            $status = "INVALID-M";
                        }

                    }else{
                        $status = "INVALID";
                    }

                    $this->view->data = ["STATUS" => $status];
                    $this->view->render($this, 'activate-account');

                break;
                

                //restore-passwordJVJP                     sha1
                case '20649c1f55f26367460960760b689351df031676':
                    if(empty($_GET["id"]) && empty($_GET["token"])){
                        return false;
                    }

                    $id = urldecode($_GET["id"]);
                    $token= hash('sha256', $id);

                    if($token===$_GET["token"]){

                        $this->view->data = [
                            "id" => $id,
                            "token" => $token
                        ];

                        $this->view->render($this, 'restore-passwordBE');
                    }
                break;    
                
                default:
                break;

            }
        }
        

        if(isset($_POST["service"])){
            $output = null;

            switch ($_POST["service"]) {
                //restore-passwordBE                     sha1
                case '3d3064e3a080ad90951a3ab500c9026e13e68858':

                    if(empty($_POST["id"]) && empty($_POST["token"])){
                        return false;
                    }

                    $token= hash('sha256', $_POST["id"]);

                    if($token===$_POST["token"]){

                        $explodeID = explode("::", $_POST["id"]);
                        $explodeID[3] = substr($explodeID[3], 7 , strlen($explodeID[3])-14);


                        $getToken = $this->model->getToken($explodeID[3]);
                        
                        if($getToken && $getToken[0][0]===$_POST["token"]){
                            echo json_encode(["STATUS" => "FAIL", "MSG"=> "<i class=\"material-icons red-text\">error</i> &nbsp; 'ERROR: Enlace incorrecto'"]);
                            return false;
                        }

                        $_POST['pass1']  = trim($_POST['pass1']);
                        $_POST['pass2']  = trim($_POST['pass2']);

                        $_POST['pass1'] = filter_var($_POST['pass1'], FILTER_SANITIZE_STRING);
                        $_POST['pass2'] = filter_var($_POST['pass2'], FILTER_SANITIZE_STRING);


                         if($_POST['pass1']!==$_POST['pass2']){
                            $output = ["STATUS" => "FAIL", "MSG" => "ERROR: Contraseñas no coinciden"];
                            return json_encode($output);
                        }


                        $hashed_password = password_hash($_POST["pass1"], PASSWORD_DEFAULT);                       
                        $query = $this->model->updatePasswordCandidate($explodeID[3], $hashed_password, $token);

                        if($query){
                            $output = ["STATUS" => "SUCCESS", "MSG"=> "<i class=\"material-icons green-text\">done</i> &nbsp; Cambio de contraseña exitoso"];
                        }else{
                            $output = ["STATUS" => "FAIL", "MSG"=> "<i class=\"material-icons red-text\">error</i> &nbsp; No es posible cambiar la contraseña"];
                        }
                        
                    }

                     $output = json_encode($output);

                break;
                
                default:
                break;
            }

            echo $output;



        }



    }

    public function validateGoogleRecaptcha(){
        $secret = "6Ldc7hQTAAAAAKNxNSnVBJceS5LBg8ZlsrqmcLdy";
        $ip = $_SERVER["REMOTE_ADDR"];
        $captcha = $_POST["g-recaptcha-response"];

        $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
        $response = json_decode($result, true);

        return $response;
    }

}