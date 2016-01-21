<?php 

/*$mail = filter_var('jai@me@outlook.com', FILTER_VALIDATE_EMAIL);


if(!$mail){
	throw new \InvalidArgumentException("Error email");
	
}*/

/*echo '<pre>';
print_r(filter_list());*/


//require_once 'vendor/autoload.php' ;

	/*$smtp_host_ip = gethostbyname('smtp.gmail.com');
	$transport = Swift_SmtpTransport::newInstance($smtp_host_ip,465,'ssl')->setUsername('jaimebusiness3@gmail.com')->setPassword('likegoogle');*/



	// Configuración
/*$transport = Swift_SmtpTransport::newInstance()
->setHost('smtp.gmail.com')
->setPort('587')
->setEncryption('tls')
->setUsername('jaimebusiness3@gmail.com')
->setPassword('likegoogle');

$mailer = Swift_Mailer::newInstance($transport);

// Si el formulario es enviado
if (isset($_POST["swiftmailer"]))
{
// Crear el mensaje
$message = Swift_Message::newInstance()
  // Asunto
  ->setSubject('Hola Mundo')
  // Remitente
  ->setFrom(array('jaimebusiness3@gmail.com' => 'Administrador'))
  // Destinatario/s
  ->setTo(array('ja_live@live.com' => 'DESTINATARIO JV'))
  // Body del mensaje
  ->setBody('<h1>Hola <b>Mundo</b></h1>', 'text/html');

// Enviar el mensaje
  if ($mailer->send($message))
  {
      echo "Mensaje enviado correctamente";
  }
  else
  {
      echo "Mensaje fallido";
  }
}

?>

<form method="POST">
    <button type="submit">Enviar email</button>
    <input type="hidden" name="swiftmailer">
</form> 

*/

/*
$query[0][0] = 1;
$query[0][1] = new DateTime('now');
$query[0][1] = $query[0][1]->format('Y-m-d H:i:s');

$id = rand()."::".$query[0][1]."::".rand(0,1000)."JVJP-".$query[0][0]."::".rand();
$id = urlencode($id);

$service= "activate-account:".rand();


//$service= "restore-accountJVJP";



$service = urlencode($service);


$token= hash('sha256', $id);
$service= hash('sha256', $service);


print_r($service);



$linkMail = "?service=$service&id=$id&token=$token"; 

echo "<pre>";

var_dump($id);
var_dump($token);

var_dump($linkMail);


*/



//var_dump(password_hash("", PASSWORD_DEFAULT));

$id = rand()."trZ::idUx".rand(0,100)."TYGF".rand(0,100)."GdCvBDfg".rand(0,10000)."::".rand(0,1000)."qw".rand(0,100)."XCjs".rand(0,100)."ksl::".rand(10,99)."AwpRY148931313".rand(10,99)."HTwIy::".rand()."48sdsRTWXCB-idZDs".rand();
$explodeID = explode("::", $id);

echo  $id  . "<br><br>";


$id2 = substr($explodeID[3], 7 , strlen($explodeID[3])-14);

echo $id2."<br>jaime";


//echo base64_encode($row['userID'])."<br><br>";

$password  = "jaime";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

var_dump($hashed_password);




                    

$datetime1 = new DateTime('2016-01-08 13:30:00');
$datetime2 = new DateTime('now');
$since_start = $datetime1->diff($datetime2);


var_dump($datetime1->format('Y-m-d H:i:s'));
var_dump($datetime2->format('Y-m-d H:i:s'));

echo "<pre>";
echo $since_start->days.' days total<br>';
echo $since_start->y.' years<br>';
echo $since_start->m.' months<br>';
echo $since_start->d.' days<br>';
echo $since_start->h.' hours<br>';
echo $since_start->i.' minutes<br>';
echo $since_start->s.' seconds<br>';

