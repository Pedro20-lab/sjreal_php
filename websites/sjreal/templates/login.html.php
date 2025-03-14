
<?php
if (isset($errorMessage)):
    echo '<div class="errors">Sorry, your username and password could not be found.</div>';
endif;
?>
<form method="post" action="">
    <label for="doc_number">Documento</label>
    <input type="text" id="doc_number" name="doc_number">

    <label for="password">Your password</label>
    <input type="password" id="password" name="password">

    <input type="submit" name="login" value="Log in">
</form>


