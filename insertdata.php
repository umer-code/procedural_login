<?php
    include('connection.php');

    if(isset($_REQUEST["btn_submit"])){
    $name = "ali";
    $city = "lhr";
    $sql = "insert into record (name, city)
            values ('$name', '$city')";
    if(mysqli_query($conn, $sql) == true){
        $last_id = mysqli_insert_id($conn);
        echo "new ID is: ".$last_id;
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
    <form action="insertdata.php">
        <input type="submit" name="btn_submit" value="add"> 
    </form>
</body>
</html>