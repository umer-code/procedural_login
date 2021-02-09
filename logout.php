<?php session_start(); ?>
<html>
<head>
    <title>Logout</title>

</head>
<body>
    <?php $_SESSION['user']=null; ?>
    <h1>you have been logout successfully!</h1>
    <a href="login.php">click here to login!</a>
</body>
</html>