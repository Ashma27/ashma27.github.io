<style>


    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab a {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color: #000;
        font-size: 15px;
    }

    /* Change background color of buttons on hover */
    .tab a:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab a.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }


</style>
<div class="container" style="height:250px">
    <form method="post" action="<?php echo base_url('account/doReplaceProduct'); ?>" id="replace-product">
        <div class="row">
            <div class="col-md-12 message">
                <div class="tabbable">     
                    <?php if (!empty($stock['small_slim']) | !empty($stock['medium_slim']) | !empty($stock['medium_regular']) | !empty($stock['large_slim']) | !empty($stock['large_regular']) | !empty($stock['xl_slim'])) {
                        ?>
                        <?php
                    } else {
                        ?>
                        <h3><span class="label label-danger">Out of Stock</span></h3>
                        <?php
                    }
                    ?>
                    <br>    
                    <div class="tab col-md-12">
                        <ul class="nav nav-tabs">
                            <?php if (!empty($stock['small_slim'])) { ?>
                                <li><a class="tablinks" data-toggle="tab" onclick="openSize(event, 'small')">Small</a></li>
                            <?php } ?>
                            <?php if (!empty($stock['medium_slim'])) { ?>
                                <li><a class="tablinks" data-toggle="tab" onclick="openSize(event, 'medium')">Medium</a></li>
                            <?php } ?>
                            <?php if (!empty($stock['large_slim'])) { ?>
                                <li> <a class="tablinks" data-toggle="tab" onclick="openSize(event, 'large')">Large</a></li>
                            <?php } ?>
                            <?php if (!empty($stock['xl_slim'])) { ?>
                                <li> <a class="tablinks" data-toggle="tab" onclick="openSize(event, 'xl')">XL</a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div id="small" class="tabcontent customroadio boxs" style="display: block;">
                        <div class="custominner boxs">
                            <input type="radio" name="size" id="size" value="small_slim"> 
                            <label for="size">Slim</label>
                        </div>
                    </div>

                    <div id="medium" class="tabcontent customroadio boxs">
                        <?php if (!empty($stock['medium_slim'])) { ?>
                            <div class="custominner boxs">
                                <input type="radio" name="size" id="size1" value="medium_slim"> 
                                <label for="size1">Slim</label>
                            </div>
                        <?php } ?>
                        <?php if (!empty($stock['medium_regular'])) { ?>
                            <div class="custominner boxs">
                                <input type="radio" name="size" id="size2" value="medium_regular"> 
                                <label for="size2">Regular</label>
                            </div>
                        <?php } ?>
                    </div>

                    <div id="large" class="tabcontent customroadio boxs">
                         <?php if (!empty($stock['large_slim'])) { ?>
                        <div class="custominner boxs">
                            <input type="radio" name="size" id="size3" value="large_slim" >
                            <label for="size3">Slim</label>
                        </div>
                        <?php } ?>
                        <?php if (!empty($stock['large_regular'])) { ?>
                        <div class="custominner boxs">
                            <input type="radio" name="size" id="size4" value="large_regular">
                            <label for="size4">Regular</label>
                        </div>
                         <?php } ?>
                    </div>
                    <div id="xl" class="tabcontent customroadio boxs">
                        <div class="custominner boxs">
                            <input type="radio" name="size" id="size5" value="xl_slim" >
                            <label for="size5">Slim</label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="order_product_id" value="<?php echo $order_product_id; ?>"/>
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/>
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <div class="row">
                <div class="col-md-2 col-md-offset-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function openSize(evt, Size) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(Size).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>  