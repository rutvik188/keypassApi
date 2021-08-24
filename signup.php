<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_GET['username'])&&isset($_GET['password'])) {
 
   
	$username = $_GET['username'];
	$password=$_GET['password'];

 
   
    
    // connecting to db
    $db = mysqli_connect('localhost', 'root', '','dbKeypass') or die(mysql_error());
 
    // mysql inserting a new row
    $result = mysqli_query($db,"INSERT INTO tblUser(username,password) VALUES('$username','$password')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "User successfully Inserted.";
 
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