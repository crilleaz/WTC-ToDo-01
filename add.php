<?php
include_once("cfg.php");
$todo_text = $_POST['todo_text'];
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO list (todo) VALUES ('{$todo_text}')"; 
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: ./todo.php');
    exit;
} else {
    echo "Error updating";
}
?>