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


tcpdf();

$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Tax Invoice";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
//$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$obj_pdf->AddPage();
$obj_pdf->setJPEGQuality(75);
ob_start();
if (!empty($coupon)) {
    if ($coupon['discount_type'] == 'percent') {
        $discount_value = ' (' . $coupon['discount'] . '% OFF)';
    } else {
        $discount_value = ' (' . $coupon['discount'] . '/- OFF)';
    }
}
$discount = $order['total'] - $order['sub_total'];


$html = '
<table width="100%" border="1" cellpadding="4">
    <tr style="border-bottom: 1px solid black">
        <td style="text-align: left; border-right: 1px solid black">
            <b>ABKASA DESIGNER APPARELS PVT LTD.</b><br>
            33/21, SITE-2, LONI ROAD<br>
            MOHAN NAGAR, GHAZIABAD<br>
            GSTIN/UIN: 09AARCA6320R1ZX<br>
            STATE NAME: UTTAR PRADESH,CODE : 09<br>
            E-MAIL: INFO@ABKASA.COM
        </td>
        <td>
            <table width="100%" cellpadding="1">
                <tr border="1" style="border-bottom: 1px solid black">
                    <td style="width: 50%; border-right: 1px solid black">Invoice No.<br> ' . $order['order_id'] . '</td>
                    <td>  Dated <br> <b>' . $order['date'] . '</b></td>
                </tr>
                <tr>
                    <td style="text-align: left">Mode/Terms of Payment <br> ' . $order['payment_mode'] . '</td>
                    <td></td>
                </tr>    
            </table>
        </td>
    </tr>
    <tr style="border-bottom: 1px solid black">
        <td style="text-align: left">
            Buyer<br>
            <b>' . $order['name'] . '</b><br>
            ' . $order['address'] . '-' . $order['pincode'] . '<br>
            Phone: (91)' . $order['mobile'] . '<br>
            Email: ' . $order['email'] . '
        </td>
        <td>
            <table width="100%">
                <tr>
                    <td colspan="2" style="text-align: left">Destination <br> ' . $order['city'] . '</td>
                </tr> 
            </table>
        </td>
    </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="4">
    <tr>
        <th>SI No.</th>
        <th>Description of Goods</th>
        <th>HSN/SAC</th>
        <th>GST Rate</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Disc. %</th>
        <th>Amount</th>
    </tr>';
$i = 1;
$gst_rate = 0;
$quantity = 0;
foreach ($ordered_products as $product) {
    $rate = 0;
    if ($product['price'] > 1000) {
        $rate = 12;
    } else {
        $rate = 5;
    }
    $quantity += $product['quantity'];
    $total_price = $product['quantity'] * $product['price'];
    if ($rate == 5) {
        $rated_price = $total_price / 1.05;
        $gst_rate += $total_price - $rated_price;
    } else if ($rate == 12) {
        $rated_price = $total_price / 1.12;
        $gst_rate += $total_price - $rated_price;
    }
    $html .= '
        <tr>
            <td>' . $i . '</td>
            <td><b>' . $product["title"] . '</b></td>
            <td>' . $product["hsn_code"] . '</td>
            <td>' . $rate . '%</td>
            <td><b>' . $product["quantity"] . '</b></td>
            <td> Rs. ' . number_format($product['price'], 2) . '</td>
            <td></td>
            <td><b> Rs.' . number_format($rated_price, 2) . '</b></td>
        </tr>';
    $i++;
}

$html .= '
        <tr>
            <td></td>
            <td><b>Total Discount</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b> Rs.' . number_format($discount, 2) . '</b></td>
        </tr>
        <tr>
            <td></td>
            <td><b>Output IGST</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b> Rs.' . number_format($gst_rate, 2) . '</b></td>
        </tr>
        <tr>
            <td></td>
            <td><b>Total</b></td>
            <td></td>
            <td></td>
            <td><b>' . $quantity . '</b></td>
            <td></td>
            <td></td>
            <td><b> Rs.' . number_format($order['total'], 2) . '</b></td>
        </tr>
    </table> <BR><BR>';

$html .= '
<span style="margin-top:5px;">Amount Chargeable (in Words)</span><br>
<span><b>INR ' . $total . 'Only </b></span> <BR><BR>
<table width="100%" border="1" cellpadding="4">
    <tr>
        <td>HSN/SAC</td>
        <td>Taxable Value</td>
        <td>
            <table width="100%">
                <tr><td colspan="2" style="text-align: center; border-bottom:1px solid black">Integrated Tax</td></tr>
                <tr>
                    <td style="text-align: center; border-right:1px solid black">Rate</td>
                    <td style="text-align: center">Amount</td>
                </tr>
            </table>
        </td>
        <td>Total Tax Amount</td>
    </tr>';

$total_rated_price = 0;
$total_gst_rate = 0;
foreach ($ordered_products as $product) {
    $rate = 0;
    if ($product['price'] > 1000) {
        $rate = 12;
    } else {
        $rate = 5;
    }
    $total_price = $product['quantity'] * $product['price'];
    $rated_price = 0;
    if ($rate == 5) {
        $rated_price = $total_price / 1.05;
        $total_rated_price += $rated_price;
        $total_gst_rate += $total_price - $rated_price;
    } else if ($rate == 12) {
        $rated_price = $total_price / 1.12;
        $total_rated_price += $rated_price;
        $total_gst_rate += $total_price - $rated_price;
    }
    $html .='   <tr>
                    <td>' . $product['hsn_code'] . '</td>
                    <td> Rs.' . number_format($rated_price, 2) . '</td>
                    <td>
                        <table width="100%">
                            <tr>
                                <td style="border-right: 1px solid black; width: 50%"> ' . $rate . '%</td>
                                <td> Rs. ' . number_format($total_price - $rated_price, 2) . '</td>
                            </tr>
                        </table>
                    </td>
                    <td> Rs. ' . number_format($total_price - $rated_price, 2) . '</td>
                </tr>';
}
    $html .='   <tr>
                    <td style="text-align: right"><b>Total</b></td>
                    <td><b> Rs.'. number_format($total_rated_price,2).'</b></td>
                    <td>
                        <table width="100%">
                            <tr>
                                <td style="border-right: 1px solid black; width: 50%"></td>
                                <td><b> Rs. '. number_format($total_gst_rate,2).'</b></td>
                            </tr>
                        </table>
                    </td>
                    <td><b> Rs. '. number_format($total_gst_rate,2).'</b></td>
                </tr>
</table>

<BR><BR>

<span style="margin-top:10px;">Tax Amount(in words) : <b>INR '.getIndianCurrency($total_rated_price)  .' Only</b></span>
<BR>
<BR>
<BR>
<table>
    <tr style="border-bottom:1px solid black">
        <td></td>
        <td>for ABKASA DESIGNER APPARELS PVT. LTD.</td>
    </tr>
</table>';    

    
    
//$obj_pdf->Image(base_url('public/image/logo.png'), 16, 28, 39, 20, 'PNG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);

ob_end_clean();
$obj_pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$obj_pdf->Output('abkasa_'.$order['order_id'], 'I');
