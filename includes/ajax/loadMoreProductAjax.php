<?php
header("Content-Type: text/plain; charset=UTF-8");

require("../class/autoload.php");

if(isset($_REQUEST['divNo']) and isset($_REQUEST['pageNo']))
{
	$dFunc = new DateFunction();
	$mFunc = new MainFunction();
	$mqFunc = new MainQuery();
	
	$dateNow = $dFunc->getDateChris();
	$timeNow = $dFunc->getTimeNow();
	
	$reqCatID = (!isset($_REQUEST['reqCatID']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['reqCatID']));
	$reqBrandID = (!isset($_REQUEST['reqBrandID']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['reqBrandID']));
	$reqSubCatID = (!isset($_REQUEST['reqSubCatID']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['reqSubCatID']));
	$reqSearchText = (!isset($_REQUEST['reqSearchText']) ? "-" : $mFunc->chgSpecialCharInputText($_REQUEST['reqSearchText']));
	
	$pageSize = $mFunc->chgSpecialCharInputNumber($_REQUEST['pageSize']);
	$pageNo = $mFunc->chgSpecialCharInputNumber($_REQUEST['pageNo']);
	$startRecord = $pageSize * $pageNo;  //------------- ที่ไม่ลบ 1 เพราะเราทำการส่งค่ามาพอดีอยู่แล้วทำให้ไม่ต้องมีการลดค่า

	if(($reqBrandID != "-") and ($reqSubCatID != "-"))
	{
		$sql = "select * from product_main where brandID=".$reqBrandID." and subcatID=".$reqSubCatID." and productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc limit ".$startRecord.", ".$pageSize;
	}
	else if(($reqCatID != "-") and ($reqSubCatID != "-"))
	{
		$sql = "select * from product_main where catID=".$reqCatID." and subcatID=".$reqSubCatID." and productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc limit ".$startRecord.", ".$pageSize;
	}
	else if($reqSearchText != "-")
	{
		$sql = "select * from product_main where productStartDate<='".$dateNow."' and productStatus=1 and (productName like '%".$reqSearchText."%') order by productStartDate desc limit ".$startRecord.", ".$pageSize;
	}
	else
	{
		$sql = "select * from product_main where productStartDate<='".$dateNow."' and productStatus=1 order by productStartDate desc limit ".$startRecord.", ".$pageSize;
	}
	
	$num = $mqFunc->checkNumRows($sql);
	
	if($num > 0)
	{
		$result = $mqFunc->getResultAll($sql);
	
		foreach($result as $r)
		{
			$productID = $r['productID'];
			$productName = $r['productName'];
			$productClickCount = $r['productClickCount'];
			$productPrice = number_format($r['productPrice'], 0);
			
			$sql = "select pictureName1 from product_picture where productID=".$productID;
			$resultProduct = $mqFunc->getResultAll($sql);
			
			foreach($resultProduct as $p)
			{
				$pictureProduct = $p['pictureName1'];
				//$pictureProductSmall = $mFunc->thumbImageName($p['pictureName1']);
			}
			
			unset($resultProduct);
			
			$sql = "select ratingTopicID, ratingName from rating_topic order by ratingTopicID";
			$resultRating = $mqFunc->getResultAll($sql);
			
			$i = 0;
			
			foreach($resultRating as $p)
			{
				$ratingTopicID[$i] = $p['ratingTopicID'];
				$ratingName[$i] = $p['ratingName'];
				
				$sql = "select proRatingPoint from product_rating where productID=".$productID." and ratingTopicID=".$ratingTopicID[$i];
				$num = $mqFunc->checkNumRows($sql);
				
				if($num > 0)
				{
					$resultPointRating = $mqFunc->getResultAll($sql);
					$sumRating[$i] = 0;
					
					foreach($resultPointRating as $pr)
					{
						$sumRating[$i] = round($sumRating[$i] + (int)$pr['proRatingPoint']);
					}
					
					$sumRating[$i] = $sumRating[$i] / $num;
					
					unset($resultPointRating);
				}
				else
				{
					$sumRating[$i] = 1;
				}
				
				$i++;
			}
			
			unset($resultRating);
			
			if(isset($_SESSION['mLoginID']))
			{
				$sql = "select reviewID from product_reviews where productID=".$productID." and memberID=".$_SESSION['mLoginID'];
				$reviewChkNum = $mqFunc->checkNumRows($sql);
				$reviewChkNum = (int)$reviewChkNum;
			}
			else
			{
				$reviewChkNum = 1;
			}
?>
            <div class="samplingMainDiv">
                <div class="samplingProductDiv">
                    <?php if(isset($chkSearch)){ ?>
                        <!--img name="showProduct_r4_c2" src="images/showProduct_r4_c2.jpg" width="775" height="44" border="0" id="showProduct_r4_c2" alt="" /-->
                        <br>&nbsp;
                        <?php $chkSearch = 1; ?>
                    <?php } ?>
                    <hr class="lineProductSampling">
                        <label class="veryBigBlackBrown">&nbsp;:&nbsp;&nbsp;<?php echo $productName; ?>&nbsp;&nbsp;:</label>
                    <hr class="lineProductSampling">
                    <img name="showProduct_r6_c2" src="images/showProduct_r6_c2.jpg" width="773" height="19" border="0" id="showProduct_r6_c2" alt="" style="margin-top:5px; margin-bottom: 5px;" />
                    <div class="samplingShowPicture">
                        <div class="samplingProductDiv1">
                            <a href="upload/<?php echo $pictureProduct; ?>" rel="lightbox"><img src="upload/<?php echo $pictureProduct; ?>" class="samplingProductPicMain" alt="" /></a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="index.php?flag=productDetail&pid=<?php echo $productID; ?>" class="linkBlueBlack12Bold" target="_top">View Product Detail</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="middleSilver11">(&nbsp;<?php echo number_format($productClickCount, 0)."&nbsp;&nbsp;Views"; ?>&nbsp;)</label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                           <label class="middlePurple11">Product Use Points&nbsp;:</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="middleSilver11"><?php echo $productPrice."&nbsp;&nbsp;Points"; ?></label>
                        </div>
                        <div class="samplingProductDiv2">
                            <img name="showProduct_r7_c2_r1_c2" src="images/showProduct_r7_c2_r1_c2.jpg" width="7" height="291" id="showProduct_r7_c2_r1_c2" alt="" />
                        </div>
                        <div class="samplingProductDiv3">
                            <ul class="ratingShowUL">
                            <?php for($rt=0; $rt<5; $rt++){ ?>
                                <li><label><?php echo $ratingName[$rt]; ?>...</label></li>
                                <li>
                                    <div class="ratingStarLI">
                                        <?php $starSize = 15; ?>
                                        <?php for($z=1; $z<=5; $z++){ ?>
                                            <?php $starPicture = (($sumRating[$rt] >= $z) ? "starPink" : "starWhite");?>
                                                <img src="images/<?php echo $starPicture; ?>.jpg" class="pointStar" width="<?php echo $starSize; ?>px" height="<?php echo $starSize; ?>px">
                                            <?php $starSize = $starSize + 2; ?>
                                        <?php } ?>
                                    </div>
                               </li>
                            <?php } ?>
                            </ul>
                            <hr class="lineProductSamplingDetail">
                            <label class="middleSilver11" style="margin-left:10px; float:left;">What do you want to do?</label>
                            <br>
                            <p style="float:left;">
                                <a href="index.php?flag=grapSample&pid=<?php echo $productID; ?>" target="_top"><img src="images/showProduct_r7_c22_r2_c2.jpg" width="104" height="28" class="pointStar"></a>
                                <?php if($reviewChkNum == 0){ ?>
                                    <a href="index.php?flag=productReview&pid=<?php echo $productID; ?>" target="_top"><img src="images/showProduct_r7_c22_r2_c4.jpg" width="104" height="28" class="pointStar"></a>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                    <img name="showProduct_r7_c2_r2_c1" src="images/showProduct_r7_c2_r2_c1.jpg" width="773" height="9" id="showProduct_r7_c2_r2_c1" alt="" />
                    <br>&nbsp;
                </div>
            </div>
<?php
		}
	}
	
	
	unset($dFunc, $mqFunc, $mFunc, $result, $r);
}
?>