<?php
function connect(){
    $server_name ="localhost";
    $username = "root";
    $password = "root";
    $database_name = "company_xyz";

    $conn = new mysqli($server_name,$username,$password,$database_name);

    if($conn -> connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }

    return $conn;
}
?>