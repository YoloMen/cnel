<?php

Class EmailGenerator{

    private static $transport;
    private static $mailer;
    private static $message;

    private static function newInstance(){

        if(!isset(self::$mailer)){
            self::configurationTransport();
        }

        /*if(!isset(self::$transport)){
            throw new Exception('Configuration transport cannot be established');
        }*/
    }
    

    private static function configurationTransport(){
        self::$transport = Swift_SmtpTransport::newInstance()
        ->setHost('smtp.gmail.com')
        ->setPort('587')
        ->setEncryption('tls')
        ->setUsername('soportedevelopersd@gmail.com')
        ->setPassword('prueba12345');

        self::$mailer = Swift_Mailer::newInstance(self::$transport);
    }


    //Swift_Message::newInstance
    public static function sendEmail($type = 0, $code, $emailR = []){

        self::newInstance();
        if(!$type){
            return false;
        }

        $message = null;

        switch ($type) {
            case 'activate-account':

                $mail = file_get_contents(URL.'views/Email/activate-account.php');
                $mail_ = str_replace('JVJP_ACTIVATE', $code, $mail);

                $message = Swift_Message::newInstance()
                  // Asunto
                  ->setSubject('ACTIVAR CUENTA: Trabaja con nosotros CNEL')
                  // Remitente
                  ->setFrom(['soportedevelopersd@gmail.com' => 'CNEL - SANTO DOMINGO'])
                  // Destinatario/s
                  ->setTo($emailR)
                  // Body del mensaje
                  ->setBody($mail_, 'text/html');
            break;

            case 'restore-password':
                $mail = file_get_contents(URL.'views/Email/restore-password.php');

                $mail_ = str_replace('JVJP_RESTORE', $code, $mail);
                $mail_ = str_replace('JVJP_MAIL', $emailR[0], $mail_);

                $message = Swift_Message::newInstance()
                  // Asunto
                  ->setSubject('RESTABLECER CONTRASEÑA: Trabaja con nosotros CNEL')
                  // Remitente
                  ->setFrom(['soportedevelopersd@gmail.com' => 'CNEL - SANTO DOMINGO'])
                  // Destinatario/s
                  ->setTo($emailR)
                  // Body del mensaje
                  ->setBody($mail_, 'text/html');
            break;
            
            default:
            break;
        }


        return self::$mailer->send($message);
    }





}



?>

