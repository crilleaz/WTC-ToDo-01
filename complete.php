<?php
include_once("cfg.php");
// $con = mysqli_connect('localhost', 'username', 'pppassword', 'todo');
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Update task, set completed
$id = $_GET['id'];
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE list SET completed = 1 WHERE id = $id"; 
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: ./todo.php');
    exit;
} else {
    echo "Error updating";
}

// Update task, set completed
$id = $_GET['re'];
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE list SET completed = 4 WHERE id = $id"; 
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: ./todo.php');
    exit;
} else {
    echo "Error updating";
}

// Update task, set readd
$id = $_GET['readd'];
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "UPDATE list SET completed = 0 WHERE id = $id"; 
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: ./todo.php');
    exit;
} else {
    echo "Error updating";
}


?>