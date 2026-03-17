<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pakowarka</title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<input type="file" name="obrazy[]" multiple accept=".jpg,.jpeg,.png">
<button type="submit">Wyślij</button>
</form>
</body>
</html>