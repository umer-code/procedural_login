<?php
    include('connection.php');

    if(isset($_REQUEST["btn_submit"])){
    $name = $_REQUEST['txtname'];
    $pswd = $_REQUEST['txtpass'];
    $sql = "insert into user (login, password)
            values ('$name', '$pswd')";
    if(mysqli_query($conn, $sql) == true){
        $last_id = mysqli_insert_id($conn);
        echo "new ID is: ".$last_id;
        echo "user register successfully!";
    }
    else{
        echo "Error: ". mysqli_error($conn);
    }
}
?>
<html>
<head>
    <title></title>

</head>
<body>
    <form action="registration.php">
        <span>username</span><br>
        <input type="text" name="txtname"><br>
        <span>password</span><br>
        <input typy="password" name="txtpass">
        <input type="submit" name="btn_submit" value="add"> 
    </form>
</body>
</html>