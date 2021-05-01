<?php 
include ("conexao.php");
session_start();
if(!isset($_SESSION['itens'])){
	$_SESSION ['itens'] = array ();

}

if(isset($_GET['add']) && $_GET['add'] == "carrinho"){
	$produtoid = $_GET['id'];
	if(!isset($_SESSION['itens'] [$produtoid]))
	{
		$_SESSION['itens'] [$produtoid] = 1;

	}
	else{
	$_SESSION['itens'] [$produtoid] +=1;
}
}

if(count($_SESSION ['itens']) == 0){
	echo 'Carrinho Vazio<br><a href="index.php">Adicionar Itens</a>';
}
else {
	foreach($_SESSION['itens'] as $produtoid => $quantidade){
	$select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
	$select->bindParam('1',$produtoid);
	$select->execute();
	$produtos = $select->fetchAll();

	echo
		'Nome: '.$produtos[0] ['nome']. '<br/>';	
		Preço:'. number_format ($produtos[0] ["preco"],2,",""."). ';
		
}
}
?>