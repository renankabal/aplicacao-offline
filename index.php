<!DOCTYPE html>
<html>
<?php
	include('layouts/head.php');
?>
<body>
	<div class="row">
		<div class="col-md-4">
			<p><br></p>
		</div>

		<div class="col-md-4">
			<form action="tratar.php" enctype="multipart/form-data" method="post"> 
			  	<div class="form-group">
			    	<div class="alert alert-success" role="alert">
			    		Adicione seu arquivo <b>.xml</b> para que o sistema fa�a o ulpoad e recuere todos os dados
			    		cadastrados!
			    	</div>
			    	<input type="file" name="file" required/>
			  	</div>
			  		<button type="submit" class="btn btn-primary">Abrir Arquivo</button>
			</form>
		</div>

		<div class="col-md-4"></div>
	</div>
</body>
	<script src="public/bootstrap/js/bootstrap.min.js"></script>
</html>