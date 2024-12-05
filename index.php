<html>
<head>
<script>
    function addNewUser() {
        const newUser = document.createElement("input");
        const newEmail = document.createElement("input");
        const addButton = document.createElement("button");
        newUser.setAttribute("type", "text");
        addButton.setAttribute("type", "submit");
        addButton.innerHTML = "Adicionar";
        const container = document.getElementById("newUserContainer");
        container.appendChild(newUser);
        container.appendChild(newEmail);
        container.appendChild(addButton);
    }
</script>
<?php

require 'connection.php';

$connection = new Connection();

$users = $connection->query("SELECT * FROM users");

?>
</head>
<body>
<table border='1'>
    <tr>
        <th>ID</th>    
        <th>Nome</th>    
        <th>Email</th>
        <th>Ação</th>    
    </tr>

    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->name; ?></td>
            <td><?= $user->email; ?></td>
            <td>
                <a href="#">Editar</a>
                <a href="#">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<br>

<button type="button" onclick="addNewUser()">Adicionar Usuário</button>
<div id="newUserContainer"></div>

</body>
</html>
