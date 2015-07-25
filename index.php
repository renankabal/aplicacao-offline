<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
</head>
<body>
	<form action="tratar.php" enctype="multipart/form-data" method="post">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
		<input type="file" name="file"/>
		<input type="submit" value="Enviar Arquivo"/>
	</form>
</body>
</html>