<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="signUp.css">
</head>
<body>
	<div class="box">
		<h2>Contact Us</h2>
		<form method="post" action="action.php">
			<div>
				<input type="text" name="name" required="">
				<label>Name</label>
			</div>
			<div>
				<input type="email" name="email" required="">
				<label>Email</label>	
			</div>
			<div>
				<input type="text" name="subject" required="">
				<label>Subject</label>	
			</div>
			<div>
				<input type="text" name="message" required="">
				<label>Message</label>	
			</div>
			<div>
				<textarea required="" name="area"></textarea>
				<label>address</label>
			</div>
			<input type="submit" name="submit" value="submit">
		</form>
	</div>
</body>
</html>