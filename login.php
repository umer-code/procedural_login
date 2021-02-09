<?php session_start(); ?>
<?php
    include('connection.php');
    
    $error = "";
    if(isset($_REQUEST['btn_submit']) == true){
        $uname = $_REQUEST["name"];
        $pswd = $_REQUEST["pass"];
        $sql = "select * from user where login='$uname' and password='$pswd'";
        $result = mysqli_query($conn, $sql);
        $recordfound = mysqli_num_rows($result);

        if($recordfound == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION["userid"] = $row["id"];
             $_SESSION["user"] = $uname ;
            header ('Location: home.php');
       }
       else{
        $_SESSION["user"] = null;
        $error ="invalid credentials";
    }
    }
?>
<html>
<head>
    <title></title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body>
    <script>
        $(document).ready(function(){
        $("#btn").click(function(){
            var u = $("#txtname").val();
            var p = $("#txtpass").val();
            var flag = true;
            if(u == ""){
                flag = false;
                alert("Username is mandatory!");
            }
            if(p == ""){
                flag = false;
                alert("Password is mandatory!");
            }
            return flag;
        });
    });
    </script>
<?php
    /*$error = "";
    if(isset($_REQUEST["btn_submit"])){
        $u = $_REQUEST["name"];
        $p = $_REQUEST["pass"];
        if($u == "admin" && $p == "admin"){
            $_SESSION["user"] = $u ;
            header ('Location: home.php');
        }    
        else{
            $_SESSION["user"] = null;
            $error ="invalid credentials";
        }
    }
    */
?>
<form action="login.php" method="POST">
        <span>username : </span>
        <input type="text" name="name" id="txtname">
        <span>password : </span>
        <input type="password" name="pass" id="txtpass">
        <input type="submit" value="submit" id="btn" name="btn_submit">
    </form>
    <span> <?php echo $error; ?></span>
</body>
</html>