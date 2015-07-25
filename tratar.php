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
	<table border="0" width="50%">
		<tr>
			<td>Nome</td>
			<td>Email</td>
			<td>Idade</td>
			<td>Ocupacao</td>
		</tr>
		<?php
		foreach ($data as $row){
		?>
		<tr>
			<td><?php echo $row['Nome']?></td>
			<td><?php echo $row['Email']?></td>
			<td><?php echo $row['Idade']?></td>
			<td><?php echo $row['Ocupacao']?></td>
		</tr>
		<?php
		}
		?>
	</table>
	<?php
	}else{
		echo "Nenhum arquivo encontrado!";
	}
?>