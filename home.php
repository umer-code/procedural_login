<?php session_start(); ?>
<?php
if(isset($_SESSION["user"]) == false)
{
    header("Location:login.php");
}
?>
<html>
<head>
    <title></title>

</head>
<body>
<h1>homepage</h1>
<a href="logout.php">logout</a>
<a href="edituserprofile.php?userid=<?php echo $_SESSION["userid"];?>">edit profile</a>
    
</body>
</html>