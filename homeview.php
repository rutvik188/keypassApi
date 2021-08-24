<?php
    $res = array();
	if(isset($_GET['uid'])){
        $con = mysqli_connect('localhost', 'root', '', 'dbKeypass') or die(mysqli_error());  

        //fetching data from the main table
        $qry = mysqli_query($con,"SELECT * FROM tblUserData WHERE uid='".$_GET['uid']."'");


		if($qry){			
            $res["success"] = 1;
            $res["message"] = "data found.";
            //creating json array to store json in array format
            $res["cart"] = array();

            while($row = mysqli_fetch_assoc($qry)){
                $index = array();

            $index['appName']= $row['appName'];
		
                array_push($res["cart"], $index);
            }
			echo json_encode($res);
		}else{
			$res["success"] = 0;					
			$res["message"] = "No data found";
					 
			echo json_encode($res);
		}		
	}else{
		$res["success"] = 0;
		$res["message"] = "Required Fields are missing.";
		
		echo json_encode($res);
	}
?>