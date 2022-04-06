<?php require_once "config.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>My Website</title>
</head>

<body>
  <h1>Welcome to My Website</h1>

  <a href="index.php">Home</a> |
  <a href="index.php?page=page1">Page 1</a> |
  <a href="index.php?page=page2">Page 2</a> |
  <a href="index.php?page=page3">Page 3</a>

  <hr />

  <?php

  $white_listed_pages = array(
    "page1",
    "page2",
    "page3"
  );

  if (isset($_GET['page'])) {
    // include $_GET['page'];
    // include "pages/" . $_GET['page'] . ".php";
    // pages//etc/passwd
    if (in_array($_GET['page'], $white_listed_pages)) {
      include "pages/" . $_GET['page'] . ".php";
    } else {
      die("INVALID PAGE");
    }
  } else {
    echo "<p>This is the front page.</p>";
  }

  ?>

</body>

</html>