<div class="orderStatusDiv">
<table align="center" width="97%" cellpadding="3" cellspacing="3" class="orderStatusTB">
<tr>
	<th align="left" width="10%">No.</td>
    <th align="left" width="20%">Date</td>
    <th align="left" width="55%">Detail</td>
    <th align="left" width="15%">Point</td>
</tr>
<?php for($i=0; $i<$numHistory; $i++){ ?>
	<tr>
        <td align="left" width="10%"><?php echo $i+1; ?></td>
        <td align="left" width="20%"><?php echo $pointDate[$i]; ?></td>
        <td align="left" width="55%"><?php echo $topicText[$i]; ?></td>
        <td align="left" width="15%"><?php echo $point[$i]; ?></td>
    </tr>
<?php } ?>
</table>
</div>