<?php
echo $_SERVER['REQUEST_METHOD'] . "\n";
echo '<br>';
echo "\n" . $_SERVER['HTTP_USER_AGENT'];
print_r($_SERVER);
print_r($_GET);

// di linux bisa menggunakan curl
// curl -X GET http://localhost/web_security/method.php 
// curl -X POST http://localhost/web_security/method.php 
// curl -X POST -A "Browser Saya" http://localhost/web_security/method.php 
// curl -X PUT http://localhost/web_security/method.php?name=ihsan&age=30
// menambahkan header
// curl -X -v PUT http://localhost/web_security/method.php?name=ihsan&age=30
// curl -X -v PUT http://localhost/web_security/method.php?name=ihsan&age=30&x[0]=a&x[1]=b
