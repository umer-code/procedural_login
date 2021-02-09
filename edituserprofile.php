<?php session_start();
    include('connection.php');
    if(isset($_SESSION["user"]) == false)
    {
        header("Location:login.php");
    }
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title></title>
    <script>
    $(document).ready(function(){
        $('#btn').click(function(){
            
            var userid = $('#userid').val();
            var name = $('#txtname').val();
            var pswd = $('#txtpass').val();
            var data = {"action": "updateuser","id":userid,"name":name,"password":pswd};
            var setting={
                type: "POST",
                dataType: "json",
                url: "api.php",
                data: data,
                success: function(response){
                    if(response.data == true){
                        alert("result updated");
                    }
                    else{
                        alert("unable to update ");
                    }
                },
                error: function (err, type, httpStatus) {
					alert('error has occured');
                }
                
            };
            $.ajax(setting);
            console.log('request sent');
			return false;

        });
    });
    </script>
</head>
<body>
<?php

    if(isset($_SESSION["userid"])){
        
        $userid = $_SESSION["userid"];
        $sql = "select * from user where id = '$userid'";
        $result = mysqli_query($conn, $sql);
        $recordfound = mysqli_num_rows($result);

        if($recordfound == 1){
            $row = mysqli_fetch_assoc($result);
            print_r($result);
        }
        else{
            header('Location: home.php');
        }
    }
?>
<form action="edituserprofile.php" method="POST">
        <input type="hidden" value="<?php echo $row["id"];?>" id="userid">
        <span>username : </span>
        <input type="text" name="name" id="txtname" value="<?php echo $row["login"];?>">
        <span>password : </span>
        <input type="password" name="pass" id="txtpass" >
        <input type="submit" value="update" id="btn" name="btn_submit">
    </form>
</body>
</html>