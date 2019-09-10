<div class="boxs sizebox form-group">
    <span class="colpickN" id="size2">
        <div class="funkyradio">
            <?php
            if (!empty($fit['slim'])) {
                ?>
                <div class="funkyradio-primary">
                    <input type="radio" name="fit" id="slim" class="fit" value="slim">
                    <label for="slim">Slim</label>
                </div>
                <?php
            }
            if (!empty($fit['regular'])) {
                ?>
                <div class="funkyradio-primary">
                    <input type="radio" name="fit" id="regular" class="fit" value="regular">
                    <label for="regular">Regular</label>
                </div>
                <?php
            }
            ?>
        </div>
    </span>
</div>
<div class="row hidden" id="fit-row">
    <div class="col-md-8 col-md-offset-1">Your Tailor Made size is- <span id="fit-slim" class=""><?php echo $fit['slim_value'] ?></span> <span id="fit-regular" class=""><?php echo $fit['regular_value'] ?></span></div>
</div>