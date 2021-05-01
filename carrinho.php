	<!DOCTYPE html>
	<html>
	<link rel="stylesheet" type="text/css" href="carrinhocss.css">
	
	<div class="vitrine">
			
			<figure><!-- img src="imagens/a51.png" width="250" height="250"--></figure>
			<figcaption>
				<ul>
				<li><a href="">
					<table>
					<tr>
					<?php 
					include_once("conexao.php");
					$sqlq = 'SELECT * FROM produtos';
					if ($resultado=mysqli_query($conexao, $sqlq)){
						//$nomes = array();
						//$id = array();
						$i = 0;
						while ($reg=mysqli_fetch_assoc($resultado)){
							echo "<td>";
							$nomes = $reg['nome_produto'];
							$id = $reg['produtoid'];
							$preco = $reg['preco'];
							$imagem = $reg['imagem'];
							$dir = "imagens/";	
							echo $nomes;
							echo "<br>";
							echo'<img src="'.$dir.$imagem.'" width="250" height="250"></img>';
							echo "</td>";
						}
					}
?></a>
					</tr>
</table>
					</li><br>
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
			</tr>
		</table>
	</a>
</li>
</ul>
			</figcaption>
		</div>

	</div>
	</html>
