<div class="samplingMainDiv">
	<div class="samplingProductDiv">
    	<?php if(@$chkSearch == 0){ ?>
    		<?php include('searchBox.php'); ?>
            <?php $chkSearch = 1; ?>
        <?php } ?>
    	<hr class="lineProductSampling">
        	<label class="veryBigBlackBrown">&nbsp;:&nbsp;&nbsp;<?php echo $productName; ?>&nbsp;&nbsp;:</label>
    	<hr class="lineProductSampling">
        <img name="showProduct_r6_c2" src="images/showProduct_r6_c2.jpg" width="773" height="19" border="0" alt="" style="margin-top:5px; margin-bottom: 5px;" />
        <div class="samplingShowPicture">
        	<div class="samplingProductDiv1">
            	<a href="upload/<?php echo $pictureProduct[0]; ?>" rel="lightbox[picSmall]"><img src="upload/<?php echo $pictureProduct[0]; ?>" class="samplingProductPicMain" alt="" /></a>
                <p align="center">
                <?php 
					for($picSNum=1; $picSNum<=4; $picSNum++)
					{ 
						if($pictureProduct[$picSNum] != "-")
						{
							$pictureProductSmall = $mFunc->thumbImageName($pictureProduct[$picSNum]);
							echo '<a href="upload/'.$pictureProduct[$picSNum].'" rel="lightbox[picSmall]"><img src="upload/'.$pictureProduct[$picSNum].'" class="samplingProductPicSmall" alt="" /></a>';
						}
				 	} 
				?>
                </p>
            </div>
        	<div class="samplingProductDiv2">
            	<img name="showProduct_r7_c2_r1_c2" src="images/showProduct_r7_c2_r1_c2.jpg" width="7" height="320" alt="" />
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
                    				<img src="images/<?php echo $starPicture; ?>.jpg" class="pointStar">
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
        <img name="showProduct_r7_c2_r2_c1" src="images/showProduct_r7_c2_r2_c1.jpg" width="773" height="9" alt="" />
        
        
        <div class="samplingProductDetailDiv">
        	<label class="big14BigBrown">รายละเอียดสินค้า&nbsp;(&nbsp;รหัสสินค้า&nbsp;<?php echo $productCode; ?>&nbsp;)&nbsp;&nbsp;:</label>
            <br>
            <label class="samplingProductDetailText"><?php echo htmlspecialchars_decode($productDetail); ?></label>
            <br><br><br><br>
            <label class="bigDarkBlue">วันที่เริ่มแสดงสินค้า&nbsp;&nbsp;:</label>
            &nbsp;&nbsp;
            <label class="bigPurple"><?php echo $productStartDate; ?></label>
            <br>
            <label class="bigDarkBlue">จำนวนผู้เข้าชม&nbsp;&nbsp;:</label>
            &nbsp;&nbsp;
            <label class="bigPurple"><?php echo number_format($productClickCount, 0)."&nbsp;&nbsp;Views"; ?></label>
            <br>
            <label class="bigDarkBlue">จำนวนผู้แสดงความคิดเห็น&nbsp;&nbsp;:</label>
            &nbsp;&nbsp;
            <label class="bigPurple"><?php echo $numReview."&nbsp;&nbsp;ความคิดเห็น"; ?></label>
        </div>
        
        <?php if($numReview > 0){ ?>
            <img name="showProduct_r7_c2_r2_c1" src="images/showProduct_r7_c2_r2_c1.jpg" width="773" height="9" alt="" style="padding-top:10px;" />
            <div class="samplingProductReviewDiv">
                &nbsp;
                <label class="big14BigBrown">Member Reviews&nbsp;&nbsp;:</label>
                <?php for($i=0; $i<$numReview; $i++){ ?>
                    <div class="reviewDetailDiv">
                        <table align="center" width="745" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td width="225" valign="top" align="center">
                            	<img src="upload/<?php echo $memberPicture[$i]; ?>" width="80" height="50" class="memberReviewImg">
                             	<p align="left" style="margin-left:10px;">
                                	<label class="middleAlmostBlack">User&nbsp;:&nbsp;</label>
                                    <label class="middlePurple"><?php echo $memberLogin[$i]; ?></label>
                                    <br>
                                	<label class="middleAlmostBlack">No. Of Reviews&nbsp;:&nbsp;</label>
                                    <label class="middlePurple"><?php echo number_format($memberReviewNum[$i], 0); ?></label>
                                    <br>
                                	<label class="middleAlmostBlack">Review On&nbsp;:&nbsp;</label>
                                    <label class="middlePurple"><?php echo $reviewAddDate[$i]; ?></label>
                                </p>
                            </td>
                            <td background="images/reviewProductVerticalLine.jpg" width="7" height="100%">&nbsp;</td>
                            <td align="center" valign="top" width="513">
                                <div class="samplingMemberRating">
                                    <ul class="ratingMemberRatingShowUL">
                                    <?php for($rt=0; $rt<5; $rt++){ ?>
                                        <li><label><?php echo $ratingName[$rt]; ?>...</label></li>
                                        <li>
                                            <div class="ratingMemberRatingStarLI">
                                                <?php $starSize = 10; ?>
                                                <?php for($z=1; $z<=5; $z++){ ?>
                                                    <?php $starPicture = (($rating[$i][$rt] >= $z) ? "starPink" : "starWhite");?>
                                                        <img src="images/<?php echo $starPicture; ?>.jpg" class="pointStar">
                                                    <?php $starSize = $starSize + 2; ?>
                                                <?php } ?>
                                            </div>
                                       </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                                <br>
                                <div class="samplingReviewDetailDiv">
                                	<label class="middleAlmostBlack"><u>ความคิดเห็นของผู้ใช้</u></label>
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php echo $reviewDetail[$i]; ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" colspan="3" valign="middle">
                            	<img name="showProduct_r7_c2_r2_c1" src="images/showProduct_r7_c2_r2_c1.jpg" width="773" height="9" alt="" style="padding-top:10px;" />
                            </td>
                        </tr>
                        </table>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        
    </div>
</div>