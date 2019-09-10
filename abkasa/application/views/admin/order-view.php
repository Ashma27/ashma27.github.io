<?php 
function getIndianCurrency($number) {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else{
                $str[] = null;
            }
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return $Rupees . $paise;
    }

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="abkasa-label">Order Detail</label>
                            <a href="<?php echo base_url('admin/order'); ?>" class="btn btn-outline btn-primary float-right">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            Customer:<br/>
                            <?php echo '<b>' . $order['name'] . '</b>'; ?><br/>
                            <?php echo $order['address']; ?><?php echo '-' . $order['pincode']; ?><br/>
                            Phone: (91)<?php echo $order['mobile']; ?><br/>
                            Email: <?php echo $order['email']; ?>
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <b>Order Id:</b> <?php echo $order['order_id']; ?><br>
                            <b>Payment Date:</b> <?php echo $order['date']; ?><br>
                            <b>Payment Mode:</b> <?php echo $order['payment_mode']; ?>
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <b>Order Status:</b> <?php if($order['order_status']==NULL){echo $order['status']; }else{ echo $order['order_status']; }  ?></br>
                            <b>Download Invoice:</b> <a href="<?php echo base_url('admin/order/invoice/' . $order['order_id']); ?>" target="_blank">Download</a>
                        </div>
                    </div>
                </div>
                <?php  ?>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <?php
                            if (!empty($coupon)) {
                                if ($coupon['discount_type'] == 'percent') {
                                    $discount_value = ' ('.$coupon['discount'] . '% OFF)';
                                } else {
                                    $discount_value = ' ('.$coupon['discount'] . '/- OFF)';
                                }
                            }
                            $discount = $order['total'] - $order['sub_total'];
                            ?>
                            
                            <table width="100%" class="table table-bordered" style="margin-bottom: 0px">
                                    <tr style="border-bottom: 1px solid black">
                                        <td style="text-align: left">
                                            <b>ABKASA DESIGNER APPARELS PVT LTD.</b><br>
                                            33/21, SITE-2, LONI ROAD<br>
                                            MOHAN NAGAR, GHAZIABAD</br>
                                            GSTIN/UIN: 09AARCA6320R1ZX</br>
                                            STATE NAME: UTTAR PRADESH,CODE : 09</br>
                                            E-MAIL: INFO@ABKASA.COM
                                        </td>
                                        <td>
                                            <table width="100%">
                                                <tr style="text-align: left; border-bottom: 1px solid black">
                                                    <td style="text-align: left; border-right: 1px solid black;width: 50%">Invoice No.<br> <?php echo $order['order_id']; ?></td>
                                                    <td>Dated <br> <b><?php echo $order['date']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left">Mode/Terms of Payment <br> <?php echo $order['payment_mode']; ?></td>
                                                    <td></td>
                                                </tr>   
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid black">
                                        <td style="text-align: left">
                                            Buyer</br>
                                            <?php echo '<b>' . $order['name'] . '</b>'; ?><br/>
                                            <?php echo $order['address']; ?><?php echo '-' . $order['pincode']; ?><br/>
                                            Phone: (91)<?php echo $order['mobile']; ?><br/>
                                            Email: <?php echo $order['email']; ?>
                                        </td>
                                        <td>
                                            <table width="100%">
                                                <tr>
                                                    <td colspan="2" style="text-align: left">Destination <br> <?php echo $order['city']; ?></td>
                                                </tr> 
                                            </table>
                                        </td>
                                    </tr>
                            </table>
                            <table width="100%" class="table table-bordered">
                                    <tr style="border-bottom: 1px solid black">
                                        <th>SI No.</th>
                                        <th>Description of Goods</th>
                                        <th>HSN/SAC</th>
                                        <th>GST Rate</th>
                                        <th>Quantity</th>
                                        <th>Rate</th>
                                        <th>Per</th>
                                        <th>Disc. %</th>
                                        <th>Amount</th>
                                    </tr>
                                    <?php
                                    $i=1;
                                    $gst_rate=0;
                                    $quantity=0;
                                    foreach ($ordered_products as $product) {
                                        $rate=0;
                                        if($product['price']>1000){ 
                                            $rate=12;
                                        }else{
                                            $rate=5;
                                        }
                                    ?>
                                    <tr style="border-bottom: 1px solid black">
                                        <td><?php echo $i; ?></td>
                                        <td><b><?php echo $product['title']; ?></b></td>
                                        <td><?php echo $product['hsn_code']; ?></td>
                                        <td><?php echo $rate.'%'; ?></td>
                                        <td><b><?php echo $product['quantity']; $quantity+= $product['quantity']; ?></b></td>
                                        <td>IN &#x20b9; <?php 
                                            $total_price= $product['quantity'] * $product['price'];
                                             echo number_format($product['price'],2);                                         
                                        ?></td>
                                        <td>Nos.</td>
                                        <td></td>
                                        <td><b>IN &#x20b9; <?php  
                                        if($rate==5){
                                                $rated_price=$total_price/1.05;
                                                echo number_format($rated_price, 2);
                                                
                                                $gst_rate+=$total_price-$rated_price;
                                            }else if($rate==12){
                                                $rated_price=$total_price/1.12;
                                                echo number_format($rated_price, 2);
                                                $gst_rate+=$total_price-$rated_price;
                                            }
                                        ?></b></td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <tr style="border-bottom: 1px solid black">
                                        <td></td>
                                        <td><b>Total Discount</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>IN &#x20b9; <?php echo number_format($discount,2); ?></b></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid black">
                                        <td></td>
                                        <td><b>Output IGST</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>IN &#x20b9; <?php echo number_format($gst_rate,2); ?></b></td>
                                    </tr>
                                    
                                    <tr style="border-bottom: 1px solid black">
                                        <td></td>
                                        <td><b>Total</b></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><?php echo $quantity; ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>IN &#x20b9; <?php echo number_format($order['total'],2); ?></b></td>
                                    </tr>
                            </table>
                            <span>Amount Chargeable (in Words)</span><br>
                            <span><b>INR <?php echo $total.'Only'; ?></b></span>
                            <table width="100%" class="table table-bordered">
                                <tr>
                                    <td>HSN/SAC</td>
                                    <td>Taxable Value</td>
                                    <td>
                                        <table width="100%">
                                            <tr><td colspan="2" style="text-align: center">Integrated Tax</td></tr>
                                            <tr style="border-top: 1px solid black">
                                                <td style="border-right: 1px solid black; width: 50%">Rate</td>
                                                <td>Amount</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>Total Tax Amount</td>
                                </tr>
                                <?php 
                                $total_rated_price=0;
                                $total_gst_rate=0;
                                foreach ($ordered_products as $product) {
                                    $rate=0;
                                        if($product['price']>1000){ 
                                            $rate=12;
                                        }else{
                                            $rate=5;
                                        }
                                ?>
                                <tr>
                                    <td style="text-align: left"><?php echo $product['hsn_code']; ?></td>
                                    <td> &#x20b9; <?php 
                                    $total_price= $product['quantity'] * $product['price'];
                                    $rated_price=0;
                                    
                                    if($rate==5){
                                                $rated_price=$total_price/1.05;
                                                $total_rated_price+=$rated_price;
                                                echo number_format($rated_price, 2);
                                                $total_gst_rate+=$total_price-$rated_price;
                                            }else if($rate==12){
                                                $rated_price=$total_price/1.12;
                                                $total_rated_price+=$rated_price;
                                                echo number_format($rated_price, 2);
                                                $total_gst_rate+=$total_price-$rated_price;
                                            }
                                    ?></td>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td style="border-right: 1px solid black; width: 50%"><?php echo $rate; ?>%</td>
                                                <td> &#x20b9; <?php echo number_format($total_price-$rated_price,2); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td> &#x20b9; <?php echo number_format($total_price-$rated_price,2); ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td style="text-align: right"><b>Total</b></td>
                                    <td><b> &#x20b9; <?php echo number_format($total_rated_price,2); ?></b></td>
                                    <td><table width="100%">
                                            <tr>
                                                <td style="border-right: 1px solid black; width: 50%"></td>
                                                <td><b> &#x20b9; <?php echo number_format($total_gst_rate,2); ?></b></td>
                                            </tr>
                                        </table></td>
                                    <td><b> &#x20b9; <?php echo number_format($total_gst_rate,2); ?></b></td>
                                </tr>
                            </table>
                            <span>Tax Amount(in words) : <b>INR <?php $word=getIndianCurrency($total_rated_price); echo $word; ?> Only</b></span>
                            <br/>
                            <br/>
                            <br/>
                            
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

