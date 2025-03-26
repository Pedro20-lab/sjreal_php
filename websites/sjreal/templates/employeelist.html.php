<?php ?>
<?php foreach ($employees as $employee) {?>
    <?php foreach ($employee as $key => $value) {?>
        <div class="field">
            <label><?=$key?></label>
            <input value=""><?=$value?>
        </div>
    <?php }?>
<?php }?>
