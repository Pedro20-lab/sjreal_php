<?php ?>
<?php foreach ($parkings as $parking) {?>
    <?php foreach ($parking as $key => $value) {?>
        <div class="field">
            <label><?=$key?></label>
            <input value=""><?=$value?>
        </div>
    <?php }?>
<?php }?>
