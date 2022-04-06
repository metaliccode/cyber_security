<?php

$whitelist = array('image/jpg', 'image/jpeg', 'image/png');

if (isset($_POST['submit'])) {

	$target_dir  = '../uploads/';
	// $target_dir  = dirname(__FILE__) . '/uploads/';
	$target_path = $target_dir . basename($_FILES['image']['name']);
	// $target_path = $target_dir . basename($_FILES['image']['name']) . ".pdf"; 
	$uploadOk    = false;

	// mencegah file yang diupload tidak sesuai dengan tipe file
	if (!in_array($_FILES['image']['type'], $whitelist)) {
		die("File harus berupa gambar");
	}
	// black list file backdoor
	$ext = pathinfo($target_path, PATHINFO_EXTENSION);
	if ($ext == 'php' || $ext == 'phtml' || $ext == 'pht') {
		die("File yang diupload tidak boleh berupa file backdoor");
	}

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
		$uploadOk = true;
	} else {
		die("Upload gagal!");
	}

	if ($uploadOk) {
		echo "<p>Upload berhasil:</p>";
		echo "<img src='{$target_path}'>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Upload Gambar</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

	<form action="" method="post" enctype="multipart/form-data">
		<p>Masukkan gambar:</p>
		<input type="file" name="image" accept="image/*" />
		<br />
		<br />
		<input type="submit" name="submit" />
	</form>

</body>

</html>