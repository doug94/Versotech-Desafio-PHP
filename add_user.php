<?php
if (isset($_POST['name'], $_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = "INSERT INTO users(name, email) VALUES(:name, :email)";
    require 'connection.php';
    $connection = new Connection();
    $connection->insert($query, $name, $email);
    echo '<script>window.location.href = "index.php";</script>';
}