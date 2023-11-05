<?php
session_start();

session_unset();

session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="assets/style.css">
	<script type="text/javascript" src="assets/script.js"></script>
  <title>Admin</title>

</head>

<body>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

<main class="wrapper">
  <form action="login.php" class="content" method="post">
    <h1 class="header">Welcome To Admin Panel</h1>
    <section class="input-section">
      <input type="number" name="user" id="user" placeholder="user">
      <input type="password" name="password" id="password" placeholder="Password">
      <input type="submit" value="Login" name="Login">
    </section>
  </form>
  <div class="image">
  </div>
</main>
</body>

</html>