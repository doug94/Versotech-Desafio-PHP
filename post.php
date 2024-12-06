<html>
    <head></head>
    <body>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') : ?>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div>
                    <label for="name">Nome:</label>
                    <input type="text" name="name" />
                </div>

                <div>
                    <label for="name">Email:</label>
                    <input type="email" name="email" />
                </div>

                <button type="submit">Adicionar</button>

            </form>
        <?php else : ?>
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
            ?>
        <?php endif ?>
    </body>
</html>