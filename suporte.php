

<?php
date_default_timezone_set('America/Sao_Paulo');
require '.lib/vendor/autoload.php';
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
if(($_POST['name'] && !empty(trim($_POST['name']))) && ($_POST['email'] && !empty(trim($_POST['email']))) && ($_POST['mesage'] && !empty(trim($_POST['mesage']))))  {
 
	$nome = !empty($_POST['name']) ? $_POST['name'] : 'Não informado';
	$email = $_POST['email'];
	$mensagem = $_POST['mesage'];
	$data = date('d/m/Y H:i:s');
 
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'jianastecnico@gmail.com';
	$mail->Password = 'jianas04181925';
	$mail->Port = 587;
 
	$mail->setFrom('jianastecnico@gmail.com');
	$mail->addAddress('jianastecnico@gmail.com');
 
	$mail->isHTML(true);
	$mail->Subject = 'Suporte';
	$mail->Body = "Nome: {$nome}<br>
				   Email: {$email}<br>
				   Mensagem: {$mensagem}<br>
				   Data/hora: {$data}";
 
	if($mail->send(true)) {
		echo 'Email enviado com sucesso.';
	} else {
		echo 'Email não enviado.';
	}
} else {
	echo 'Não enviado: preencha os campos.';
}