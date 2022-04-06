<pre>
<?php
print_r($_POST);
print_r($_GET);
// curl -v -X POST -d "username=Ihsan&password=pass" http://localhost/web_security/form.php
// curl -X POST -d "username=Ihsan&password=pass" http://localhost/web_security/form.php?username=Andi

// curl -X POST -d "username=Ihsan&password=pass&isAdmin=1" http://localhost/web_security/form.php
if ($_POST['isAdmin'] == '1') {
    echo "You are admin";
    exit;
}
?>
</pre>

<form action="" method="POST">
    <input type="text" name="username">
    <br>
    <input type="password" name="password">
    <br>
    <input type="hidden" name="isAdmin" value="0">
    <input type="submit">
</form>