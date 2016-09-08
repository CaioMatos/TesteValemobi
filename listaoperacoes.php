<!DOCTYPE html>
<html>
	<head>
		<title>Lista de Operações</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="testeValemobi.css"/>
	</head>
	<body>
		<div id="ListaOperacoes">
			<table class="tabela">
				<tr>
					<th class="titulo" colspan="7">Lista de Operações</th>
				</tr>
				<tr>
					<th>Código da Mercadoria</th>
					<th>Tipo de Mercadoria</th>
					<th>Nome da Mercadoria</th>
					<th>Quantidade</th>
					<th>Preço</th>
					<th>Tipo do Negócio</th>
					<th class="deletar">Deletar Operação</th>
				</tr>
				<?php
				
					error_reporting(0);
					ini_set(“display_errors”,0);
					
					mysql_connect("localhost", "root", "")or
						die("Erro na conexão: " . mysql_error());
					
					mysql_select_db("testeValemobi")or
						die("Errona seleção do banco de dados:" . mysql_error());
					
					$busca = "SELECT * FROM LISTAOPERACOES";
					
					$rs = mysql_query($busca)or
						die("Erro ao buscar: " . mysql_error());
						
					$linhas = mysql_num_rows($rs);
					
					if($linhas < 1){
						echo "</table></div>";
						echo "<br><a href='index.html'><input type='button' name='Voltar' id='Voltar' class='button' value='Voltar ao Formulário'/></a><br>";
						die("Não encontrou nenhuma informação no banco de dados");
					}
					
					for($n=0;$n<$linhas;$n++){
								
						$CodMercadoria = mysql_result($rs, $n, "CODMERCADORIA");
						$TipoMercadoria = mysql_result($rs, $n, "TIPOMERCADORIA");
						$NomeMercadoria = mysql_result($rs, $n, "NOMEMERCADORIA");
						$Quantidade = mysql_result($rs, $n, "QUANTIDADE");
						$Preco = mysql_result($rs, $n, "PRECO");
						$TipoNegocio = mysql_result($rs, $n, "TIPONEGOCIO");
						
						echo "<tr>";
							echo "<td>$CodMercadoria</td>";
							echo "<td>$TipoMercadoria</td>";
							echo "<td>$NomeMercadoria</td>";
							echo "<td>$Quantidade</td>";
							echo "<td>$Preco</td>";
							echo "<td>$TipoNegocio</td>";
							echo "<td class='deletar'>";
								echo ('<form name="Del" action="excluidb.php" method="post" enctype="multipart/form-data">');
									echo ('<input type="hidden" name="Deletar" value="' . $CodMercadoria . '"/>');
									echo "<input type='submit' value='Deletar'/>";
								echo "</form>";
							echo "</td>";
						echo "</tr>";
						
					}						
				?>
				
			</table>	
		</div>
		<br><a href="index.html"><input type="button" name="Voltar" id="Voltar" class="button" value="Voltar ao Formulário"/></a>
	</body>
</html>