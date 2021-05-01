<?php
session_start();
include('conexao.php');
if (isset($_POST['valor'])) {
	$pid = $_POST['valor'];
}
elseif (isset($_GET["pid"])) {
	$pid = $_GET["pid"];
}
$sql = "SELECT * from produtos where '{$pid}'= produtoid";
$con = $conexao->query($sql);
$dados = $con->fetch_array();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="meuestilo.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="meuestilo.css">
		<title>Jianas</title>
	</head>
	
	<body>
		<header>
		<div class="cabecalho">
			<div class="logocabecalho"><img src="LOGO.jpg" width="220" height="120"></div>
			<div class="pesquisa" >
					<form action="" method="post">
					<input id="inputBarraBusca" type="text" placeholder=" Buscar..." />
					<button id="inputBotaoPesquisar" type="submit"><i class="fa fa-search"></i></button>
					</form>
			</div>
			<div class="carrinho">
				<i class="fa fa-shopping-cart"><a href="carrinho.html"> Carrinho</a></i>
			</div>
		</div>
		</header>
		<div class="menu">
	<ul>
	<li> <a href="index.php">Início</a> </li>
	<li> <a href="#" class="drop">Categoria</a> 
		<div class="colunas">
			<ul class="col">
				<span>Outros:</span>
			<li><a href="">Caixas de som</a></li>
			<li><a href="">Telefones e Interfones</a></li>
			<li><a href="">Televisores</a></li>
			<li><a href="">Fones de ouvido</a></li>
			<li><a href="">Usados</a></li>
			</ul>
			<ul class="col" >
				<span>Computadores:</span>
			<li><a href="">Desktops</a></li>
			<li><a href="">Notebooks</a></li>
			<li><a href="">Placa de vídeo</a></li>
			<li><a href="">Placa de som</a></li>
			<li><a href="">Processador</a></li>
			<li><a href="">Memória RAM</a></li>
			<li><a href="">Cooler</a></li>
			<li><a href="">Cabos e adaptadores</a></li>
			<li><a href="">Webcam</a></li>
			<li><a href="">Fontes</a></li>
			<li><a href="">Pc's Gamer</a></li>
		</ul>
		<ul class="col">
			<span>Celulares:</span>
			<li><a href="">Smartphones</a></li>
			<li><a href="">Carregador</a></li>
			<li><a href="">Cabos</a></li>
			<li><a href="">Tela</a></li>
			<li><a href="">Display</a></li>
		</ul>
		</div>
	</li>
	<li> <a href="quemSomos.html">Quem somos</a> </li>
	<li> <a href="suporte.html">Contato</a> </li>
	<li> <a href="cadastrousuario.html">Criar conta</a> </li>
	<li> <a href="login.html">Entrar</a> </li>
	<li> <a href="cadastroProduto.html">Vender</a> </li>
	</ul> 

	</div>
	<div>
			<h2>Detalhes do produto</h2>
			<h4>Nome:<?php echo $dados['nome_produto'];?></h4><br>
			<img src="imagens/<?php echo $dados['imagem']?>" width="420px;"><br>
			<h4>Descrição:<?php echo $dados['descricao'];?></h4><br>
			<h4>Estado:<?php echo $dados['estado'];?></h4><br>
			<h4>Cidade:<?php echo $dados['cidade'];?></h4><br>
			<h4>Condição:<?php echo $dados['condicao'];?></h4><br>
			<h4>Preço:R$<?php echo $dados['preco'];?></h4><br>
			<h4>Facebook:<?php echo $dados['facebook'];?></h4><br>
			<h4>Twitter:<?php echo $dados['twitter'];?></h4><br>
			<h4>Instagram:<?php echo $dados['instagram'];?></h4><br>
			<h4>Whatsapp:<?php echo $dados['whatsapp'];?></h4><br>
			<h4>Telefone:<?php echo $dados['telefone'];?></h4><br>
			<h4>Categoria:<?php echo $dados['categoria'];?></h4><br>

	</div>

		<footer class="footer">
		
			<div class="">
				<ul>
					<li><p><a href="termosUso.html">Termos de Uso e Condições</a></p>
					<p><a href="suporte.html">Fale Conosco</a></p></li>
					<li><h3>A empresa</h3>
					<p>Empresa que busca trazer o melhor para você, sem precisar sair de casa.<br>
					  Sempre em busca de melhorar nosso seriviços e satisfazer nossos clientes.</p>
					</li>
					<li><h3>Endereço</h3>
						<p>Rodovia MGC 262, Bairro Sobradinho, Sabará, Minas Gerais,<br> CEP, 34590-390</p>
					</li>

				</ul>
			</div>

		</footer>
		
	</body>
</html>
