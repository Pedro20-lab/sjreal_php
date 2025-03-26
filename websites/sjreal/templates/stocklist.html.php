<?php foreach ($stocks as $stock) {?>
    <?php foreach ($stock as $key => $value) {?>
        <div class="field">
            <label><?=$key?></label>
            <input value=""><?=$value?>
        </div>
    <?php }?>
<?php }?>
