<?php

$servername ="localhost";
$username = "root";
$password = "";
$database = "notes_db";
$connection = new mysqli($servername,$username,$password,$database);
if($connection->connect_error) {
	die("Connection failed:". $connection->connect_error);
}
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM notes";
    $result = $connection->query($sql);
    $rows = '';
    $notes = array();
    while($rows = $result->fetch_assoc()) {
       $notes[] = $rows;
    }
    print_r(json_encode($notes));
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $obj = json_decode($json);
    $sql = "insert into notes(title, content) values('".$obj->title."','".$obj->content."')";
    $connection->query($sql);
    $id = $connection->insert_id;
    echo json_encode(array("id"=>$id));
}  
if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = $_GET['key'];
    $sql = "delete from notes where id = ".$id;
    $connection->query($sql);

}

 
?>