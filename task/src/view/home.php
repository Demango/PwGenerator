<!DOCTYPE html>
<html>
<head>
	<title>Password task</title>
</head>
<body>
	<form action="/test/task/generate.php">
		<input type="number" name="length" min="0" value="<?php echo $length; ?>"> <br/>
		<input type="checkbox" name="numbers" <?php echo $numbers ? 'checked' : ''; ?>> numbers <br/>
		<input type="checkbox" name="lowercase" <?php echo $lowercase ? 'checked' : ''; ?>> lowercase <br/>
		<input type="checkbox" name="uppercase" <?php echo $uppercase ? 'checked' : ''; ?>> uppercase <br/>
		<input type="submit" name="submit" value="Generate">
	</form>

	<?php echo $password; ?>
</body>
</html>
