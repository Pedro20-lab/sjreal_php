<?php
if (!empty($errors)) :
    ?>
    <div class="errors">
        <p>Your account could not be created, please check the following:</p>
        <ul>
            <?php
            foreach ($errors as $error) :
                ?>
                <li><?= $error ?></li>
            <?php
            endforeach; ?>
        </ul>
    </div>
<?php
endif;
?>
<form action="" method="post">
    <label for="email">Email</label>
    <input name="user[email]" id="email" type="text" value="<?=$user['email'] ?? ''?>" required>

    <label for="name">Nombre</label>
    <input name="user[name]" id="name" type="text" value="<?=$user['name'] ?? ''?>" required>

    <label for="lastname">Apellido</label>
    <input name="user[lastname]" id="lastname" type="text" value="<?=$user['lastname'] ?? ''?>" required>

    <label for="doc_number">Numero documento</label>
    <input name="user[doc_number]" id="doc_number" type="text" value="<?=$user['doc_number'] ?? ''?>" required>

    <label for="password">Contraseña</label>
    <input name="user[password]" id="password" type="password" value="<?=$user['password'] ?? ''?>" required>

    <input type="submit" name="submit" value="Registrar usuario">
</form>