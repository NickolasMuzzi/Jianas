<?php
session_start();
include ('conexao.php');

/*$pesquisar = $_POST['pesquisar'];
$result_produtos = "SELECT * FROM produtos WHERE nome LIKE '%$pesquisar%'";
$resultado_produtos = mysqli_query($conexao, $result_produtos);
echo "Produtos Encontrados:<br>";
while($rows_produtos = mysqli_fetch_array($resultado_produtos)){
	echo "" .$rows_produtos['nome']."<br>";
}*/

if (!isset($_GET['pesquisar'])) {
	header('Location:index.php');	
}
else{
	$nome = "%".trim($_GET['pesquisar'])."%";
 	$dbh = new PDO('mysql:host=127.0.0.1;dbname=jianas', 'saiinfo2018', 'saiinfo2018pass');
	$sth = $dbh->prepare('SELECT * FROM produtos WHERE nome_produto LIKE :nome');
	$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
	$sth->execute();
 
	$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

}
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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<title>Jianas</title>
	</head>
	
	<body>
		<header>
		<div class="cabecalho">
			<div class="logocabecalho"><img src="LOGO.jpg" width="220" height="120"></div>
			<div class="pesquisa" >
					<form action="pesquisar.php" method="get">
					<input id="inputBarraBusca" name="pesquisar" type="text" placeholder=" Buscar..." />
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
		<div class="pesquisar">
			<h2>Resultados da busca:</h2><br>
				<?php
				if (count($resultados)) {
					foreach($resultados as $Resultado) {
				?>
			<form action="detalhes.php" method="post">
				<input type="hidden" name="valor" value="<?php echo  $Resultado['produtoid'];?>">
				<button class="tim"><?php echo $Resultado['produtoid']; ?> - <?php echo $Resultado['nome_produto']; ?>
				</button>
			</form>
				<br>
				<?php
				} } else {
				?>
				<label>Não foram encontrados resultados pelo termo buscado.</label>
				<?php
				}
				?>

		</div>
			
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