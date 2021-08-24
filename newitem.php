<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_GET['uid'])&& isset($_GET['appName'])&& isset($_GET['email'])&& isset($_GET['password'])) {
 
	$uid = $_GET['uid'];
    $appName = $_GET['appName'];
	$email = $_GET['email'];
	$password = $_GET['password'];
	

	//$tot=$quantity*96;
	
    // connecting to db
    $db = mysqli_connect('localhost', 'root', '','dbKeypass') or die(mysql_error());
 
    // mysql inserting a new row
    $result = mysqli_query($db,"INSERT INTO tblUserData(uid,appName,email,password) VALUES('$uid','$appName','$email','$password')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "order Success Inserted.";
	
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>