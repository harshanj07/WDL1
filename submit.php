<?php


error_reporting(E_ALL);
ini_set('display_errors',1);


$servername="localhost";
$username="root";
$password="";
$database="test";


$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error){
die ("Connection error:" . $conn->connect_error);
}
function sanitize_inputs($data){
return htmlspecialchars(stripslashes(trim($data)));
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=sanitize_inputs($_POST["name"]);
$email=sanitize_inputs($_POST["Email"]);
$phoneno=sanitize_inputs($_POST["phno"]);
$address=sanitize_inputs($_POST["addr"]);


$stmt = $conn->prepare("INSERT into Personal (namee,email,phoneno,addresss) VALUES (?,?,?,?)");
$stmt->bind_param("ssss",$name,$email,$phoneno,$address);
if($stmt->execute()){
echo '<script>alert("Successfulyy Inserted")</script>';
}else{
echo "Error caused during inserting" ;
error_log("Error: " . mysqli_error($conn));
}
$stmt->close();
}
$conn->close();
?>
