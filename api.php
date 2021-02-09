<?php
	include('connection.php');
  	if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"])){
  		$action = $_REQUEST['action'];
    	if($action == "updateuser")
		{
        	$id = $_REQUEST["id"];
			$name = $_REQUEST["name"];
			$password = $_REQUEST["password"];
			$sql = "UPDATE user SET login='$name', password='$password' where id='$id'";
			$flag = false;
			if (mysqli_query($conn, $sql) === true) {			
				$flag = true;
			} 
			else {
				//$msg = "ERROR:". $sql ."<br>".mysqli_error($conn);
			$flag = false;
			}
			
			$output["data"] = $flag;
			echo json_encode($output);
		}	 
	  }
	  ?>