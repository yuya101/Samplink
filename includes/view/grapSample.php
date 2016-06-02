<?php
$mQuery = new MainQuery();
$mFunc = new MainFunction();
$dFunc = new DateFunction();

$dateNow = $dFunc->getDateChris();

$reqPID = ($_REQUEST['pid'] == "" ? "0" : $mFunc->chgSpecialCharInputNumber($_REQUEST['pid']));

if($reqPID != "0")
{	
	$sql = "select point_1 from member_point where memberID=".$_SESSION['mLoginID'];
	$result = $mQuery->getResultAll($sql);
		
	foreach($result as $r)
	{
		$memberPoint = number_format($r['point_1'], 0);
	}
	
	if(!(isset($_SESSION['cart'])))  //------- สินค้ายังไม่เคยถูกเลือก
	{
		$sql = "select * from product_main where productID=".$reqPID;
		$result = $mQuery->getResultAll($sql);
		
		foreach($result as $r)
		{
			$productID = $r['productID'];
			$productName = $r['productName'];
			$productPrice = number_format($r['productPrice'], 0);
		}
	?>
	<div class="buyProductFrameDiv" style="width:996px;">
		<form action="includes/control/addProductToCart.php" method="post">
			<h1>แบบฟอร์มสั่งสินค้า (Products Ordering)</h1>
			<hr align="left" color="#EFEFEF" width="100%" />
			 <br />
			<label class="middleSilver11">ยินดีต้อนรับเข้าสู่ระบบการสั่งซื้อสินค้า Online ของ The Free Sample Products ค่ะ</label>
			<br /> 
			<label class="middleSilver11">รายการสินค้าที่ท่านสนใจเป็นตามรายการด้านล่างนี้ค่ะ</label>
			&nbsp;
			<label class="middleSilver11">ท่านมีคะแนนสะสมอยู่ทั้งหมด&nbsp;<label class="middlePurple11"><?php echo $memberPoint; ?></label>&nbsp;คะแนน</label>
			<br /> <br />
			<table align="center" cellpadding="0" cellspacing="0" width="100%" class="orderProductTB">
			<tr bgcolor="#ECECEC">
				<th align="center" width="10%">ลำดับ</th>
				<th align="center" width="40%">รายการ</th>
				<th align="center" width="13%">คะแนน/หน่วย</th>
				<th align="center" width="17%">จำนวน(ชิ้น)</th>
				<th align="center" width="22%">คะแนนรวมที่ใช้</th>
			</tr>
			<tr>
				<td align="center"><label class="middleBlack11">1.</label></td>
				<td align="left"><label class="middleBlack11"><?php echo $productName; ?></label></td>
				<td align="center"><label class="middleBlack11"><?php echo $productPrice; ?></label></td>
				<td align="center">
					<select name="proQuan1" id="proQuan1" onchange="updatePrice(1, <?php echo $productPrice; ?>);">
						<option value="0">ยกเลิกสินค้า</option>
						<option value="1" selected="selected">1</option>
						<?php for($j=21; $j<=20; $j++){ ?>
							<option value="<?php echo $j; ?>"><?php echo $j; ?></option>
						<?php } ?>
					</select>
					<input type="hidden" name="proID1" id="proID1" value="<?php echo $productID; ?>" />
					<input type="hidden" name="sumPrice1" id="sumPrice1" value="<?php echo $productPrice; ?>" />
				</td>
				<td align="center"><label class="middleRed11" id="sumProPrice1"><?php echo $productPrice; ?></label></td>
			</tr>
			<?php for($j=1; $j<=5; $j++){ ?>
			<tr>
				<td align="left" colspan="5">&nbsp;</td>
			</tr>
			<?php } ?>
			<tr>
				<td align="center" colspan="5"><hr style=" border-color:#6600CC" width="100%" /></td>
			</tr>
			<tr>
				<td align="center" colspan="3"><label class="bigBlack">รวมทั้งสิ้น</label></td>
				<td align="center"><label id="allProQuanShow" class="bigPurple"><b>1</b></label></td>
				<td align="center"><label id="allProPriceShow" class="bigDarkBlue"><b><?php echo $productPrice; ?></b></label></td>
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
                    <input type="submit" name="selectProduct" id="selectProduct" value="&nbsp;เลือกสินค้าเพิ่มเติม&nbsp;" <?php echo $btnDisplay; ?> />
                    <input type="submit" name="nextProcess" id="nextProcess" value="&nbsp;รับสินค้า&nbsp;" <?php echo $btnDisplay; ?> />
                	<p align="center" <?php echo $textAlertDisplay; ?> id="textAlert"><label class="bigRed">ท่านไม่สามารถรับสินค้าได้เนื่องจากคะแนนของสินค้า มากกว่าคะแนนที่ท่านมีค่ะ</label></p>
                <input type="hidden" name="memberPoint" id="memberPoint" value="<?php echo $memberPoint; ?>" />
				<input type="hidden" name="allProQuan" id="allProQuan" value="1" />
				<input type="hidden" name="allProPrice" id="allProPrice" value="<?php echo $productPrice; ?>" />
				<input type="hidden" name="proShowCount" id="proShowCount" value="1" />
			</p>
		</form>
	</div>
	<?php
	}
	else
	{
		$bgTRColor = "white";
	?>
	<div class="buyProductFrameDiv" style="width:996px;">
		<form action="includes/control/addProductToCart.php" method="post">
			<h1>แบบฟอร์มสั่งสินค้า (Products Ordering)</h1>
			<hr align="left" color="#EFEFEF" width="100%" />
			 <br />
			<label class="middleSilver11">ยินดีต้อนรับเข้าสู่ระบบการสั่งซื้อสินค้า Online ของ The Free Sample Products ค่ะ</label>
			<br /> 
			<label class="middleSilver11">รายการสินค้าที่ท่านสนใจเป็นตามรายการด้านล่างนี้ค่ะ</label>
			&nbsp;
			<label class="middleSilver11">ท่านมีคะแนนสะสมอยู่ทั้งหมด&nbsp;<label class="middlePurple11"><?php echo $memberPoint; ?></label>&nbsp;คะแนน</label>
			<br /> <br />
			<table align="center" cellpadding="0" cellspacing="0" width="100%" class="orderProductTB">
			<tr bgcolor="#ECECEC">
				<th align="center" width="10%">ลำดับ</th>
				<th align="center" width="40%">รายการ</th>
				<th align="center" width="13%">คะแนน/หน่วย</th>
				<th align="center" width="17%">จำนวน(ชิ้น)</th>
				<th align="center" width="22%">คะแนนรวมที่ใช้</th>
			</tr>
			<?php 
			$chkDupSelect = 0;
			$priceNewSelect = 0;
			$quanNewSelect = 0;
					
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
				<td align="center">
					<select name="proQuan<?php echo $i+1; ?>" id="proQuan<?php echo $i+1; ?>" onchange="updatePriceReSelect(<?php echo $i+1; ?>, <?php echo $productPrice; ?>);">
						<option value="0">ยกเลิกสินค้า</option>
						<option value="1" selected="selected">1</option>
						<?php for($j=21; $j<=20; $j++){ ?>
							<option value="<?php echo $j; ?>" <?php if($quanOldSelect == $j){echo "selected";} ?>><?php echo $j; ?></option>
						<?php } ?>
					</select>
					<input type="hidden" name="proID<?php echo $i+1; ?>" id="proID<?php echo $i+1; ?>" value="<?php echo $productID; ?>" />
					<input type="hidden" name="sumPrice<?php echo $i+1; ?>" id="sumPrice<?php echo $i+1; ?>" value="<?php echo $priceOldSelect; ?>" />
					<input type="hidden" name="proPrice<?php echo $i+1; ?>" id="proPrice<?php echo $i+1; ?>" value="<?php echo $productPrice; ?>" />
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
			?>
			<?php }  //---------  for($i=0; $i < count($_SESSION['cart']); $i++) ?>
			
			<?php $countPro = $i; ?>
			
			<!--------------- สินค้าที่กดเพื่อเพิ่มใหม่ ------------------>
			<?php
				if($chkDupSelect == 0)
				{
					$sql = "select productID, productName, productPrice from product_main where productID=".$reqPID;
					$result = $mQuery->getResultAll($sql);
					
					foreach($result as $r)
					{
						$productID = $r['productID'];
						$productName =  $r['productName'];
						$productPrice = (int)$r['productPrice'];
					}
					
					$priceNewSelect = $productPrice;
					$quanNewSelect = 1;
			?>        
				<tr bgcolor="<?php echo $bgTRColor; ?>">
					<td align="center"><label class="middleBlack11"><?php echo $i + 1; ?>.</label></td>
					<td align="left"><label class="middleBlack11"><?php echo $productName; ?></label></td>
					<td align="center"><label class="middleBlack11"><?php echo number_format($productPrice, 0); ?></label></td>
					<td align="center">
						<select name="proQuan<?php echo $i+1; ?>" id="proQuan<?php echo $i+1; ?>" onchange="updatePriceReSelect(<?php echo $i+1; ?>, <?php echo $productPrice; ?>);">
							<option value="0">ยกเลิกสินค้า</option>
							<option value="1" selected="selected">1</option>
							<?php for($j=21; $j<=20; $j++){ ?>
								<option value="<?php echo $j; ?>"><?php echo $j; ?></option>
							<?php } ?>
						</select>
						<input type="hidden" name="proID<?php echo $i+1; ?>" id="proID<?php echo $i+1; ?>" value="<?php echo $productID; ?>" />
						<input type="hidden" name="sumPrice<?php echo $i+1; ?>" id="sumPrice<?php echo $i+1; ?>" value="<?php echo $productPrice; ?>" />
						<input type="hidden" name="proPrice<?php echo $i+1; ?>" id="proPrice<?php echo $i+1; ?>" value="<?php echo $productPrice; ?>" />
					</td>
					<td align="center"><label class="middleRed11" id="sumProPrice<?php echo $i+1; ?>"><?php echo number_format($productPrice, 0); ?></label></td>
				</tr>
					<?php $countPro = $countPro + 1; ?>
			 <?php } ?>
			 <!--------------- สินค้าที่กดเพื่อเพิ่มใหม่ ------------------>
			
			<?php for($j=1; $j<=5; $j++){ ?>
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
                    <input type="submit" name="selectProduct" id="selectProduct" value="&nbsp;เลือกสินค้าเพิ่มเติม&nbsp;" <?php echo $btnDisplay; ?> />
                    <input type="submit" name="nextProcess" id="nextProcess" value="&nbsp;รับสินค้า&nbsp;" <?php echo $btnDisplay; ?> />
                	<p align="center" <?php echo $textAlertDisplay; ?> id="textAlert"><label class="bigRed">ท่านไม่สามารถรับสินค้าได้เนื่องจากคะแนนของสินค้า มากกว่าคะแนนที่ท่านมีค่ะ</label></p>
				<input type="hidden" name="memberPoint" id="memberPoint" value="<?php echo $memberPoint; ?>" />
                <input type="hidden" name="allProQuan" id="allProQuan" value="<?php echo ($_SESSION['cartSumQuan'] + $quanNewSelect); ?>" />
				<input type="hidden" name="allProPrice" id="allProPrice" value="<?php echo ($_SESSION['cartSumPrice'] + $priceNewSelect); ?>" />
				<input type="hidden" name="proShowCount" id="proShowCount" value="<?php echo $countPro; ?>" />
			</p>
		</form>
	</div>
	<?php
	}
}

unset($reqPID);
unset($mQuery, $mFunc, $dFunc);
?>