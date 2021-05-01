<?php 
session_start();
include('conexao.php');

$nome = mysqli_real_escape_string($conexao,trim($_POST['user']));
$cpf = mysqli_real_escape_string($conexao,trim($_POST['cpfuser']));
$email = mysqli_real_escape_string($conexao,trim($_POST['emailuser']));
$telefone = mysqli_real_escape_string($conexao,trim($_POST['teluser']));
$rua = mysqli_real_escape_string($conexao,trim($_POST['ruaend']));
$bairro = mysqli_real_escape_string($conexao,trim($_POST['bairroend']));
$num = mysqli_real_escape_string($conexao,trim($_POST['numend']));
$cidade = mysqli_real_escape_string($conexao,trim($_POST['cidadeend']));
$estado = mysqli_real_escape_string($conexao,trim($_POST['estadoend']));
$senha = mysqli_real_escape_string($conexao,trim($_POST['senhacor']));
$senha1 = $_POST["senhacor"];
$senha2 = $_POST["senhacor2"];
$caixinha = $_POST["termosdeuso"];
$erro = false;

$sql = "select count(*) as total from usuarios where cpf = '$cpf'";
$result = mysqli_query($conexao,$sql);
$row = mysqli_fetch_assoc($result);

if ($row['total']==1) {
	$_SESSION['cpf_existe']=true;
	header('Location:cadastrousuario.html');
	exit();
}

if (is_numeric($cpf) == false) {
	echo "O CPF deve ter somente números."; 
	$erro = true;
}

else if (strlen($cpf) != 11) {
    echo "O CPF deve ter 11 digitos.";
    $erro = true;
}

if (filter_var($email,FILTER_VALIDATE_EMAIL) == false) {
	echo "Email registrado invalido";
	$erro = true;
}

if ($senha1 != $senha2) {
	echo "As senhas digitadas são diferentes,favor corrigir";
	$erro = true;
}
if ($caixinha != true) {
	echo "Você deve aceitar os termos de uso para poder se cadastrar.";
	$erro = true;
}

else{

$sql = "INSERT INTO usuarios(nome,cpf,email,telefone,rua,bairro,num,cidade,estado,senha) VALUES('$nome','$cpf','$email','$telefone','$rua','$bairro','$num','$cidade','$estado','$senha')";
if ($conexao->query($sql) === true) {
	$_SESSION['status'] = true;
}
$conexao->close();
header('Location:index.php');
exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Erro no Cadastro</title>
</head>
<body>
<form action="cadastrousuario.html">
<button type="submit">Retornar</button>
</form>
</body>
</html>