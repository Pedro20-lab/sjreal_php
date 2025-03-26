
<?php foreach ($lodgements as $lodgement) {?>
    <?php foreach ($lodgement as $key => $value) {?>
        <div class="field">
            <label><?=$key?></label>
            <input value=""><?=$value?>
        </div>
    <?php }?>
<?php }?>
