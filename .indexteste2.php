<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="meuestilo.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vitrine.css">
		<title>Jianas</title>
	</head>
	
	<body>
		
		<div class="cabecalho">
			<div class="logocabecalho"><img src="LOGO.jpg" width="220" height="120"></div>
			<div class="pesquisa" >
					<form action="pesquisar.php" method="post">
					<input id="inputBarraBusca" type="text" placeholder=" Buscar..." name="pesquisar" />
					<input id="inputBotaoPesquisar" type="submit"><i class="fa fa-search"></i></button>
					</form>
			</div>

			<div class="ajuda">
				<i class="fa fa-shopping-cart"><a href="suporte.html"> Carrinho</a></i>
			
			</div>
		</div>
		<div class="menu">
	<ul>
	<li> <a href="indexteste.php">Início</a> </li>
	<li> <a href="#">Categoria</a> </li>
	<li> <a href="quemSomos.html">Quem somos</a> </li>
	<li> <a href="suporte.html">Contato</a> </li>
	<li> <a href="cadastrousuario.html">Criar conta</a> </li>
	<li> <a href="login.html">Entrar</a> </li>
	<li> <a href="cadastroProduto.html">Vender</a> </li>
	</ul>
		</div>

	<div>
		<div class="vitrine">
			
			<figure><img src="imagens/a51.png" width="250" height="250"></figure>
			<figcaption>
				<ul>
					<li><a href=""><?php 
					include_once("conexao.php");
					$sqlq = 'SELECT * FROM produtos';
					if ($nomeprod=mysqli_query($conexao, $sqlq)){
						//$nomes = array();
						//$id = array();
						$i = 0;
						while ($reg=mysqli_fetch_assoc($nomeprod)){
							$nomes = $reg['nome_produto'];
							$id = $reg['produtoid'];
							$preco = $reg['preco'];
							$imagem = $reg['imagem'];	
							echo $nomes;
							echo $preco;
							echo "<img src='".$imagem."'>";
							
						}
					}
					 ?></a></li><br>
					Preço: R$
					<?php 
					include_once("conexao.php");
					$sqle = 'SELECT * FROM produtos';
					if ($nomeprod=mysqli_query($conexao, $sqle)){
						$nomes = array();
						$id = array();
						$i = 0;
						while ($reg=mysqli_fetch_assoc($nomeprod)){
							$preço[$i] = $reg['preco'];
							
						
							echo $preço[$i];
							echo ',00';
							

							
						}
						
					}
					 ?>
				</ul>
			</figcaption>
		</div>

	</div>




		<footer>
		
			<div class="footer">
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
