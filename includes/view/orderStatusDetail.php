<div class="orderStatusDiv">
    <table align="center" width="97%" cellpadding="3" cellspacing="3" class="orderStatusTB">
    <tr>
    	<th align="left" width="5%">No.</td>
        <th align="left" width="15%">Date</td>
        <th align="left" width="40%">Samplings Order</td>
        <th align="left" width="20%">Status</td>
        <th align="left" width="20%">Tracking Number</td>
    </tr>
    <?php if($numOrder > 0){ ?>
        <?php for($i=0; $i<$numOrder; $i++){ ?>
        	<?php for($z=0; $z<$numOrderByOne; $z++){ ?>
                <tr>
                    <td align="left" width="5%"><?php echo $i+1; ?></td>
                    <td align="left" width="15%"><?php echo $orderDate[$i]; ?></td>
                    <td align="left" width="40%"><?php echo $productName[$i][$z]; ?></td>
                    <td align="left" width="20%"><?php echo $sendOrderFlag[$i]; ?></td>
                    <td align="left" width="20%"><?php echo $trackingNO[$i]; ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
    <?php } else { ?>
                <tr>
                    <td align="center" colspan="5" style="padding-top:30px;">
                        <div class="alert alert-danger">
                            ท่านยังไม่มีการสั่งสินค้าค่ะ
                        </div>
                    </td>
                </tr>
    <?php } ?>
    </table>
</div>