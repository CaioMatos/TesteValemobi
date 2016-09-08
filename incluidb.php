<?php
	error_reporting(0);
	ini_set(“display_errors”,0);

	$CodMercadoria = $_POST['CodMercadoria'];
	$TipoMercadoria = $_POST['TipoMercadoria'];
	$NomeMercadoria = $_POST['NomeMercadoria'];
	$Quantidade = $_POST['Quantidade'];
	$Preco = $_POST['Preco'];
	$TipoNegocio = $_POST['TipoNegocio'];
	
	mysql_connect("localhost", "root", "")or
		die("Erro na conexão: " . mysql_error());
		
	mysql_select_db("testeValemobi")or
		die("Erro na seleção do banco de dados: " . mysql_error());
		
	$sql= "INSERT INTO LISTAOPERACOES (CODMERCADORIA, TIPOMERCADORIA, NOMEMERCADORIA, QUANTIDADE, PRECO, TIPONEGOCIO) VALUES
		('$CodMercadoria', '$TipoMercadoria', '$NomeMercadoria', '$Quantidade', '$Preco', '$TipoNegocio')";
		
	mysql_query($sql)or
			die("Erro na gravação" . mysql_error());			
?>
<script language="javascript">
	alert("Cadastrado");
	window.location="listaoperacoes.php";
</script>