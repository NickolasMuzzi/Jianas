<?php  
include('conexao.php');

if(isset($_FILES['imagem']))
 {
    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); 
    $new_name = date("Y.m.d-H.i.s") . $ext;
    $dir = '/var/www/html/saiinfo2018/grupo4/imagens/'; 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); 
 
$nomep = mysqli_real_escape_string($conexao,$_POST['nomedoproduto']);
$imagemp = $new_name;
$descricaop = mysqli_real_escape_string($conexao,$_POST['descricao']);
$estadop = mysqli_real_escape_string($conexao,$_POST['estadosp']);
$cidadep = mysqli_real_escape_string($conexao,$_POST['cidadep']);
$condicaop = mysqli_real_escape_string($conexao,$_POST['opcao']);
$precop = mysqli_real_escape_string($conexao,$_POST['preco']);
$facebookp = mysqli_real_escape_string($conexao,$_POST['face']);
$twitterp = mysqli_real_escape_string($conexao,$_POST['twitter']);
$instagramp = mysqli_real_escape_string($conexao,$_POST['insta']);
$whatsapp = mysqli_real_escape_string($conexao,$_POST['whats']);
$telefonep = mysqli_real_escape_string($conexao,$_POST['telefone']);
$categoriap = mysqli_real_escape_string($conexao,$_POST['categoriap']);

$sql = "INSERT INTO produtos(nome_produto,imagem,descricao,estado,cidade,condicao,preco,facebook,twitter,instagram,whatsapp,telefone,categoria) VALUES('$nomep','$imagemp','$descricaop','$estadop','$cidadep','$condicaop','$precop','$facebookp','$twitterp','$instagramp','$whatsapp','$telefonep','$categoriap')";
if ($conexao->query($sql) === true) {
	echo "Dados cadastrados";
}
else{
	echo "Erro no sql";
}
$conexao->close();
}
else{
	echo "ERRO";
}



?>
