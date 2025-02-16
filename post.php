<?php
require 'config.php';

if ($_POST) {
    $stmt = $conn->prepare("INSERT INTO posts (content) VALUES (?)");
    $stmt->bind_param("s", $_POST['content']);
    $stmt->execute();
    
    header("Location: index.php");
}
?>