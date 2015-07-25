<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="row">
		<div class="col-md-4"></div>

		<div class="col-md-4">
			<form action="tratar.php" enctype="multipart/form-data" method="post"> 
			  	<div class="form-group">
			    	<div class="alert alert-success" role="alert">
			    		Adicione seu arquivo <b>.xml</b> para que o sistema faça o ulpoad e recuere todos os dados
			    		cadastrados!
			    	</div>
			    	<input type="file" name="file" required/>
			  	</div>
			  		<button type="submit" class="btn btn-primary">Enviar Arquivo</button>
			</form>
		</div>

		<div class="col-md-4"></div>
	</div>
</body>
	<script src="public/bootstrap/js/bootstrap.min.js"></script>
</html>