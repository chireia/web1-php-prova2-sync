<?php

	error_reporting(E_ALL);

	//mysql_connect();
	
	$con = mysqli_connect("localhost","root","");
	
	if ($con !== false) {
	
		mysqli_select_db($con, "paw");
	
		//mysqli_query($con, "INSERT INTO aluno (rga,nome)
		//		   VALUES ('112233','João Silva')");
	
		//$aluno_id = mysqli_insert_id($con);
	
		$result = mysqli_query($con,"SELECT * FROM aluno");
		
		
		
		while ($dados = mysqli_fetch_assoc($result)) {
			echo "<br />".$dados['id']." - "
					.$dados['nome'];			
		}
		
		mysqli_data_seek($result,0);
		
		do {
			$dados = mysqli_fetch_assoc($result);
			
			echo "<br />".$dados['id']." - "
					.$dados['nome'];

		} while ($dados!=false);
	
	
		echo "<br />Error: ".mysqli_error($con);
	
	}
	else {
		echo "<br />Erro conectando ao banco".
				mysqli_error($con);
	}
	



?>