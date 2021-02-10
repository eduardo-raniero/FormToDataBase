<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users-database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$safePWD = password_hash($_POST['password'], PASSWORD_DEFAULT);
$phone = $_POST['phone'];


$sql = "INSERT INTO users (name, email, password, tel)
VALUES ('$name', '$email', '$safePWD', '$phone')";

if (mysqli_query($conn, $sql)) {
  echo "Usuário cadastrado com sucesso!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>