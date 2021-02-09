<?php
    include('connection.php');
    if(isset($_REQUEST['btn_submit'])){
        $sql = "select id, name, city from record";
        $result = mysqli_query($conn, $sql);
        $recordfound = mysqli_num_rows($result);

        if($recordfound>0){
            echo "$recordfound Record are found! <br>";
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['id'];
                $name = $row['name'];
                $city = $row['city'];

                echo $id."<br>";
                echo $name."<br>";
                echo $city."<br>";
            }
       }
    }
?>
<html>
<head>
    <title></title>

</head>
<body>
    <form action="showdata.php">
    <input type="submit" name="btn_submit" value="show"> 
    </form>
</body>
</html>