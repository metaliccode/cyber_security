<?php

session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	// mencegah
	// $username = mysqli_real_escape_string($conn, $_POST['username']);
	// $password = mysqli_real_escape_string($conn, $_POST['password']);
	// $username = htmlspecialchars($_POST['username']);
	// $username = htmlspecialchars($_POST['password']);

	// cara lain prepared statement
	// $login = mysqli_prepare($conn, "SELECT * FROM user WHERE username = ? AND password = ? ");
	// mysqli_stmt_bind_param($login, "ss", $_POST['username'], $_POST['password']);
	// mysqli_execute($login);
	// mysqli_stmt_store_result($login);

	$login = mysqli_query($conn, "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'");

	// SELECT * FROM user WHERE username = 'csi' AND password = 'testing'
	// csi'--  -> hrs pake space
	// xxx -> tidak tau pass
	// SELECT * FROM user WHERE username = 'csi' -- AND password = 'xxx'
	// SELECT * FROM user WHERE username = 'csi'-- 'AND password = 'xxx'
	// tidak tau usr & pass
	// yyy' OR 1=1 -- 
	// SELECT * FROM user WHERE username = 'yyy' OR 1=1 -- 'AND password = 'xxx'
	// yyy' OR 1=1 LIMIT 1 -- 
	// SELECT * FROM user WHERE username = 'yyy' OR 1=1 LIMIT 1  -- 'AND password = 'xxx'

	// BLIND SQL INJECTION
	// xyz' OR database()='blog' -- 
	// xyz' OR BINARY substring(database(),1,1)='b' -- 
	// xyz' OR BINARY substring(database(),2,1)='l' -- 

	if (mysqli_num_rows($login) == 0) {
		// if (mysqli_stmt_num_rows($login) == 0) {
		die("Username atau password salah!");
	} else {
		$_SESSION['admin'] = 1;
		header("Location: admin.php");
	}

	// blind sql based on time
	// xyz' OR IF(substring(database(),1,1)='b',sleep(3),0) --
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

	<h1 style="text-align: center">My Blog Login</h1>
	<hr>

	<form action="" method="post">

		<p>Username:</p>
		<input type="text" name="username" size="200">

		<p>Password:</p>
		<input type="password" name="password">

		<br>
		<br>
		<input type="submit" name="submit" value="Login">

	</form>

</body>

</html>