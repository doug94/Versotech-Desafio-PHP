<?php include 'header.php' ?>

<form action="<?php echo (isset($_GET['id'])) ? 'edit_user.php' : 'add_user.php' ?>" method="post">
    <div>
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" />
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" />
    </div>

    <div hidden>
        <input type="hidden" name="userId" value="<?php $_GET['id'] ?>" />
    </div>

    <button type="submit">Adicionar</button>

</form>

<?php include 'footer.php' ?>