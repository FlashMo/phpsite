<html>
<head>
	<title>Easy Admin</title>
</head>

<body>
	<?php if($loginFailed):?>
		<h1>Login Fail!</h1>
	<?php else:?>
		<h1>Please Login</h1>
	<?php endif;?>
	<form action="index.php?c=admin&m=login_submit" method="post">
		<p>username: <input name="username" type="input"></p>	
		<p>password: <input name="password" type="password"></p>
		<p><input type="submit" value="login"><p>
	</form>
</body>


</html>
