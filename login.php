<?php  
session_start();
include("conexao.php");

if (empty($_POST["emailuser"])||empty($_POST["senhacor"])) {
	header('Location: login.html');
	exit();
}

$emailuser = mysqli_real_escape_string($conexao,$_POST["emailuser"]);
$senhacor = mysqli_real_escape_string($conexao,$_POST["senhacor"]);

$query = "select nome,email from usuarios where email = '{$emailuser}' and senha = '{$senhacor}' ";
$result = mysqli_query($conexao,$query);
$row = mysqli_num_rows($result);

echo $row;



if ($row == 1) {
	$_SESSION['email']=$emailuser;
	$consulta = ("SELECT nome FROM usuarios WHERE email = '{$emailuser}'");
	$con = $conexao->query($consulta) or die($conexao->error);
	$dado = $con->fetch_array();
	echo $dado["nome"];
	$_SESSION['usuario'] = $dado["nome"];
	echo $_SESSION['usuario'];
	header('Location:index.php');
	exit();
}
else{
	$_SESSION['usuario']= "Visitante";
	header('Location:login.html');
	exit();
}
?>