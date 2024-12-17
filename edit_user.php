<?php
if (isset($_POST['name'], $_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['userId']; // Daonde pego o id?
    $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    require 'connection.php';
    $connection = new Connection();
    $connection->update($query, $name, $email, $id);
    echo '<script>window.location.href = "index.php";</script>';
}