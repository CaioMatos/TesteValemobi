<?php
	error_reporting(0);
	ini_set(“display_errors”,0);
	
	mysql_connect("localhost", "root", "")or
		die("Erro na conexão: " . mysql_error());
		
	mysql_select_db("testeValemobi")or
		die("Erro na seleção do banco de dados: " . mysql_error());
	
	$CodMercadoria = $_POST['Deletar'];
	
	$del = "DELETE FROM LISTAOPERACOES WHERE CODMERCADORIA = $CodMercadoria"; 
	mysql_query($del)or
		die("Erro na exclusão" . mysql_error());
?>
<script language="javascript">
	alert("Excluido");
	window.location="listaoperacoes.php";
</script>