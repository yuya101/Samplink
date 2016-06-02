<?php
$mQuery = new MainQuery();
$mFunc = new MainFunction();
$dFunc = new DateFunction();

$dateNow = $dFunc->getDateChris();
$bgTRColor = "white";
?>
<div class="buyProductFrameDiv" style="width:996px;">
			<br />
			<table align="center" cellpadding="0" cellspacing="0" width="100%" class="orderProductTB">
			<tr bgcolor="#ECECEC">
				<th align="center" width="10%">ลำดับ</th>
				<th align="center" width="40%">รายการ</th>
				<th align="center" width="13%">คะแนน/หน่วย</th>
				<th align="center" width="17%">จำนวน(ชิ้น)</th>
				<th align="center" width="22%">คะแนนรวม</th>
			</tr>
			<?php 
			$chkDupSelect = 0;
			$priceNewSelect = 0;
			$quanNewSelect = 0;
			$countPro = 0;
			$reqPID = 0;
					
			for($i=0; $i < count($_SESSION['cart']); $i++)
			{ 		
				if($reqPID == $_SESSION['cart'][$i]['proID'])
				{
					$chkDupSelect = 1;
				}
			
				$sql = "select productID, productName, productPrice from product_main where productID=".$_SESSION['cart'][$i]['proID'];
				$result = $mQuery->getResultAll($sql);
				
				foreach($result as $r)
				{
					$productID = $r['productID'];
					$productName =  $r['productName'];
					$productPrice = (int)$r['productPrice'];
				}
				
				$priceOldSelect = $_SESSION['cart'][$i]['proQuan'] * $productPrice;					
				$quanOldSelect = $_SESSION['cart'][$i]['proQuan'];
			?>        
			<tr bgcolor="<?php echo $bgTRColor; ?>">
				<td align="center"><label class="middleBlack11"><?php echo $i + 1; ?>.</label></td>
				<td align="left"><label class="middleBlack11"><?php echo $productName; ?></label></td>
				<td align="center"><label class="middleBlack11"><?php echo number_format($productPrice, 0); ?></label></td>
				<td align="center"><label class="middleBlack11"><?php echo $quanOldSelect; ?></label>
				</td>
				<td align="center"><label class="middleRed11" id="sumProPrice<?php echo $i+1; ?>"><?php echo number_format($priceOldSelect, 0); ?></label></td>
			</tr>
			<?php
				if($bgTRColor == "white")
				{
					$bgTRColor = "#ECECEC";
				}
				else
				{
					$bgTRColor = "white";
				}
				
				$countPro++;
			 }  //---------  for($i=0; $i < count($_SESSION['cart']); $i++) ?>
			
			<?php for($j=1; $j<=2; $j++){ ?>
			<tr>
				<td align="left" colspan="5">&nbsp;</td>
			</tr>
			<?php } ?>
			<tr>
				<td align="center" colspan="5"><hr style=" border-color:#6600CC" width="100%" /></td>
			</tr>
			<tr>
				<td align="center" colspan="3"><label class="bigBlack">รวมทั้งสิ้น</label></td>
				<td align="center"><label id="allProQuanShow" class="bigPurple"><b><?php echo ($_SESSION['cartSumQuan'] + $quanNewSelect); ?></b></label></td>
				<td align="center"><label id="allProPriceShow" class="bigDarkBlue"><b><?php echo number_format(($_SESSION['cartSumPrice'] + $priceNewSelect), 0); ?></b></label></td>
			</tr>
			</table>
            
			<br /> <br />
			<p align="right">
            	<?php 
					if($productPrice <= $memberPoint)
					{ 
						$btnDisplay = '';
						$textAlertDisplay = 'style="display:none;"';
				 	} 
					else
					{
						$btnDisplay = 'style="display:none;"';
						$textAlertDisplay = '';
					}
				 ?>
                    <input type="submit" name="nextProcess" id="nextProcess" value="&nbsp;ยืนยันการสั่งสินค้า&nbsp;" <?php echo $btnDisplay; ?> />
                	<p align="center" <?php echo $textAlertDisplay; ?> id="textAlert"><label class="bigRed">ท่านไม่สามารถรับสินค้าได้เนื่องจากคะแนนของสินค้า มากกว่าคะแนนที่ท่านมีค่ะ</label></p>
				<input type="hidden" name="memberPoint" id="memberPoint" value="<?php echo $memberPoint; ?>" />
                <input type="hidden" name="allProQuan" id="allProQuan" value="<?php echo ($_SESSION['cartSumQuan'] + $quanNewSelect); ?>" />
				<input type="hidden" name="allProPrice" id="allProPrice" value="<?php echo ($_SESSION['cartSumPrice'] + $priceNewSelect); ?>" />
				<input type="hidden" name="proShowCount" id="proShowCount" value="<?php echo $countPro; ?>" />
			</p>
</div>
<?php unset($mQuery, $mFunc, $dFunc);?>