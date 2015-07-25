<!DOCTYPE html>
<html>
<?php
	include('layouts/head.php');
?>
<body>
<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success" role="alert">
	    		Confirme todos os dados antes de salvar as informações! 
	    	</div>
		</div>
</div>
<?php
	$data = array();

	function add_pessoa($nome, $email, $idade, $ocupacao)
	{
		global $data;
		$data[] = array(
			'Nome' 		=> $nome,
			'Email' 	=> $email,
			'Idade' 	=> $idade,
			'Ocupacao' 	=> $ocupacao
		);		
	}//Termina a função de adicionar pessoa

	#Testa se existe arquivo
	if($_FILES['file']['tmp_name'])
	{
		$dom = DOMDocument::load($_FILES['file']['tmp_name']);
		$rows = $dom->getElementsByTagName('Row');
		$first_row = true;

		foreach ($rows as $row)
		{
			if(!$first_row)
			{
				$nome 		= '';
				$email 		= '';
				$idade 		= '';
				$ocupacao 	= '';

				$index = 1;
				$cells = $row->getElementsByTagName('Cell');

				foreach ($cells as $cell)
				{
					$in = $cell->getAttribute('Index');
					$coringa = '';
					if($coringa != null) $index = $coringa;
					if($index == 1) $nome = $cell->nodeValue;
					if($index == 2) $email = $cell->nodeValue;
					if($index == 3) $idade = $cell->nodeValue;
					if($index == 4) $ocupacao = $cell->nodeValue;

					$index+=1;
				}//termino do segundo foreach
				add_pessoa ($nome, $email, $idade, $ocupacao);
			}
			$first_row = false;
		}//termino do primeiro foreach
	?>
	<div class="row">
		<div class="col-md-4">
			<p><br></p>
		</div>

		<div class="col-md-4">
			<form action="dados_sql.php" method="post" name="dados">
				<table class="table table-striped">
			     	<thead>
			        	<tr>
			          		<th>Nome</th>
			          		<th>Email</th>
			          		<th>Idade</th>
			          		<th>Ocupacao</th>
			        	</tr>
			      	</thead>
			        <?php
			        foreach ($data as $pessoa){
			        	$pega_nome 		= $pessoa['Nome'];
			        	$pega_email 	= $pessoa['Email'];
			        	$pega_idade 	= $pessoa['Idade'];
			        	$pega_ocupacao 	= $pessoa['Ocupacao'];
	
			        	$sql = "INSERT INTO dados (nome, email, idade, ocupacao) VALUES ('$pega_nome', '$pega_email', '$pega_idade', '$pega_ocupacao');<br>";
			        ?>			        
			        <tr>
			          	<td><?php echo $pega_nome;?></td>
			          	<td><?php echo $pega_email;?></td>
			          	<td><?php echo $pega_idade;?></td>
			          	<td><?php echo $pega_ocupacao;?></td>
			        </tr>
			        <?php
			        }
			        ?>
			    </table>
		    	<p align="center">
		    		<button type="submit" class="btn btn-success">Salvar no banco de dados</button>
		    	</p>
			</form>	
		</div>

		<div class="col-md-4"></div>

	</div>
	<?php
	}else{
		echo "
		<div class='alert alert-danger' role='alert'>
    		Nenhum arquivo encontrado!
    	</div>";
	}
?>
</body>
</html>