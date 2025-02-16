<?php
require 'config.php';

if ($_POST) {
    $stmt = $conn->prepare("INSERT INTO comments (post_id, content) VALUES (?, ?)");
    $stmt->bind_param("is", $_POST['post_id'], $_POST['content']);
    $stmt->execute();
    
    header("Location: index.php");
}
?>