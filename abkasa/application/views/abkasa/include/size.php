<div class="boxs sizebox">
    <span class="colpickN">
        <div class="form-group">
            <div data-toggle="buttons">
                <?php
                if (!empty($sizes)) {
                    foreach ($sizes as $size) {
                        ?>
                        <label class="btn btn-default btn-circle btn-lg"><input type="radio" data-url="<?php echo base_url('abkasa/getFitBySize') ?>" class="viewsize" name="viewsize" value="<?php echo $size['size_id'] ?>"><i class="viewsize"></i><?php echo $size['size_number'] ?></label>
                            <?php
                        }
                    }
                    ?>
            </div>
        </div>
    </span>
</div>